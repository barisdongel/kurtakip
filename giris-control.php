<?php

ob_start();
session_start();
include 'baglanti.php';

/*Kullanici Girişi*/
if (isset($_POST['login'])) {

    $kullanici_adi = $_POST['kullanici_adi'];
    $kullanici_sifre = $_POST['kullanici_sifre'];

    if ($kullanici_adi && $kullanici_sifre) {

        $kullanicisor = $db->prepare("SELECT * FROM uye where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre");
        $kullanicisor->execute(array(
            'kullanici_adi' => $kullanici_adi,
            'kullanici_sifre' => $kullanici_sifre
        ));
        $say = $kullanicisor->rowCount();

        if ($say > 0) {
            $_SESSION['kullanici_adi'] = $kullanici_adi;
            header('Location:index.php');
        } else {
            header('Location:giris.php?giris=basarisiz');
        }
    }
}