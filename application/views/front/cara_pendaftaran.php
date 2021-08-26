<!-- Basic Examples -->
<div class="row clearfix">
    
    <div class="alert alert-success">
        <h3>Cara Pendaftaran</h3>
    </div>
    <div class="col-sm-12 card" style="padding: 20px;">

         <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <td>Nama Pesantren</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>D</td>
                </tr>
                <tr>
                    <td>Kodepos</td>
                    <td>E</td>
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


