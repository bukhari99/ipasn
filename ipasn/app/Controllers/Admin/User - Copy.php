<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\User_model;

class User extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();

		$akun =  $this->request->getVar("akun");
		//echo $akun;

		$m_user = new User_model();
		if($akun==='1')
		{
			$user 	= $m_user->listing();
			$kelompok_akun = "ASN";
		}
		elseif($akun==='2')
		{
			$user 	= $m_user->listing2();
			$kelompok_akun = "ATASAN";
		}
		elseif($akun==='3')
		{
			$user 	= $m_user->listing3();
			$kelompok_akun = "VERIFIKATOR";
		}
		elseif($akun==='4')
		{
			$user 	= $m_user->listing4();
			$kelompok_akun = "UNIT PENGELOLA PERENCANAAN";
		}
		elseif($akun==='5')
		{
			$user 	= $m_user->listing5();
			$kelompok_akun = "PYB";
		}
		elseif($akun==='6')
		{
			$user 	= $m_user->listing6();
			$kelompok_akun = "PPK";
		}
		$total 	= $m_user->total();
		$unitkerja = $m_user->unitkerja();
		$pangkat = $m_user->pangkat();
		$jabatan = $m_user->jabatan();

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
						'title'			=> 'Data Pengguna : '.$kelompok_akun,
						'user'			=> $user,
						'unitkerja'		=> $unitkerja,
						'jabatan'		=> $jabatan,
						'pangkat'		=> $pangkat,
						'content'		=> 'admin/user/index'
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


	// Jabatan
	public function jabatan()
	{
		checklogin();
		$m_user = new User_model();
		$total 	= $m_user->total2();
		$jabatan = $m_user->jabatan();
	
			$data = [	'title'			=> 'Nama Jabatan',
						'jabatan'			=> $jabatan,
						'content'		=> 'admin/user/jabatan'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Jabatan
	public function pangkat()
	{
		checklogin();
		$m_user = new User_model();
		$total 	= $m_user->total3();
		$pangkat = $m_user->pangkat();
	
			$data = [	'title'			=> 'Pangkat : '.$total,
						'pangkat'			=> $pangkat,
						'content'		=> 'admin/user/pangkat'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Jabatan
	public function jenisjabatan()
	{
		checklogin();
		$m_user = new User_model();
		$jenisjabatan = $m_user->jenisjabatan();
	
			$data = [	
						'title'			=> 'Jenis Jabatan ',
						'jenisjabatan'			=> $jenisjabatan,
						'content'		=> 'admin/user/jenisjabatan'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Jabatan
	public function jnsjabatan()
	{
		checklogin();
		$m_user = new User_model();
		$jenisjabatan = $m_user->jenisjabatan();
	
			$data = [	
						'title'			=> 'Nama Jabatan ',
						'jenisjabatan'			=> $jenisjabatan,
						'content'		=> 'admin/user/jnsjabatan'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Jabatan
	public function pendidikan()
	{
		checklogin();
		$m_user = new User_model();
		$pendidikan = $m_user->pendidikan();
	
			$data = [	
						'title'			=> 'Tingkat Pendidikan',
						'pendidikan'			=> $pendidikan,
						'content'		=> 'admin/user/pendidikan'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Verifikasi Pengelola
	public function verifikasipengelola()
	{
		checklogin();
		$m_user = new User_model();
		$pendidikan = $m_user->pendidikan();
	
			$data = [	
						'title'			=> 'Proses Bangkom diverifikasi oleh Pengelola Kepegawaian ',
						'pendidikan'			=> $pendidikan,
						'content'		=> 'admin/user/verifikasipengelola'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Kelola Nilai Assesment ASN
	public function kelolanilaiassesment()
	{
		checklogin();
		$m_user = new User_model();
		$pendidikan = $m_user->pendidikan();
	
			$data = [	
						'title'			=> 'Kelola Nilai Assesment ASN ',
						'pendidikan'			=> $pendidikan,
						'content'		=> 'admin/user/kelolanilaiassesment'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Monitoring dan Evaluasi UPK 
	public function monevupk()
	{
		checklogin();
		$m_user = new User_model();
		$pendidikan = $m_user->pendidikan();
	
			$data = [	
						'title'			=> 'Monitoring dan Evaluasi UPK',
						'pendidikan'			=> $pendidikan,
						'content'		=> 'admin/user/monevupk'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Laporan Monitoring dan Evaluasi UPK 
	public function lapmonevupk()
	{
		checklogin();
		$m_user = new User_model();
		$pendidikan = $m_user->pendidikan();
	
			$data = [	
						'title'			=> 'Laporan Monitoring dan Evaluasi UPK',
						'pendidikan'			=> $pendidikan,
						'content'		=> 'admin/user/lapmonevupk'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Inventarisasi Data ASN
	public function inventasasidataasan()
	{
		checklogin();

		$akun =  $this->request->getVar("akun");
		//echo $akun;

		$m_user = new User_model();
			$user 	= $m_user->listing();
			$kelompok_akun = "ASN";

		$total 	= $m_user->total();
		$unitkerja = $m_user->unitkerja();
		$pangkat = $m_user->pangkat();
		$jabatan = $m_user->jabatan();

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
						'title'			=> 'Inventarisasi Data : '.$kelompok_akun,
						'user'			=> $user,
						'unitkerja'		=> $unitkerja,
						'jabatan'		=> $jabatan,
						'pangkat'		=> $pangkat,
						'content'		=> 'admin/user/inventarisasidataasn'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// Inventarisasi Data ASN
	public function inventasasidataasanedit($id_user)
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
			$data = [	'title'			=> 'Self Assessment Pengembangan Kompetensi',
						'user'			=> $user,
						'pegawai'		=> $pegawai,
						'content'		=> 'admin/user/edit2'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// Profil
	public function profil()
	{
		checklogin();
		$session = \Config\Services::session();
		$m_user = new User_model();
		$nip = $session->get('nip');
		$thn = $session->get('tahun');
		$cek_nilai_indeks = $m_user->cek_nilai_indeks($nip,$thn);
		//echo "$nip";exit();
		if($cek_nilai_indeks['nip']<>'' and $cek_nilai_indeks['baseline_thn']<>'')
		{
			//$data_nilai_indeks = $cek_nilai_indeks;
		}
		else
		{
			// Input nilai indeks profesionalitas
			$jenisjabatan = $this->session->get('jenis_jabatan');
			if($jenisjabatan='')
			{
				$jenisjabatan = '-';
			}
			$jenjang_jabatan = $this->session->get('jenjang_jabatan');
			if($jenjang_jabatan='')
			{
				$jenjang_jabatan = '-';
			}
			$kualifikasi = $this->session->get('kualifikasi');
			if($kualifikasi='')
			{
				$kualifikasi = 0;
			}
			else
			{
				$kode_pendidikan = $this->session->get('kode_pendidikan');
				$kode_pendidikan = substr($kode_pendidikan,0,2);
				//echo $kode_pendidikan;exit();
				if($kode_pendidikan==='00')
				{
					$kualifikasi = 1;
				}			
				elseif($kode_pendidikan==='03' or $kode_pendidikan==='04' or $kode_pendidikan==='05')
				{
					$kualifikasi = 5;
				}
				elseif($kode_pendidikan==='06')
				{
					$kualifikasi = 10;
				}
				elseif($kode_pendidikan==='07' or $kode_pendidikan==='08')
				{
					$kualifikasi = 15;
				}
				elseif($kode_pendidikan==='09')
				{
					$kualifikasi = 20;
					//echo $kode_pendidikan;exit();
				}
				elseif($kode_pendidikan==='10')
				{
					$kualifikasi = 25;
				}
				else
				{
					$kualifikasi = 0;
				}
				
			}
			$kompetensi = $this->session->get('kompetensi');
			if($kompetensi='')
			{
				$kompetensi = 0;
			}
			$kinerja = $this->session->get('kinerja');
			if($kinerja='')
			{
				$kinerja = 0;
			}
			else
			{
				if($kinerja > 0  and $kinerja < 50)
				{
					$kinerja = 1;
				}
				elseif($kinerja > 50 and $kinerja < 61)
				{
					$kinerja = 5;
				}
				elseif($kinerja > 60 and $kinerja < 76)
				{
					$kinerja = 15;
				}
				elseif($kinerja > 75 and $kinerja < 91)
				{
					$kinerja = 25;
				}
				elseif($kinerja > 90 and $kinerja < 101)
				{
					$kinerja = 30;
				}
				else
				{
					$kinerja = 0;
				}
			}
			$disiplin = $this->session->get('disiplin');
			if($disiplin='')
			{
				$disiplin = 0;
			}
			else
			{
				if($disiplin===1)
				{
					$disiplin = 5;
				}
				elseif($disiplin===2)
				{
					$disiplin = 3;
				}
				elseif($disiplin===3)
				{
					$disiplin = 2;
				}
				elseif($disiplin===4)
				{
					$disiplin = 1;
				}
			}
			$data = array(
				'nip'				=> $this->session->get('nip'),
				'nama'				=> $this->session->get('nama_lengkap'),
				'jenis_kelamin'		=> $this->session->get('jenis_kelamin'),
				'jenis_jabatan'		=> $this->session->get('jenis_jabatan'),
				'jenjang_jabatan'	=> $this->session->get('jenjang_jabatan'),
				'instansi'			=> $this->session->get('instansi'),
				'kode_pendidikan'	=> $this->session->get('kode_pendidikan'),
				'pendidikan'		=> $this->session->get('pendidikan'),
				'kualifikasi'		=> $kualifikasi,
				'kompetensi'		=> $kompetensi,
				'kinerja'			=> $kinerja,
				'disiplin'			=> $disiplin,
				'baseline_thn'		=> $thn,
				'tgl_input'			=> date('Y-m-d H:i:s')
			);
			$m_user->nilai_indeks_tambah($data);
		}
		// Proses cek data Indeks Nilai
			
		//$jenisjabatan = $m_user->jenisjabatan();
		$cek_nilai_indeks = $m_user->cek_nilai_indeks($nip,$thn);
	
			$data = [	
						'title'			=> 'Profil PNS ',
						'user'			=> $cek_nilai_indeks,
						'content'		=> 'admin/user/profil'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Ganti Tahun
	public function gantitahun()
	{
		checklogin();
		$tahun =  $this->request->getVar("tahun");
		$this->session->set('tahun',$tahun);
		return redirect()->to(base_url('admin/dasbor'));
		
	}

	// Nilai Indeks
	public function nilaiindeks()
	{
		checklogin();
		$m_user = new User_model();
		$session = \Config\Services::session();
		$total 	= $m_user->total();
		$unitkerja = $m_user->unitkerja();
		$pangkat = $m_user->pangkat();
		$jabatan = $m_user->jabatan();
		$thn = $session->get('tahun');
		$user 	= $m_user->data_nilai_indeks($thn);
		// Start validasi
		
			$data = [	//'title'			=> 'Pengguna Website: '.$total['total'],
						'title'			=> "Listing Nilai Indeks Tahun",
						'user'			=> $user,
						'unitkerja'		=> $unitkerja,
						'jabatan'		=> $jabatan,
						'pangkat'		=> $pangkat,
						'content'		=> 'admin/user/nilaiindeks'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	// Nilai Indeks
	public function rekap()
	{
		checklogin();
		$m_user = new User_model();
		$total 	= $m_user->total();
		$unitkerja = $m_user->unitkerja();
		$pangkat = $m_user->pangkat();
		$jabatan = $m_user->jabatan();
		// Instansi
		$ni1 = $m_user->jumlah_kualifikasi_instansi(); // Nilai Kualifikasi
		$ni2 = $m_user->jumlah_kompetensi_instansi(); // Nilai Kompetensi
		$ni3 = $m_user->jumlah_kinerja_instansi(); // Nilai Kinerja
		$ni4 = $m_user->jumlah_disiplin_instansi(); // Nilai Displin
		// Jenis Kelamin
		// Laki-laki
		$ni5 = $m_user->jumlah_kualifikasi_jk(); // Nilai Kualifikasi
		$ni6 = $m_user->jumlah_kompetensi_jk(); // Nilai Kompetensi
		$ni7 = $m_user->jumlah_kinerja_jk(); // Nilai Kinerja
		$ni8 = $m_user->jumlah_disiplin_jk(); // Nilai Displin
		// Perempuan
		$ni9 = $m_user->jumlah_kualifikasi_jkp(); // Nilai Kualifikasi
		$ni10 = $m_user->jumlah_kompetensi_jkp(); // Nilai Kompetensi
		$ni11 = $m_user->jumlah_kinerja_jkp(); // Nilai Kinerja
		$ni12 = $m_user->jumlah_disiplin_jkp(); // Nilai Displin

		// Jenis Jenis Jabatan Struktural
		$ni13 = $m_user->jumlah_kualifikasi_jenis_jabatan_struktural(); // Nilai Kualifikasi
		$ni14 = $m_user->jumlah_kompetensi_jenis_jabatan_struktural(); // Nilai Kompetensi
		$ni15 = $m_user->jumlah_kinerja_jenis_jabatan_struktural(); // Nilai Kinerja
		$ni16 = $m_user->jumlah_disiplin_jenis_jabatan_struktural(); // Nilai Displin

		// Jenis Jenis Jabatan Fungsional
		$ni17 = $m_user->jumlah_kualifikasi_jenis_jabatan_fungsional(); // Nilai Kualifikasi
		$ni18 = $m_user->jumlah_kompetensi_jenis_jabatan_fungsional(); // Nilai Kompetensi
		$ni19 = $m_user->jumlah_kinerja_jenis_jabatan_fungsional(); // Nilai Kinerja
		$ni20 = $m_user->jumlah_disiplin_jenis_jabatan_fungsional(); // Nilai Displin

		// Jenis Jenis Jabatan Pelaksana
		$ni21 = $m_user->jumlah_kualifikasi_jenis_jabatan_pelaksana(); // Nilai Kualifikasi
		$ni22 = $m_user->jumlah_kompetensi_jenis_jabatan_pelaksana(); // Nilai Kompetensi
		$ni23 = $m_user->jumlah_kinerja_jenis_jabatan_pelaksana(); // Nilai Kinerja
		$ni24 = $m_user->jumlah_disiplin_jenis_jabatan_pelaksana(); // Nilai Displin

		// Jenis Jenjang Jabatan JABATAN PIMPINAN TINGGI UTAMA
		$ni25 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jptu(); // Nilai Kualifikasi
		$ni26 = $m_user->jumlah_kompetensi_jenjang_jabatan_jptu(); // Nilai Kompetensi
		$ni27 = $m_user->jumlah_kinerja_jenjang_jabatan_jptu(); // Nilai Kinerja
		$ni28 = $m_user->jumlah_disiplin_jenjang_jabatan_jptu(); // Nilai Displin

		// Jenis Jenjang Jabatan JABATAN PIMPINAN TINGGI MADYA
		$ni29 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jptm(); // Nilai Kualifikasi
		$ni30 = $m_user->jumlah_kompetensi_jenjang_jabatan_jptm(); // Nilai Kompetensi
		$ni31 = $m_user->jumlah_kinerja_jenjang_jabatan_jptm(); // Nilai Kinerja
		$ni32 = $m_user->jumlah_disiplin_jenjang_jabatan_jptm(); // Nilai Displin

		// Jenis Jenjang JABATAN PIMPINAN TINGGI PRATAMA
		$ni33 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jptp(); // Nilai Kualifikasi
		$ni34 = $m_user->jumlah_kompetensi_jenjang_jabatan_jptp(); // Nilai Kompetensi
		$ni35 = $m_user->jumlah_kinerja_jenjang_jabatan_jptp(); // Nilai Kinerja
		$ni36 = $m_user->jumlah_disiplin_jenjang_jabatan_jptp(); // Nilai Displin

		// Jenis Jenjang JABATAN ADMINISTRATOR
		$ni37 = $m_user->jumlah_kualifikasi_jenjang_jabatan_ja(); // Nilai Kualifikasi
		$ni38 = $m_user->jumlah_kompetensi_jenjang_jabatan_ja(); // Nilai Kompetensi
		$ni39 = $m_user->jumlah_kinerja_jenjang_jabatan_ja(); // Nilai Kinerja
		$ni40 = $m_user->jumlah_disiplin_jenjang_jabatan_ja(); // Nilai Displin

		// Jenis Jenjang JABATAN PENGAWAS
		$ni41 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jp(); // Nilai Kualifikasi
		$ni42 = $m_user->jumlah_kompetensi_jenjang_jabatan_jp(); // Nilai Kompetensi
		$ni43 = $m_user->jumlah_kinerja_jenjang_jabatan_jp(); // Nilai Kinerja
		$ni44 = $m_user->jumlah_disiplin_jenjang_jabatan_jp(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL AHLI UTAMA
		$ni45 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfau(); // Nilai Kualifikasi
		$ni46 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfau(); // Nilai Kompetensi
		$ni47 = $m_user->jumlah_kinerja_jenjang_jabatan_jfau(); // Nilai Kinerja
		$ni48 = $m_user->jumlah_disiplin_jenjang_jabatan_jfau(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL AHLI MADYA
		$ni49 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfamy(); // Nilai Kualifikasi
		$ni50 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfamy(); // Nilai Kompetensi
		$ni51 = $m_user->jumlah_kinerja_jenjang_jabatan_jfamy(); // Nilai Kinerja
		$ni52 = $m_user->jumlah_disiplin_jenjang_jabatan_jfamy(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL AHLI MUDA
		$ni53 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfamu(); // Nilai Kualifikasi
		$ni54 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfamu(); // Nilai Kompetensi
		$ni55 = $m_user->jumlah_kinerja_jenjang_jabatan_jfamu(); // Nilai Kinerja
		$ni56 = $m_user->jumlah_disiplin_jenjang_jabatan_jfamu(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL AHLI PERTAMA
		$ni57 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfap(); // Nilai Kualifikasi
		$ni58 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfap(); // Nilai Kompetensi
		$ni59 = $m_user->jumlah_kinerja_jenjang_jabatan_jfap(); // Nilai Kinerja
		$ni60 = $m_user->jumlah_disiplin_jenjang_jabatan_jfap(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL PENYELIA
		$ni61 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfp(); // Nilai Kualifikasi
		$ni62 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfp(); // Nilai Kompetensi
		$ni63 = $m_user->jumlah_kinerja_jenjang_jabatan_jfp(); // Nilai Kinerja
		$ni64 = $m_user->jumlah_disiplin_jenjang_jabatan_jfp(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL MAHIR
		$ni65 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfm(); // Nilai Kualifikasi
		$ni65 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfm(); // Nilai Kompetensi
		$ni67 = $m_user->jumlah_kinerja_jenjang_jabatan_jfm(); // Nilai Kinerja
		$ni68 = $m_user->jumlah_disiplin_jenjang_jabatan_jfm(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL TERAMPIL
		$ni69 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jft(); // Nilai Kualifikasi
		$ni70 = $m_user->jumlah_kompetensi_jenjang_jabatan_jft(); // Nilai Kompetensi
		$ni71 = $m_user->jumlah_kinerja_jenjang_jabatan_jft(); // Nilai Kinerja
		$ni72 = $m_user->jumlah_disiplin_jenjang_jabatan_jft(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL PEMULA
		$ni73 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfpm(); // Nilai Kualifikasi
		$ni74 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfpm(); // Nilai Kompetensi
		$ni75 = $m_user->jumlah_kinerja_jenjang_jabatan_jfpm(); // Nilai Kinerja
		$ni76 = $m_user->jumlah_disiplin_jenjang_jabatan_jfpm(); // Nilai Displin

		// Jenis Jenjang JABATAN FUNGSIONAL PELAKSANA
		$ni77 = $m_user->jumlah_kualifikasi_jenjang_jabatan_jfpl(); // Nilai Kualifikasi
		$ni78 = $m_user->jumlah_kompetensi_jenjang_jabatan_jfpl(); // Nilai Kompetensi
		$ni79 = $m_user->jumlah_kinerja_jenjang_jabatan_jfpl(); // Nilai Kinerja
		$ni80= $m_user->jumlah_disiplin_jenjang_jabatan_jfpl(); // Nilai Displin

		// TINGKAT PENDIDIKAN S3
		$ni81 = $m_user->jumlah_kualifikasi_tingkat_pendidikan_s3(); // Nilai Kualifikasi
		$ni82 = $m_user->jumlah_kompetensi_tingkat_pendidikan_s3(); // Nilai Kompetensi
		$ni83 = $m_user->jumlah_kinerja_tingkat_pendidikan_s3(); // Nilai Kinerja
		$ni84= $m_user->jumlah_disiplin_tingkat_pendidikan_s3(); // Nilai Displin

		// TINGKAT PENDIDIKAN S2
		$ni85 = $m_user->jumlah_kualifikasi_tingkat_pendidikan_s2(); // Nilai Kualifikasi
		$ni86 = $m_user->jumlah_kompetensi_tingkat_pendidikan_s2(); // Nilai Kompetensi
		$ni87 = $m_user->jumlah_kinerja_tingkat_pendidikan_s2(); // Nilai Kinerja
		$ni88= $m_user->jumlah_disiplin_tingkat_pendidikan_s2(); // Nilai Displin

		// S1/D4/Sederajat
		$ni89 = $m_user->jumlah_kualifikasi_tingkat_pendidikan_s1(); // Nilai Kualifikasi
		$ni90 = $m_user->jumlah_kompetensi_tingkat_pendidikan_s1(); // Nilai Kompetensi
		$ni91 = $m_user->jumlah_kinerja_tingkat_pendidikan_s1(); // Nilai Kinerja
		$ni92= $m_user->jumlah_disiplin_tingkat_pendidikan_s1(); // Nilai Displin

		// S1/D4/Sederajat
		$ni93 = $m_user->jumlah_kualifikasi_tingkat_pendidikan_d3(); // Nilai Kualifikasi
		$ni94 = $m_user->jumlah_kompetensi_tingkat_pendidikan_d3(); // Nilai Kompetensi
		$ni95 = $m_user->jumlah_kinerja_tingkat_pendidikan_d3(); // Nilai Kinerja
		$ni96= $m_user->jumlah_disiplin_tingkat_pendidikan_d3(); // Nilai Displin

		// D2/D1/SMA/SMK Sederajat
		$ni97 = $m_user->jumlah_kualifikasi_tingkat_pendidikan_d2(); // Nilai Kualifikasi
		$ni98 = $m_user->jumlah_kompetensi_tingkat_pendidikan_d2(); // Nilai Kompetensi
		$ni99 = $m_user->jumlah_kinerja_tingkat_pendidikan_d2(); // Nilai Kinerja
		$ni100= $m_user->jumlah_disiplin_tingkat_pendidikan_d2(); // Nilai Displin

		// SD SMP Sederajat
		$ni101 = $m_user->jumlah_kualifikasi_tingkat_pendidikan_sd(); // Nilai Kualifikasi
		$ni102 = $m_user->jumlah_kompetensi_tingkat_pendidikan_sd(); // Nilai Kompetensi
		$ni103 = $m_user->jumlah_kinerja_tingkat_pendidikan_sd(); // Nilai Kinerja
		$ni104= $m_user->jumlah_disiplin_tingkat_pendidikan_sd(); // Nilai Displin

		$user 	= $m_user->listing();
		// Start validasi
		
			$data = [	//'title'			=> 'Pengguna Website: '.$total['total'],
						'title'			=> "<span class='text3'>Listing Nilai Indeks Lainnya</span>",
						'user'			=> $user,
						'ni1'			=> $ni1,
						'ni2'			=> $ni2,
						'ni3'			=> $ni3,
						'ni4'			=> $ni4,
						'ni5'			=> $ni5,
						'ni6'			=> $ni6,
						'ni7'			=> $ni7,
						'ni8'			=> $ni8,
						'ni9'			=> $ni9,
						'ni10'			=> $ni10,
						'ni11'			=> $ni11,
						'ni12'			=> $ni12,
						'ni13'			=> $ni13,
						'ni14'			=> $ni14,
						'ni15'			=> $ni15,
						'ni16'			=> $ni16,
						'ni17'			=> $ni17,
						'ni18'			=> $ni18,
						'ni19'			=> $ni19,
						'ni20'			=> $ni20,
						'ni21'			=> $ni21,
						'ni22'			=> $ni22,
						'ni23'			=> $ni23,
						'ni24'			=> $ni24,
						'ni25'			=> $ni25,
						'ni26'			=> $ni26,
						'ni27'			=> $ni27,
						'ni28'			=> $ni28,
						'ni29'			=> $ni29,
						'ni30'			=> $ni30,
						'ni31'			=> $ni31,
						'ni32'			=> $ni32,
						'ni33'			=> $ni33,
						'ni34'			=> $ni34,
						'ni35'			=> $ni35,
						'ni36'			=> $ni36,
						'ni37'			=> $ni37,
						'ni38'			=> $ni38,
						'ni39'			=> $ni39,
						'ni40'			=> $ni40,
						'ni41'			=> $ni41,
						'ni42'			=> $ni42,
						'ni43'			=> $ni43,
						'ni44'			=> $ni44,
						'ni45'			=> $ni45,
						'ni46'			=> $ni46,
						'ni47'			=> $ni47,
						'ni48'			=> $ni48,
						'ni49'			=> $ni49,
						'ni50'			=> $ni50,
						'ni51'			=> $ni51,
						'ni52'			=> $ni52,
						'ni53'			=> $ni53,
						'ni54'			=> $ni54,
						'ni55'			=> $ni55,
						'ni56'			=> $ni56,
						'ni57'			=> $ni57,
						'ni58'			=> $ni58,
						'ni59'			=> $ni59,
						'ni60'			=> $ni60,
						'ni61'			=> $ni61,
						'ni62'			=> $ni62,
						'ni63'			=> $ni63,
						'ni64'			=> $ni64,
						'ni65'			=> $ni65,
						'ni66'			=> $ni66,
						'ni67'			=> $ni67,
						'ni68'			=> $ni68,
						'ni69'			=> $ni69,
						'ni70'			=> $ni70,
						'ni71'			=> $ni71,
						'ni72'			=> $ni72,
						'ni73'			=> $ni73,
						'ni74'			=> $ni74,
						'ni75'			=> $ni75,
						'ni76'			=> $ni76,
						'ni77'			=> $ni77,
						'ni78'			=> $ni78,
						'ni79'			=> $ni79,
						'ni80'			=> $ni80,
						'ni81'			=> $ni81,
						'ni82'			=> $ni82,
						'ni83'			=> $ni83,
						'ni84'			=> $ni84,
						'ni85'			=> $ni85,
						'ni86'			=> $ni86,
						'ni87'			=> $ni87,
						'ni88'			=> $ni88,
						'ni89'			=> $ni89,
						'ni90'			=> $ni90,
						'ni81'			=> $ni91,
						'ni82'			=> $ni92,
						'ni83'			=> $ni93,
						'ni84'			=> $ni94,
						'ni85'			=> $ni95,
						'ni86'			=> $ni96,
						'ni87'			=> $ni97,
						'ni88'			=> $ni98,
						'ni89'			=> $ni99,
						'ni100'			=> $ni100,
						'ni101'			=> $ni101,
						'ni102'			=> $ni102,
						'ni103'			=> $ni103,
						'ni104'			=> $ni104,
						'content'		=> 'admin/user/rekap'
					];
			echo view('admin/layout/wrapper',$data);
		
	}

}