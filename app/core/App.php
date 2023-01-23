<?php

class App{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct(){
        //untuk memanggil ParseURLnya
        $url = $this->parseURL(); 
        //Cek Controller
        if($url==NULL){
            $url=[$this->controller];
        }
        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        //instansiasi agar dapat memanggil Method
        $this->controller = new $this->controller;

        //Cek Method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //Cek Parameter
        if(!empty($url)){
            $this->params = array_values($url);
        }
        //Jalankan Controller,Method dan Parameter (jika ada)
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}