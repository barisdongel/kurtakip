<?php
include 'session.php';
if (isset($_GET['takip'])) {
    $id = $_GET['id'];
    //zaten takipdeyse takibi sil
    $query = $db->prepare("SELECT * FROM doviz_takip WHERE uye_id = :uye_id AND doviz_id = :doviz_id");
    $kayit = $query->execute(array(
        'uye_id' => $kullanicicek['id'],
        'doviz_id' => $id
    ));
    $takip = $query->rowCount();
    if ($takip > 0) {
        $query = $db->prepare("DELETE FROM doviz_takip WHERE uye_id = :uye_id AND doviz_id = :doviz_id");
        $sil = $query->execute(array(
            'uye_id' => $kullanicicek['id'],
            'doviz_id' => $id
        ));
        
        if ($sil) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Takipden çıkartıldı.');
            window.location.href='index.php';
            </script>");
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Takip işlemi başarısız.');
            window.location.href='index.php';
            </script>");
        }
    } else {
        $query = $db->prepare("INSERT INTO doviz_takip SET uye_id = :uye_id, doviz_id = :doviz_id");
        $ekle = $query->execute(array(
            'uye_id' => $kullanicicek['id'],
            'doviz_id' => $id
        ));
        if ($ekle) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Takip Başarılı');
            window.location.href='index.php';
            </script>");
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Takip Başarısız');
            window.location.href='index.php';
            </script>");
        }
    }
}