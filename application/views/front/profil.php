<!-- Basic Examples -->
<div class="row clearfix">
    
    <div class="alert alert-success">
        <h3>Profil Pesantren</h3>
    </div>
    <div class="col-sm-12 card" style="padding: 20px;">

        <div class="col-md-4">
            <img style="width: 100%" src="<?= base_url('uploads/profil/' . $profil->logo)?>" alt="" class="img-responsive">
        </div>

        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <td>Nama Pesantren</td>
                    <td><?= $profil->nama?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $profil->alamat?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $profil->email?></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td><?= $profil->no_telepon?></td>
                </tr>
                <tr>
                    <td>Kodepos</td>
                    <td><?= $profil->kode_pos?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-sm-12 card" style="padding: 20px;">
        <div class="card">
            <div class="header bg-green">
                <h2>
                    Visi dan Misi
                </h2>
            </div>
            <div class="body">
                <h5>Visi</h5>
                <p>
                    <?= $profil->visi?>
                </p>
                <h5>Misi</h5>
                <p>
                    <?= $profil->misi?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 card" style="padding: 20px;">
        <div class="card">
            <div class="header bg-green">
                <h2>
                    Struktur Organisasi
                </h2>
            </div>
            <div class="body">
                <img src="<?= base_url('uploads/struktur_organisasi/' . $profil->foto_struktur_organisasi)?>" style="width: 100%;" alt="">
            </div>
        </div>
    </div>

    <!-- PETA -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="map" style="height: 400px"></div>
        </div>
    </div>

</div>


