<?php
include '../session.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kur Takip Uygulaması Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="../index.php" target="_blank">Siteye Git</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cikis.php">Çıkış Yap</a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="dovizislem.php" method="POST">
                    <div class="alert alert-info"><a target="_blank" href="https://finans.truncgil.com/v3/today.json">Bu Json verisini</a> referans alarak döviz kodu ekleyin.</div>
                    <div class="mb-3">
                        <label class="form-label">Döviz Kodu</label>
                        <input type="text" class="form-control" name="doviz_kodu" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Döviz Adı</label>
                        <input type="text" class="form-control" name="doviz_adi" required>
                    </div>

                    <button type="submit" name="dovizekle" class="btn btn-success">Ekle</button>
                </form>

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Döviz Kodu</th>
                                    <th scope="col">Döviz Adı</th>
                                    <th scope="col">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $db->query("SELECT * FROM dovizler");
                                $dovizler = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($dovizler as $doviz) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $doviz['id'] . '</th>';
                                    echo '<td>' . $doviz['doviz_kodu'] . '</td>';
                                    echo '<td>' . $doviz['doviz_adi'] . '</td>';
                                    echo '<td><a href="dovizislem.php?dovizsil=ok&id=' . $doviz['id'] . '" class="btn btn-danger">Sil</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>