<?php

class Mahasiswa_model{  
    private $tabel = 'mahasiswa';//Variabel memanggil nama tabel dalam database
    private $db;
    
    public function __construct(){
        $this->db =new Database;//Panggil Wrapper Databasenya
    }

    //Method untuk mengambil data mahasiswa
    public function getMahasiswaall(){
        $this->db->query('SELECT * FROM '. $this->tabel);
        return $this->db->resultSet();
    }
    public function getMahasiswaByNim($nim){
        $this->db->query('SELECT * FROM mahasiswa WHERE nim=:nim');
        $this->db->bind('nim', $nim);
        return $this->db->single();
    }
    public function tambahDataMahasiswa($data){
        $queryinsert = "INSERT INTO mahasiswa VALUES (:nim,:nama,:tempatlahir,'','',:prodi)";
        $this->db->query($queryinsert);
        $this->db->bind('nim',$data['nim']);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('tempatlahir',$data['tempatlahir']);
        $this->db->bind('prodi',$data['prodi']);

        //Eksekusi querynya
        $this->db->execute();
        //Panggil Method untuk menghitung rownya
        return $this->db->rowCount();
    }
    public function hapusDataMahasiswa($nim){
        $querydelete = "DELETE FROM mahasiswa WHERE nim=:nim";
        $this->db->query($querydelete);
        $this->db->bind('nim',$nim);
        
        //Eksekusi querynya
        $this->db->execute();
        //Panggil Method hitung row
        return $this->db->rowCount();
    }
    public function ubahDataMahasiswa($data){
        $queryupdate = "UPDATE mahasiswa SET nama =:nama,tempatlahir=:tempatlahir,prodi=:prodi WHERE nim=:nim";
        $this->db->query($queryupdate);
        $this->db->bind('nim',$data['nim']);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('tempatlahir',$data['tempatlahir']);
        $this->db->bind('prodi',$data['prodi']);
		
		$this->db->execute();
		return $this->db->rowCount();
    }
    public function cariDataMahasiswa(){
        $keyword = $_POST['pencarian'];
        $querycari = "SELECT * FROM mahasiswa WHERE nama LIKE :pencarian";
        $this->db->query($querycari);
        $this->db->bind('pencarian',"%$keyword%");
        return $this->db->resultSet();
     }
}
