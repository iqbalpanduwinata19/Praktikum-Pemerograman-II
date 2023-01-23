<?php

class Flashnotif {
    public static function setFlash($pesan, $aksi, $tipe){
        $_SESSION['notif']=[
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];        
    }
    //Method untuk menampilkan Pesannya
    public static function notif(){
        //Lakukan Cek ada atau tidak SESSION nya.
        if(isset($_SESSION['notif'])){
            //Panggil Class Alert yg dicopy dari Web Bootstrap
            echo'<div class="alert alert-' .$_SESSION['notif']['tipe'].' alert-dismissible fade show" role="alert">
                    Data Mahasiswa <strong>' .$_SESSION['notif']['pesan']. '</strong>
                    ' .$_SESSION['notif']['aksi']. '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            //Menghapus Session, Untuk menghilangkan Notif
            unset($_SESSION['notif']);
        }
    }
}
