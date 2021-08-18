<!-- Data gedung -->
<div class="alert bg-green">
    Menampilkan Data Gedung
</div>
<div id="aniimated-thumbnials" class="row clearfix">
    <?php foreach ($gedung as $row): ?>
        <?php if (count($gedung) > 0): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header" style="margin:0;padding: 0">
                        <a href="<?= base_url('uploads/gedung/' . $row->foto_gedung)?>" data-sub-html="<?= $row->nama_gedung?>">
                            <img style="width:100%; max-height: 150px; background-position: center; object-fit: cover;" src="<?= base_url('uploads/gedung/' . $row->foto_gedung)?>" alt="">
                        </a>
                    </div>
                    
                    <div class="body">
                        <p class="text-center"><?= $row->nama_gedung ?></p>
                    </div>
                </div>
            </div> 
        <?php else: ?>
            <div class="alert alert-danger"> Mohon Maaf Data Belum Tersedia</div>
        <?php endif ?>
       
    <?php endforeach ?>
    
</div>