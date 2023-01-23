<?php
class Dosen extends Controller{
    public function index(){
        $data['judul']='Daftar Dosen';
        $data['dosen']=$this->model('Dosen_model')->getDosenall();
        $this->view('templates/header', $data);
        $this->view('dosen/index', $data);
        $this->view('templates/footer');
    }
    public function detail($nidn){
        $data['judul']='Detail Dosen';
        $data['dosen']=$this->model('Dosen_model')->getDosenByNidn($nidn);
        $this->view('templates/header', $data);
        $this->view('dosen/detail', $data);
        $this->view('templates/footer');
    }
    public function tambah(){
        if($this->model('Dosen_model')->tambahDataDosen($_POST)>0){
            //Sebelum diredirect kita set dulu Notifikasinya
            Flashnotif::setFlash('Berhasil','Ditambah','alert alert-success');
            header('Location:'. BASEURL .'/dosen');
            exit;
        } else{
            //Jika Flash Notifikasinya Gagal
            Flashnotif::setFlash('Gagal','Ditambah','alert alert-danger');
            header('Location:'. BASEURL .'/dosen');
            exit;
        }}
    
        public function hapus($nidn){
            if($this->model('Dosen_model')->hapusDataDosen($nidn)>0){
                //Sebelum diredirect kita set dulu Notifikasinya
                Flashnotif::setFlash('Berhasil','Dihapus','alert alert-success');
                header('Location:'. BASEURL .'/dosen');
                exit;
            } else{
                //Jika Flash Notifikasinya Gagal
                Flashnotif::setFlash('Gagal','Dihapus','alert alert-danger');
                header('Location:'. BASEURL .'/dosen');
                exit;
            }
        }
        public function EditDosen(){
            echo json_encode($this->model('Dosen_model')->getDosenByNidn($_POST['nidn']));
        }
        public function ubah(){
            if($this->model('Dosen_model')->ubahDataDosen($_POST)>0){
                //Sebelum diredirect kita set dulu Notifikasinya
                Flashnotif::setFlash('Berhasil','Diubah','alert alert-success');
                header('Location:'. BASEURL .'/dosen');
                exit;
            } else{
                //Jika Flash Notifikasinya Gagal
                Flashnotif::setFlash('Gagal','Diubah','alert alert-danger');
                header('Location:'. BASEURL .'/dosen');
                exit;
            }
        }
        public function cari(){
            $data['judul']='Daftar Dosen';
            $data['nidn']=$this->model('Dosen_model')->cariDataDosen();
            $this->view('templates/header', $data);
            $this->view('dosen/index', $data);
            $this->view('templates/footer');
        }}
    
    