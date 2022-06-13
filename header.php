<?php include 'session.php';

if (isset($_POST['arama'])) {
    $aranan = $_POST['aranan'];
    $query = $db->prepare("SELECT * FROM dovizler WHERE doviz_adi LIKE '%$aranan%'");
    $query->execute();
    $dovizler = $query->fetchAll(PDO::FETCH_OBJ);
} else {
    //dovizleri çek
    $query = $db->prepare("SELECT * FROM dovizler");
    $query->execute();
    $dovizler = $query->fetchAll(PDO::FETCH_OBJ);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kur Takip Uygulaması</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Kur Takip Uygulaması</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="admin/giris.php">Admin Girişi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Güncel Kurlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="takip-listem.php">Takip Listem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cikis.php">Çıkış Yap</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="" method="POST">
                        <input class="form-control me-2" type="search" name="aranan" placeholder="Doviz Ara" aria-label="Search">
                        <button class="btn btn-outline-success" name="arama" type="submit">Ara</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>