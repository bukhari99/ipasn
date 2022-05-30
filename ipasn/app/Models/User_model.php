<?php 
namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_user','nama','email','username','password','akses_level','kode_rahasia','gambar','keterangan','tanggal_post'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // login
    public function login($username,$password)
    {
        $query = $this->asArray()
        		->where(['username'	=> $username,
        				'password'	=> sha1($password)])
                ->first();
        return $query;
    }

    // Instansi
    public function instansi($id_skpd)
    {
        $builder = $this->db->table('tabel_unitkerja');
        $builder->where('id_unitkerja',$id_skpd);
        $builder->orderBy('tabel_unitkerja.nama_unitkerja','ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // Pangkat
    public function pangkat2($id_pangkat)
    {
        $builder = $this->db->table('tabel_pangkat');
        $builder->where('id_pangkat',$id_pangkat);
        $builder->orderBy('tabel_pangkat.data_pangkat','ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // Jabatan
    public function jabatan2($id_jabatan)
    {
        $builder = $this->db->table('tabel_jabatan');
        $builder->where('kode_jabatan',$id_jabatan);
        $builder->orderBy('tabel_jabatan.nama_jabatan','ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // Pendidikan
    public function pendidikan2($id_jabatan)
    {
        $builder = $this->db->table('tabel_pendidikan');
        $builder->where('id_pendidikan',$id_jabatan);
        $builder->orderBy('tabel_pendidikan.nama_pendidikan','ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // listing
    public function listing()
    {
        $builder = $this->db->table('users')->join('tabel_unitkerja','tabel_unitkerja.id_unitkerja = users.id_skpd')->join('tabel_jabatan','tabel_jabatan.kode_jabatan = users.id_jabatan'); 
        //$builder->orderBy('users.id_user','DESC');
        $builder->where('akun','ASN');
        $builder->orderBy('tabel_unitkerja.id_unitkerja','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function listing2()
    {
        $builder = $this->db->table('users')->join('tabel_unitkerja','tabel_unitkerja.id_unitkerja = users.id_skpd')->join('tabel_jabatan','tabel_jabatan.kode_jabatan = users.id_jabatan'); 
        //$builder->orderBy('users.id_user','DESC');
        $builder->where('akun','ATASAN');
        $builder->orderBy('tabel_unitkerja.id_unitkerja','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function listing3()
    {
        $builder = $this->db->table('users')->join('tabel_unitkerja','tabel_unitkerja.id_unitkerja = users.id_skpd')->join('tabel_jabatan','tabel_jabatan.kode_jabatan = users.id_jabatan'); 
        //$builder->orderBy('users.id_user','DESC');
        $builder->where('akun','VERIFIKATOR');
        $builder->orderBy('tabel_unitkerja.id_unitkerja','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function listing4()
    {
        $builder = $this->db->table('users')->join('tabel_unitkerja','tabel_unitkerja.id_unitkerja = users.id_skpd')->join('tabel_jabatan','tabel_jabatan.kode_jabatan = users.id_jabatan'); 
        //$builder->orderBy('users.id_user','DESC');
        $builder->where('akun','UNIT PENGELOLA PERENCANAAN');
        $builder->orderBy('tabel_unitkerja.id_unitkerja','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function listing5()
    {
        $builder = $this->db->table('users')->join('tabel_unitkerja','tabel_unitkerja.id_unitkerja = users.id_skpd')->join('tabel_jabatan','tabel_jabatan.kode_jabatan = users.id_jabatan'); 
        //$builder->orderBy('users.id_user','DESC');
        $builder->where('akun','PYB');
        $builder->orderBy('tabel_unitkerja.id_unitkerja','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function listing6()
    {
        $builder = $this->db->table('users')->join('tabel_unitkerja','tabel_unitkerja.id_unitkerja = users.id_skpd')->join('tabel_jabatan','tabel_jabatan.kode_jabatan = users.id_jabatan'); 
        //$builder->orderBy('users.id_user','DESC');
        $builder->where('akun','PPK');
        $builder->orderBy('tabel_unitkerja.id_unitkerja','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }


    // total
    public function total()
    {
        $builder = $this->db->table('users');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('users.id_user','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // jabatan
    public function total2()
    {
        $builder = $this->db->table('tabel_jabatan');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('tabel_jabatan.nama_jabatan','ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }

     // pangkat
    public function total3()
    {
        $builder = $this->db->table('tabel_pangkat');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('tabel_pangkat.data_pangkat','ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }
    
    // detail
    public function detail($id_user)
    {
        $builder = $this->db->table('users')->join('tabel_unitkerja','tabel_unitkerja.id_unitkerja = users.id_skpd')->join('tabel_jabatan','tabel_jabatan.kode_jabatan = users.id_jabatan')->join('tabel_pendidikan','tabel_pendidikan.id_pendidikan = users.id_pendidikan');
        $builder->where('id_user',$id_user);
        $builder->orderBy('users.id_user','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // tambah  log
    public function user_log($data)
    {
        $builder = $this->db->table('user_logs');
        $builder->insert($data);
    }

    // Unit Kerja
    public function unitkerja()
    {
        $builder = $this->db->table('tabel_unitkerja');
        $builder->orderBy('tabel_unitkerja.nama_unitkerja','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // Jabatan
    public function jabatan()
    {
        $builder = $this->db->table('tabel_jabatan');
        $builder->orderBy('tabel_jabatan.nama_jabatan','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // Pangkat
    public function pangkat()
    {
        $builder = $this->db->table('tabel_pangkat');
        $builder->orderBy('tabel_pangkat.data_pangkat','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

     // Pegawai
     public function tabel_user()
     {
         $builder = $this->db->table('users');
         $builder->orderBy('users.nama_lengkap','ASC');
         $query = $builder->get();
         return $query->getResultArray();
     }

     // Update
    public function edit($data)
    {
        $builder = $this->db->table('users');
        $builder->where('id_user',$data['id_user']);
        $builder->update($data);
    }

    // Jabatan
    public function jenisjabatan()
    {
        $builder = $this->db->table('tabel_jenisjabatan');
        $builder->orderBy('tabel_jenisjabatan.nama_jenisjabatan','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

     // Pendidikan
     public function pendidikan()
     {
         $builder = $this->db->table('tabel_pendidikan');
         $builder->orderBy('tabel_pendidikan.kode','ASC');
         $query = $builder->get();
         return $query->getResultArray();
     }

     // Verifikasi Pengelola
     public function verifikasipengelola()
     {
         $builder = $this->db->table('tabel_pendidikan');
         $builder->orderBy('tabel_pendidikan.kode','ASC');
         $query = $builder->get();
         return $query->getResultArray();
     }
     // Berdasarkan Instansi ------------------------------------------------------------------------------
     // Hitng Jumlah PNS
    public function jumlahpns()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function jumlah_kualifikasi_instansi()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->select('sum(kualifikasi) AS total_kualifikasi');
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function jumlah_kompetensi_instansi()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->select('sum(kompetensi) AS total_kompetensi');
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function jumlah_kinerja_instansi()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->select('sum(kinerja) AS total_kinerja');
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function jumlah_disiplin_instansi()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->select('sum(disiplin) AS total_disiplin');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // Berdasarkan Jenis Kelamin ------------------------------------------------------------------------------
     // Hitng Jumlah PNS Laki-laki
     public function jumlahpnslakilaki()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->where('jenis_kelamin',1);
         $query = $builder->get();
         return $query->getNumRows();
     }

     public function jumlah_kualifikasi_jk()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kualifikasi) AS total_kualifikasi');
         $builder->where('jenis_kelamin',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kompetensi_jk()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kompetensi) AS total_kompetensi');
         $builder->where('jenis_kelamin',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kinerja_jk()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kinerja) AS total_kinerja');
         $builder->where('jenis_kelamin',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_disiplin_jk()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(disiplin) AS total_disiplin');
         $builder->where('jenis_kelamin',1);
         $query = $builder->get();
         return $query->getRowArray();
     }

     // Hitng Jumlah PNS Perempuan
     public function jumlahpnsperempuan()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->where('jenis_kelamin',2);
         $query = $builder->get();
         return $query->getNumRows();
     }

     public function jumlah_kualifikasi_jkp()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kualifikasi) AS total_kualifikasi');
         $builder->where('jenis_kelamin',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kompetensi_jkp()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kompetensi) AS total_kompetensi');
         $builder->where('jenis_kelamin',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kinerja_jkp()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kinerja) AS total_kinerja');
         $builder->where('jenis_kelamin',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_disiplin_jkp()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(disiplin) AS total_disiplin');
         $builder->where('jenis_kelamin',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
     // Berdasarkan Jenis Jabatan
     // Hitng Jumlah PNS

    // Jabatan Struktural
    public function jumlahpns_jenis_jabatan_struktural()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->where('jenis_jabatan',1); // Jabatan Struktural
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function jumlah_kualifikasi_jenis_jabatan_struktural()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kualifikasi) AS total_kualifikasi');
         $builder->where('jenis_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kompetensi_jenis_jabatan_struktural()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kompetensi) AS total_kompetensi');
         $builder->where('jenis_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kinerja_jenis_jabatan_struktural()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kinerja) AS total_kinerja');
         $builder->where('jenis_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_disiplin_jenis_jabatan_struktural()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(disiplin) AS total_disiplin');
         $builder->where('jenis_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }

     // Jabatan Fungsional
     public function jumlahpns_jenis_jabatan_fungsional()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->where('jenis_jabatan',2); // Jabatan Struktural
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function jumlah_kualifikasi_jenis_jabatan_fungsional()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kualifikasi) AS total_kualifikasi');
         $builder->where('jenis_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kompetensi_jenis_jabatan_fungsional()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kompetensi) AS total_kompetensi');
         $builder->where('jenis_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kinerja_jenis_jabatan_fungsional()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kinerja) AS total_kinerja');
         $builder->where('jenis_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_disiplin_jenis_jabatan_fungsional()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(disiplin) AS total_disiplin');
         $builder->where('jenis_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }

    // Jabatan Pelaksana
    public function jumlahpns_jenis_jabatan_pelaksana()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->where('jenis_jabatan',3); // Jabatan Struktural
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function jumlah_kualifikasi_jenis_jabatan_pelaksana()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kualifikasi) AS total_kualifikasi');
         $builder->where('jenis_jabatan',3);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kompetensi_jenis_jabatan_pelaksana()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kompetensi) AS total_kompetensi');
         $builder->where('jenis_jabatan',3);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kinerja_jenis_jabatan_pelaksana()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kinerja) AS total_kinerja');
         $builder->where('jenis_jabatan',3);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_disiplin_jenis_jabatan_pelaksana()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(disiplin) AS total_disiplin');
         $builder->where('jenis_jabatan',3);
         $query = $builder->get();
         return $query->getRowArray();
     }

     // Berdasarkan Jenjang Jabatan
     // JABATAN PIMPINAN TINGGI UTAMA
     public function jumlahpns_jenjang_jabatan_jptu()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->where('jenis_jabatan',1); // Jabatan Struktural
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function jumlah_kualifikasi_jenjang_jabatan_jptu()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kualifikasi) AS total_kualifikasi');
         $builder->where('jenjang_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kompetensi_jenjang_jabatan_jptu()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kompetensi) AS total_kompetensi');
         $builder->where('jenjang_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kinerja_jenjang_jabatan_jptu()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kinerja) AS total_kinerja');
         $builder->where('jenjang_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_disiplin_jenjang_jabatan_jptu()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(disiplin) AS total_disiplin');
         $builder->where('jenjang_jabatan',1);
         $query = $builder->get();
         return $query->getRowArray();
     }

     // JABATAN PIMPINAN TINGGI MADYA
     public function jumlahpns_jenjang_jabatan_jptm()
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->where('jenis_jabatan',2); // Jabatan Struktural
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function jumlah_kualifikasi_jenjang_jabatan_jptm()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kualifikasi) AS total_kualifikasi');
         $builder->where('jenjang_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kompetensi_jenjang_jabatan_jptm()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kompetensi) AS total_kompetensi');
         $builder->where('jenjang_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_kinerja_jenjang_jabatan_jptm()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(kinerja) AS total_kinerja');
         $builder->where('jenjang_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }
 
     public function jumlah_disiplin_jenjang_jabatan_jptm()
     {
         $builder = $this->db->table('tabel_nilai_indeks');
         $builder->select('sum(disiplin) AS total_disiplin');
         $builder->where('jenjang_jabatan',2);
         $query = $builder->get();
         return $query->getRowArray();
     }

      // JABATAN PIMPINAN TINGGI PRATAMA
      public function jumlahpns_jenjang_jabatan_jptp()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',3); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jptp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',3);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jptp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',3);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jptp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',3);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jptp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',3);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN ADMINISTRATOR
      public function jumlahpns_jenjang_jabatan_ja()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',4); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_ja()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',4);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_ja()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',4);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_ja()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',4);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_ja()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',4);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN PENGAWAS
      public function jumlahpns_jenjang_jabatan_jp()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',5); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',5);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',5);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',5);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',5);
           $query = $builder->get();
           return $query->getRowArray();
       }

        // JABATAN FUNGSIONAL AHLI UTAMA
      public function jumlahpns_jenjang_jabatan_jfau()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',6); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfau()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',6);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfau()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',6);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfau()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',6);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfau()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',6);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN FUNGSIONAL AHLI MADYA
      public function jumlahpns_jenjang_jabatan_jfamy()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',7); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfamy()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',7);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfamy()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',7);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfamy()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',7);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfamy()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',7);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN FUNGSIONAL AHLI MUDA
      public function jumlahpns_jenjang_jabatan_jfamu()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',8); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfamu()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',8);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfamu()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',8);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfamu()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',8);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfamu()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',8);
           $query = $builder->get();
           return $query->getRowArray();
       }

        // JABATAN FUNGSIONAL AHLI PERTAMA
      public function jumlahpns_jenjang_jabatan_jfap()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',9); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfap()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',9);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfap()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',9);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfap()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',9);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfap()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',9);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN FUNGSIONAL PENYELIA
      public function jumlahpns_jenjang_jabatan_jfp()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',10); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',10);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',10);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',10);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfp()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',10);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN FUNGSIONAL MAHIR
      public function jumlahpns_jenjang_jabatan_jfm()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',11); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',11);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',11);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',11);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',11);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN FUNGSIONAL TERAMPIL
      public function jumlahpns_jenjang_jabatan_jft()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',12); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jft()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',12);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jft()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',12);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jft()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',12);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jft()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',12);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN FUNGSIONAL PEMULA
      public function jumlahpns_jenjang_jabatan_jfpm()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',13); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfpm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',13);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfpm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',13);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfpm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',13);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfpm()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',13);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // JABATAN FUNGSIONAL PELAKSANA
      public function jumlahpns_jenjang_jabatan_jfpl()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $builder->where('jenis_jabatan',14); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_jenjang_jabatan_jfpl()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $builder->where('jenjang_jabatan',14);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_jenjang_jabatan_jfpl()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $builder->where('jenjang_jabatan',14);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_jenjang_jabatan_jfpl()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $builder->where('jenjang_jabatan',14);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_jenjang_jabatan_jfpl()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $builder->where('jenjang_jabatan',14);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // TINGKAT PENDIDIKAN
       // S3
      public function jumlahpns_tingkat_pendidikan_s3()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $where = "LEFT(`kode_pendidikan`,2)='10'";
          $builder->where($where); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_tingkat_pendidikan_s3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $where = "LEFT(`kode_pendidikan`,2)='10'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_tingkat_pendidikan_s3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $where = "LEFT(`kode_pendidikan`,2)='10'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_tingkat_pendidikan_s3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $where = "LEFT(`kode_pendidikan`,2)='10'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_tingkat_pendidikan_s3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $where = "LEFT(`kode_pendidikan`,2)='10'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // S2
      public function jumlahpns_tingkat_pendidikan_s2()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $where = "LEFT(`kode_pendidikan`,2)='09'";
          $builder->where($where); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_tingkat_pendidikan_s2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $where = "LEFT(`kode_pendidikan`,2)='09'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_tingkat_pendidikan_s2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $where = "LEFT(`kode_pendidikan`,2)='09'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_tingkat_pendidikan_s2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $where = "LEFT(`kode_pendidikan`,2)='09'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_tingkat_pendidikan_s2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $where = "LEFT(`kode_pendidikan`,2)='09'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // S1/D4/Sederajat
      public function jumlahpns_tingkat_pendidikan_s1()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $where = "LEFT(`kode_pendidikan`,2)='08' or LEFT(`kode_pendidikan`,2)='07'";
          $builder->where($where); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_tingkat_pendidikan_s1()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $where = "LEFT(`kode_pendidikan`,2)='08' or LEFT(`kode_pendidikan`,2)='07'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_tingkat_pendidikan_s1()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $where = "LEFT(`kode_pendidikan`,2)='08' or LEFT(`kode_pendidikan`,2)='07'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_tingkat_pendidikan_s1()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $where = "LEFT(`kode_pendidikan`,2)='08' or LEFT(`kode_pendidikan`,2)='07'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_tingkat_pendidikan_s1()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $where = "LEFT(`kode_pendidikan`,2)='08' or LEFT(`kode_pendidikan`,2)='07'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // D3/Sederajat
      public function jumlahpns_tingkat_pendidikan_d3()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $where = "LEFT(`kode_pendidikan`,2)='06'";
          $builder->where($where); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_tingkat_pendidikan_d3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $where = "LEFT(`kode_pendidikan`,2)='06'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_tingkat_pendidikan_d3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $where = "LEFT(`kode_pendidikan`,2)='06'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_tingkat_pendidikan_d3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $where = "LEFT(`kode_pendidikan`,2)='06'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_tingkat_pendidikan_d3()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $where = "LEFT(`kode_pendidikan`,2)='06'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // D2/D1/SMA/SMK Sederajat
      public function jumlahpns_tingkat_pendidikan_d2()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $where = "LEFT(`kode_pendidikan`,2)='03' or LEFT(`kode_pendidikan`,2)='04' or LEFT(`kode_pendidikan`,2)='05'";
          $builder->where($where); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_tingkat_pendidikan_d2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $where = "LEFT(`kode_pendidikan`,2)='03' or LEFT(`kode_pendidikan`,2)='04' or LEFT(`kode_pendidikan`,2)='05'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_tingkat_pendidikan_d2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $where = "LEFT(`kode_pendidikan`,2)='03' or LEFT(`kode_pendidikan`,2)='04' or LEFT(`kode_pendidikan`,2)='05'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_tingkat_pendidikan_d2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $where = "LEFT(`kode_pendidikan`,2)='03' or LEFT(`kode_pendidikan`,2)='04' or LEFT(`kode_pendidikan`,2)='05'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_tingkat_pendidikan_d2()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $where = "LEFT(`kode_pendidikan`,2)='03' or LEFT(`kode_pendidikan`,2)='04' or LEFT(`kode_pendidikan`,2)='05'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }

       // SD SMP Sederajat
      public function jumlahpns_tingkat_pendidikan_sd()
      {
          $builder = $this->db->table('tabel_nilai_indeks');
          $where = "LEFT(`kode_pendidikan`,2)='01' or LEFT(`kode_pendidikan`,2)='02'";
          $builder->where($where); // Jabatan Struktural
          $query = $builder->get();
          return $query->getNumRows();
      }
  
      public function jumlah_kualifikasi_tingkat_pendidikan_sd()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kualifikasi) AS total_kualifikasi');
           $where = "LEFT(`kode_pendidikan`,2)='01' or LEFT(`kode_pendidikan`,2)='02'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kompetensi_tingkat_pendidikan_sd()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kompetensi) AS total_kompetensi');
           $where = "LEFT(`kode_pendidikan`,2)='01' or LEFT(`kode_pendidikan`,2)='02'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_kinerja_tingkat_pendidikan_sd()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(kinerja) AS total_kinerja');
           $where = "LEFT(`kode_pendidikan`,2)='01' or LEFT(`kode_pendidikan`,2)='02'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }
   
       public function jumlah_disiplin_tingkat_pendidikan_sd()
       {
           $builder = $this->db->table('tabel_nilai_indeks');
           $builder->select('sum(disiplin) AS total_disiplin');
           $where = "LEFT(`kode_pendidikan`,2)='01' or LEFT(`kode_pendidikan`,2)='02'";
           $builder->where($where);
           $query = $builder->get();
           return $query->getRowArray();
       }

     // Kriteria Penilaian Pendidikan
    public function kriteria_penilaian_pendidikan($id_kriteria_penilaian_pendidikan)
    {
        $builder = $this->db->table('tabel_kriteria_penilaian_pendidikan');
        $builder->where('id_kriteria_penilaian_pendidikan',$id_kriteria_penilaian_pendidikan);
        $builder->orderBy('tabel_kriteria_penilaian_pendidikan.nilai','ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // Cek Nilai Indeks
    public function cek_nilai_indeks($nip,$thn)
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->where('nip',$nip);
        $builder->where('baseline_thn',$thn);
        $query = $builder->get();
        return $query->getRowArray();
    }
    
    // Tambah nilai indkes
    public function nilai_indeks_tambah($data)
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->insert($data);
    }

    // listing
    public function data_nilai_indeks($thn)
    {
        $builder = $this->db->table('tabel_nilai_indeks');
        $builder->where('baseline_thn',$thn);
        $builder->orderBy('tabel_nilai_indeks.nama','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

}