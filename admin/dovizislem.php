<?php
include '../session.php';

//doviz ekleme
if (isset($_POST['dovizekle'])) {
    $query = $db->prepare("INSERT INTO dovizler SET doviz_kodu=:doviz_kodu, doviz_adi=:doviz_adi");
    $insert = $query->execute(array(
        'doviz_kodu' => $_POST['doviz_kodu'],
        'doviz_adi' => $_POST['doviz_adi']
    ));

    if ($insert) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Döviz Eklendi.');
        window.location.href='index.php';
        </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Döviz eklenemedi.');
        window.location.href='index.php';
        </script>");
    }
}

//doviz silme
if ($_GET['dovizsil']=='ok') {
    $query = $db->prepare("DELETE FROM dovizler WHERE id=:id");
    $delete = $query->execute(array(
        'id' => $_GET['id']
    ));

    if ($delete) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Döviz Silindi.');
        window.location.href='index.php';
        </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Döviz silinemedi.');
        window.location.href='index.php';
        </script>");
    }
}