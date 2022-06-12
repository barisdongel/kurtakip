<?php
include 'header.php';
include 'doviz.php';
?>

<section class="m-5">
    <div class="container">
        <div class="row">
            <h2 class="text-center">Güncel Döviz Kurları</h2>
            <hr>
            <?php
            //dovizleri çek
            $query = $db->prepare("SELECT * FROM dovizler INNER JOIN doviz_takip ON dovizler.id = doviz_takip.doviz_id WHERE doviz_takip.uye_id = :uye_id");
            $query->execute(array(
                'uye_id' => $kullanicicek['id']
            ));
            $dovizler = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($dovizler as $doviz) { ?>
                <div class="col-md-3 mb-5">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title p-2"><?= $doviz->doviz_adi ?></h5>
                            <h6 class="card-subtitle p-2 text-muted"><span class="text-success">Satış : <?= getDoviz($doviz->doviz_kodu, 'Buying') ?> ₺ </span></h6>
                            <h6 class="card-subtitle p-2 text-muted"><span class="text-danger">Alış : <?= getDoviz($doviz->doviz_kodu, 'Selling') ?> ₺ </span></h6>
                            <div class="islemler">
                                <a href="takip.php?takip=ok&id=<?= $doviz->doviz_id ?>" class="card-link btn btn-danger">Takibi Bırak</a>
                                <a href="#" class="card-link btn btn-primary">Detaylı İncele</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>