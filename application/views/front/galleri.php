<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-green">
                <h2>
                    GALLERI FOTO PONDOK PESANTREN AL ITTIHAD
                   
                </h2>
            </div>
            <div class="body">
                <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                    <?php if (count($galleri) > 0): ?>
                    
                    <?php else: ?>
                        <div class="col-sm-12 col-lg-12 col-md-12">
                             <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Untuk Saat Ini Data Galleri Belum Tersedia
                            </div>
                        </div>
                    <?php endif ?>
                    <?php foreach ($galleri as $row): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a href="<?= base_url('uploads/galeri/' . $row->foto_galeri)?>" data-sub-html="<?= $row->keterangan?>">
                                <img class="foto-gallery img-responsive thumbnail" src="<?= base_url('uploads/galeri/' . $row->foto_galeri)?>">
                            </a>
                        </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>