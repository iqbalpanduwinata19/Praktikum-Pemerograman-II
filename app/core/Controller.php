<?php

class Controller {
    public function view($view, $data=[]){
        require_once '../app/views/' . $view . '.php';
    }
    public function model($model){
        require_once '../app/models/' .$model . '.php';
        //Diinstansiasi karena bentuknya adalah class
        return new $model;
    }
}
