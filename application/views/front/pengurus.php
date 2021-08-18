<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-sm-12">
        <div class="alert alert-success">Menampilkan Data Pengurus Pesantren</div>
    </div>
     <?php foreach ($pengurus as $row): ?>
                    

        <div class="col-sm-12 card" style="padding: 20px;">
            <div class="col-md-4">
                <img style="width: 100%" src="<?= base_url('uploads/pengurus/' . $row->foto_pengurus)?>" alt="" class="img-responsive">
            </div>

            <div class="col-md-8">
                <table class="table table-striped">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?= $row->nama_pengurus?></td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td><?= $row->no_telepon?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <?php if ($row->jenis_kelamin == 'L'): ?>
                                Laki-Laki
                            <?php else: ?>
                                Perempuan
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jabatan
                        </td>
                        <td>
                            <?= $row->nama_jabatan?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

     <?php endforeach ?>

</div>
<!-- #END# Basic Examples -->
