<?php
session_start();
unset($_SESSION['kullanici_adi']);
header('Location:giris.php');
?>