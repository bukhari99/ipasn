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
        $builder = $this->db->table('tabel_jabatan');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('tabel_jabatan.nama_jabatan','ASC');
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

    

}