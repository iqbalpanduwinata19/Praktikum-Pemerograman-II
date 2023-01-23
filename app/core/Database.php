<?php

class Database {
    private $host=DB_HOST;
    private $user=DB_USER;
    private $pass=DB_PASS;
    private $db_name=DB_NAME;

    private $dbh;
    private $statement;

    //Method untuk koneksi
    public function __construct(){
        //Database Source
        $dbsource = 'mysql:host='.$this->host.';dbname='. $this->db_name;

        //Opsi Untuk optimalisasi Koneksi database agar tetap terjaga
        $option=[
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dbsource, $this->user, $this->pass, $option);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //Kita buat Method untuk menampung Query
    public function query($query){
        $this->statement = $this->dbh->prepare($query);
    }
    //Method Binding Data untuk query seperti Where, values, Set dll
    public function bind($param, $value, $type=null){
        //Lakukan pengecekan apakah fungsi ini jalan
        if(is_null($type)){
            switch (true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    //Eksekusi Binding
    public function execute(){
        $this->statement->execute();
    }
    //Menampilkan Banyak Data
    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    //Menampilkan satu data
    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
    //Menghitung jumlah baris / row nya
    public function rowCount(){
        return $this->statement->rowCount();
    }
}
