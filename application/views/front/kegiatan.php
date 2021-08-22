<!-- Data Informasi -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-green">
                <h2>
                    Kegiatan Pondok Pesantren Al - Ittihad
                </h2>
            </div>
            <div class="body">
                <div class="list-group">
                    <?php foreach ($kegiatan as $row): ?>
                        <a href="javascript:void(0);" class="list-group-item">
                            <?php if ($row->foto_kegiatan == ''): ?>
                                <img class="thumbnail" src="<?= base_url('assets/images/no_image.png')?>" style="width:300px; margin-bottom: 20px">
                            <?php else: ?>
                                <img class="thumbnail" src="<?= base_url('uploads/kegiatan/' . $row->foto_kegiatan)?>" style="width:300px;margin-bottom: 20px">
                            <?php endif ?>
                            
                            <h4 class="list-group-item-heading"><?= $row->nama_kegiatan?></h4>
                            <small><b>Diposting Pada: </b><?= tanggal_indonesia($row->jam)?></small>
                            <p class="list-group-item-text text-justify">
                                <?= $row->tempat?>
                            </p>
                        </a>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>