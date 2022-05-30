<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Jabatan_model;

class Jabatan extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();

		$total 	= $m_jabatan->total();
		$jabatan = $m_jabatan->jabatan();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama' 		=> 'required',
            	'username' 	=> 'required|min_length[3]|is_unique[users.username]',
        	])) {
			// masuk database
			$data = [	'nama'			=> $this->request->getPost('nama'),
						'email'			=> $this->request->getPost('email'),
						'username'		=> $this->request->getPost('username'),
						'password'		=> sha1($this->request->getPost('password')),
						'akses_level'	=> $this->request->getPost('akses_level'),

						'nik'			=> $this->request->getPost('nik'),
						'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
						'tgl_lahir'			=> $this->request->getPost('tgl_lahir'),
						'jenis_kelamin'			=> $this->request->getPost('jenis_kelamin'),
						'alamat'			=> $this->request->getPost('alamat'),
						'nomor_kontak'			=> $this->request->getPost('nomor_kontak'),
						'pendidikan'			=> $this->request->getPost('pendidikan'),
						'nip_asn'			=> $this->request->getPost('nip_asn'),
						'unit_kerja'			=> $this->request->getPost('unit_kerja'),
						'jabatan'	=> $this->request->getPost('jabatan'),
						'jenjang_jabatan'			=> $this->request->getPost('jenjang_jabatan'),
						'nama_jabatan'			=> $this->request->getPost('nama_jabatan'),
						'atasan_langsung'			=> $this->request->getPost('atasan_langsung'),
						'tanggal_post'	=> date('Y-m-d H:i:s')
					];
			$m_user->save($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/user'));
	    }else{
			$data = [	//'title'			=> 'Pengguna Website: '.$total['total'],
						'title'			=> 'Jabatan : '.$total,
						'jabatan'		=> $jabatan,
						'content'		=> 'admin/jabatan/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($id_user)
	{
		checklogin();
		$m_user = new User_model();
		$user 	= $m_user->detail($id_user);
		$pegawai = $m_user->tabel_user();
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'nama' 	=> 'required|min_length[3]',
        	])) {
			// masuk database
			if(strlen($this->request->getPost('password')) >= 6 && strlen($this->request->getPost('password')) <= 32 ) {
				$data = [	'id_user'		=> $id_user,
							'password'		=> sha1($this->request->getPost('password')),
							'atasan_langsung'			=> $this->request->getPost('atasan_langsung'),
							'akses_level'	=> $this->request->getPost('akses_level')
					];
			}else{
				$data = [	'id_user'		=> $id_user,
							'atasan_langsung'	=> $this->request->getPost('atasan_langsung'),
							'akses_level'	=> $this->request->getPost('akses_level')
					];
			}
			$m_user->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/user'));
	    }else{
			$data = [	'title'			=> 'Edit Pengguna: '.$user['nama'],
						'user'			=> $user,
						'pegawai'		=> $pegawai,
						'content'		=> 'admin/user/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($id_user)
	{
		checklogin();
		$m_user = new User_model();
		$data = ['id_user'	=> $id_user];
		$m_user->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/user'));
	}
}