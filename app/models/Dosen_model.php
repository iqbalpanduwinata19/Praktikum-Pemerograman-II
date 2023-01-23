<?php

class Dosen_model{  
    private $tabel = 'dosen';//Variabel memanggil nama tabel dalam database
    private $db;
    
    public function __construct(){
        $this->db =new Database;//Panggil Wrapper Databasenya
    }
    
    //Method untuk mengambil data mahasiswa
    public function getDosenall(){
        $this->db->query('SELECT * FROM '. $this->tabel);
        return $this->db->resultSet();
    }
    public function getDosenByNidn($nidn){
        $this->db->query('SELECT * FROM dosen WHERE nidn=:nidn');
        $this->db->bind('nidn', $nidn);
        return $this->db->single();
    }
    public function tambahDataDosen($data){
        $queryinsert = "INSERT INTO dosen VALUES (:nidn,:nama,:alamat,:email,:prodi)";
        $this->db->query($queryinsert);
        $this->db->bind('nidn',$data['nidn']);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('prodi',$data['prodi']);

        //Eksekusi querynya
        $this->db->execute();
        //Panggil Method untuk menghitung rownya
        return $this->db->rowCount();
    }
    public function hapusDataDosen($nidn){
        $querydelete = "DELETE FROM dosen WHERE nidn=:nidn";
        $this->db->query($querydelete);
        $this->db->bind('nidn',$nidn);
        
        //Eksekusi querynya
        $this->db->execute();
        //Panggil Method hitung row
        return $this->db->rowCount();
    }
    public function ubahDataDosen($data){
        $queryupdate = "UPDATE dosen SET nama =:nama,alamat=:alamat,email=:email,prodi=:prodi WHERE nidn=:nidn";
        $this->db->query($queryupdate);
        $this->db->bind('nidn',$data['nidn']);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('prodi',$data['prodi']);
		
		$this->db->execute();
		return $this->db->rowCount();
    }
    public function cariDataDosen(){
        $keyword = $_POST['pencarian'];
        $querycari = "SELECT * FROM dosen WHERE nama LIKE :pencarian";
        $this->db->query($querycari);
        $this->db->bind('pencarian',"%$keyword%");
        return $this->db->resultSet();
     }
}