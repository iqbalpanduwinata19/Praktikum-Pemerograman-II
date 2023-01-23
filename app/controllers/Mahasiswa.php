<?php

class Mahasiswa extends Controller{
    public function index(){
        $data['judul']='Daftar Mahasiswa';
        $data['mhs']=$this->model('Mahasiswa_model')->getMahasiswaall();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
    public function detail($nim){
        $data['judul']='Detail Mahasiswa';
        $data['mhs']=$this->model('Mahasiswa_model')->getMahasiswaByNim($nim);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }
    public function tambah(){
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST)>0){
            //Sebelum diredirect kita set dulu Notifikasinya
            Flashnotif::setFlash('Berhasil','Ditambah','alert alert-success');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        } else{
            //Jika Flash Notifikasinya Gagal
            Flashnotif::setFlash('Gagal','Ditambah','alert alert-danger');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        }
    }
    public function hapus($nim){
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($nim)>0){
            //Sebelum diredirect kita set dulu Notifikasinya
            Flashnotif::setFlash('Berhasil','Dihapus','alert alert-success');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        } else{
            //Jika Flash Notifikasinya Gagal
            Flashnotif::setFlash('Gagal','Dihapus','alert alert-danger');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        }
    }
    public function EditMhs(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaByNim($_POST['nim']));
    }
    public function ubah(){
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST)>0){
            //Sebelum diredirect kita set dulu Notifikasinya
            Flashnotif::setFlash('Berhasil','Diubah','alert alert-success');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        } else{
            //Jika Flash Notifikasinya Gagal
            Flashnotif::setFlash('Gagal','Diubah','alert alert-danger');
            header('Location:'. BASEURL .'/mahasiswa');
            exit;
        }
    }
    public function cari(){
        $data['judul']='Daftar Mahasiswa';
        $data['mhs']=$this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
