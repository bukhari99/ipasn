<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Konfigurasi_model;
use App\Models\User_model;

class Login extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	// Homepage
	public function index()
	{
		$session = \Config\Services::session();
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_user 		= new User_model();
		$konfigurasi 	= $m_konfigurasi->listing();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'username' 	=> 'required|min_length[3]',
            'password'  => 'required|min_length[3]',
        	])) {
			$username 	= $this->request->getPost('username');
			$password 	= $this->request->getPost('password');

			// Cek data melalui API
			/*$url="http://bkd.pemkomedan.go.id/login_api/web_service.php";
			$data=array("username"=>"admin_kompetensi","password"=>"12345","category"=>"REF_PENDIDIKAN");
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($curl);
			$response2 = json_decode($response,true);
			$response3 = json_decode($response);
			for($i=0; $i < count($response2['data']); $i++){
				echo ($i+1)." ".$response2['data'][$i]['nama_pendidikan']."<br />";
				
					$username = "username";
					$password = sha1("password");
					if($username===$response2['data'][$i]['nama_pendidikan'] and $password===$response2['data'][$i]['kode'])
					{
						//echo "ketemu";exit();
					}
			}*/




			// Cek data di database
			$user 		= $m_user->login($username,$password);
			// Proses login
			if($user) {

					// Instansi
					$id_skpd = $user['id_skpd'];
					$instansi = $m_user->instansi($id_skpd);
					$id_pangkat = $user['id_pangkat'];
					$pangkat = $m_user->pangkat2($id_pangkat);
					$id_jabatan = $user['id_jabatan'];
					$jabatan = $m_user->jabatan2($id_jabatan);
					$id_pendidikan = $user['id_pendidikan'];
					$pendidikan = $m_user->pendidikan2($id_pendidikan);
					$id_kriteria_penilaian_pendidikan = $pendidikan['id_kriteria_penilaian_pendidikan'];
					$kriteria_penilaian_pendidikan = $m_user->kriteria_penilaian_pendidikan($id_kriteria_penilaian_pendidikan);

				// Jika username password benar
				$this->session->set('nip',$user['username']);
				$this->session->set('username',$username);
				$this->session->set('id_user',$user['id_user']);
				$this->session->set('akses_level',$user['akses_level']);
				$this->session->set('nama',$user['nama']);
				$this->session->set('nama_lengkap',$user['nama_lengkap']);
				$this->session->set('gelar_depan',$user['gelar_depan']);
				$this->session->set('gelar_belakang',$user['gelar_belakang']);
				$this->session->set('jenis_kelamin',$user['gender']);
				$this->session->set('akses_level',$user['akses_level']);
				$this->session->set('pangkat',$pangkat['data_pangkat']);
				$this->session->set('golongan',$pangkat['data_gol_ruang']);
				$this->session->set('jabatan',$jabatan['nama_jabatan']);
				$this->session->set('kode_pendidikan',$pendidikan['kode']);
				$this->session->set('pendidikan',$pendidikan['nama_pendidikan']);
				$this->session->set('nilai',$kriteria_penilaian_pendidikan['nilai']);
				$this->session->set('instansi',$instansi['nama_unitkerja']);
				$this->session->set('kinerja',$kinerja);
				$this->session->set('tahun',date('Y'));
				$this->session->setFlashdata('sukses', 'Hai '.$user['nama'].', Anda berhasil login');
				return redirect()->to(base_url('admin/dasbor'));
			}else{
				// jika username password salah
				$this->session->setFlashdata('warning','Username atau password salah');
				return redirect()->to(base_url('login'));
			}
	    }else{
			// End validasi
			$data = [	'title'			=> 'Login Administrator',
						'description'	=> $konfigurasi['namaweb'].', '.$konfigurasi['tentang'],
						'keywords'		=> $konfigurasi['namaweb'].', '.$konfigurasi['keywords'],
						'session'		=> $session
					];
			echo view('login/index',$data);
		}
		// End proses
	}

	// lupa
	public function lupa()
	{
		$session = \Config\Services::session();
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_user 		= new User_model();
		$konfigurasi 	= $m_konfigurasi->listing();

		$data = [	'title'			=> 'Lupa Password',
					'description'	=> $konfigurasi['namaweb'].', '.$konfigurasi['tentang'],
					'keywords'		=> $konfigurasi['namaweb'].', '.$konfigurasi['keywords'],
					'session'		=> $session
				];
		echo view('login/lupa',$data);
	}

	// Logout
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('login?logout=sukses'));
	}
}