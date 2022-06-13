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

            foreach ($dovizler as $doviz) { ?>
                <div class="col-md-3 mb-5">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title p-2"><?= $doviz->doviz_adi ?></h5>
                            <h6 class="card-subtitle p-2 text-muted"><span class="text-success">Satış : <?= getDoviz($doviz->doviz_kodu, 'Buying') ?> ₺</span></h6>
                            <h6 class="card-subtitle p-2 text-muted"><span class="text-danger">Alış : <?= getDoviz($doviz->doviz_kodu, 'Selling') ?> ₺ </span></h6>
                            <div class="islemler">
                                <?php
                                //takibe alındıysa butonu gizle
                                $takip_sorgu = $db->prepare("SELECT * FROM doviz_takip WHERE doviz_id = :doviz_id and uye_id = :uye_id");
                                $takip_sorgu->execute(array(
                                    'uye_id' => $kullanicicek['id'],
                                    'doviz_id' => $doviz->id
                                ));
                                $takip_say = $takip_sorgu->rowCount();
                                if ($takip_say < 1) { ?>
                                    <a href="takip.php?takip=ok&id=<?= $doviz->id ?>" class="card-link btn btn-success">Takibe Al</a>
                                <?php } else { ?>
                                    <a href="takip.php?takip=ok&id=<?= $doviz->id ?>" class="card-link btn btn-danger">Takibi Bırak</a>
                                <?php } ?>
                                <a href="#" class="card-link btn btn-primary">Detaylı İncele</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>