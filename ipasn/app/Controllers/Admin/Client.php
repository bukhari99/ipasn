<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Client_model;

class Client extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();
		$m_client = new Client_model();
		$client 	= $m_client->listing();
		$total 	= $m_client->total();
		$unitkerja 	= $m_client->listing2();

		

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama' 		=> 'required',
				'gambar'	 	=> [
					                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
					                'max_size[gambar,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$namabaru 	= str_replace(' ','-',$avatar->getName());
	            $avatar->move(WRITEPATH . '../assets/upload/client/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(WRITEPATH . '../assets/upload/client/'.$namabaru)
			    ->fit(100, 100, 'center')
			    ->save(WRITEPATH . '../assets/upload/client/thumbs/'.$namabaru);
	        	// masuk database
	        	// masuk database
				$data = [	'id_user'		=> $this->session->get('id_user'),
							'jenis_client'	=> $this->request->getPost('jenis_client'),
							'nama'			=> $this->request->getPost('nama'),
							'pimpinan'		=> $this->request->getPost('pimpinan'),
							'alamat'		=> $this->request->getPost('alamat'),
							'telepon'		=> $this->request->getPost('telepon'),
							'website'		=> $this->request->getPost('website'),
							'email'			=> $this->request->getPost('email'),
							'isi_testimoni'	=> $this->request->getPost('isi_testimoni'),
							'gambar'		=> $namabaru,
							'status_client'	=> $this->request->getPost('status_client'),
							'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
							'tanggal_lahir'	=> date('Y-m-d',strtotime($this->request->getPost('tanggal_lahir'))),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						];
				$m_client->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah ditambah');
				return redirect()->to(base_url('admin/client'));
			}else{
				// masuk database
				$data = [	'id_user'		=> $this->session->get('id_user'),
							'jenis_client'	=> $this->request->getPost('jenis_client'),
							'nama'			=> $this->request->getPost('nama'),
							'pimpinan'		=> $this->request->getPost('pimpinan'),
							'alamat'		=> $this->request->getPost('alamat'),
							'telepon'		=> $this->request->getPost('telepon'),
							'website'		=> $this->request->getPost('website'),
							'email'			=> $this->request->getPost('email'),
							'isi_testimoni'	=> $this->request->getPost('isi_testimoni'),
							// 'gambar'		=> $namabaru,
							'status_client'	=> $this->request->getPost('status_client'),
							'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
							'tanggal_lahir'	=> date('Y-m-d',strtotime($this->request->getPost('tanggal_lahir'))),
							'tanggal_post'	=> date('Y-m-d H:i:s')
						];
				$m_client->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah ditambah');
				return redirect()->to(base_url('admin/client'));
			}
	    }else{
			$data = [	'title'			=> 'Unit Kerja : '.$total['total'],
						'client'			=> $client,
						'unitkerja'			=> $unitkerja,
						'content'		=> 'admin/client/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($id_client)
	{
		checklogin();
		$m_client 	= new Client_model();
		$client 	= $m_client->detail($id_client);

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama' 		=> 'required',
				'gambar'	 	=> [
					                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
					                'max_size[gambar,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$namabaru 	= str_replace(' ','-',$avatar->getName());
	            $avatar->move(WRITEPATH . '../assets/upload/client/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(WRITEPATH . '../assets/upload/client/'.$namabaru)
			    ->fit(100, 100, 'center')
			    ->save(WRITEPATH . '../assets/upload/client/thumbs/'.$namabaru);
	        	// masuk database
	        	// masuk database
				$data = [	'id_client'		=> $id_client,
							'id_user'		=> $this->session->get('id_user'),
							'jenis_client'	=> $this->request->getPost('jenis_client'),
							'nama'			=> $this->request->getPost('nama'),
							'pimpinan'		=> $this->request->getPost('pimpinan'),
							'alamat'		=> $this->request->getPost('alamat'),
							'telepon'		=> $this->request->getPost('telepon'),
							'website'		=> $this->request->getPost('website'),
							'email'			=> $this->request->getPost('email'),
							'isi_testimoni'	=> $this->request->getPost('isi_testimoni'),
							'gambar'		=> $namabaru,
							'status_client'	=> $this->request->getPost('status_client'),
							'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
							'tanggal_lahir'	=> date('Y-m-d',strtotime($this->request->getPost('tanggal_lahir'))),
						];
				$m_client->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah disimpan');
				return redirect()->to(base_url('admin/client'));
			}else{
				// masuk database
				$data = [	'id_client'		=> $id_client,
							'id_user'		=> $this->session->get('id_user'),
							'jenis_client'	=> $this->request->getPost('jenis_client'),
							'nama'			=> $this->request->getPost('nama'),
							'pimpinan'		=> $this->request->getPost('pimpinan'),
							'alamat'		=> $this->request->getPost('alamat'),
							'telepon'		=> $this->request->getPost('telepon'),
							'website'		=> $this->request->getPost('website'),
							'email'			=> $this->request->getPost('email'),
							'isi_testimoni'	=> $this->request->getPost('isi_testimoni'),
							// 'gambar'		=> $namabaru,
							'status_client'	=> $this->request->getPost('status_client'),
							'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
							'tanggal_lahir'	=> date('Y-m-d',strtotime($this->request->getPost('tanggal_lahir'))),
						];
				$m_client->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah disimpan');
				return redirect()->to(base_url('admin/client'));
			}
	    }else{
			$data = [	'title'			=> 'Edit Data Client: '.$client['nama'],
						'client'		=> $client,
						'content'		=> 'admin/client/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($id_client)
	{
		checklogin();
		$m_client = new Client_model();
		$data = ['id_client'	=> $id_client];
		$m_client->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/client'));
	}

	// mainpage
	public function dataapi()
	{
		checklogin();
		$m_client = new Client_model();
		//$total 	= $m_client->total();
		//$unitkerja 	= $m_client->listing2();

		// Cek data melalui API
		$url="http://bkd.pemkomedan.go.id/login_api/web_service.php";
$data=array("username"=>"admin_kompetensi","password"=>"12345","category"=>"REF_PENDIDIKAN");
 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
$data['semua_data'] = json_decode($response,true);

		// Start validasi
	
			
	  
			$data = [	'title'			=> 'Data API',
						'response'			=> $response,
						'semua_data'			=> $semua_data,
						'content'		=> 'admin/client/dataapi'
					];
			echo view('admin/layout/wrapper',$data);
	}
	

}