<?php
class About extends Controller{
    //Method index
    public function index($nama ='Munif',$pekerjaan='Instruktur Lab'){
        $data['nama']=$nama;
        $data['pekerjaan']=$pekerjaan;
        $data['judul']='About Me';
        $this->view('templates/header', $data);
        $this->view('about/index',$data);
        $this->view('templates/footer');
    }
    //Method page
    public function page(){
        $data['judul']='Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
