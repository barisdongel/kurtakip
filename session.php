<?php
ob_start();
session_start();
include 'baglanti.php';

$kullanicisor = $db->prepare("SELECT * FROM uye WHERE kullanici_adi=:kullanici_adi");
$kullanicisor->execute(array(
    'kullanici_adi' => $_SESSION['kullanici_adi']
));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);


if (!isset($_SESSION['kullanici_adi'])) {
    header('location:giris.php');
}
?>