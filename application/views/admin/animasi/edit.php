<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Animasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/animasi">Animasi</a></li>
                    <li class="breadcrumb-item active">Edit Animasi</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">

            <div class="card-body">

                <?= validation_errors(); ?>

                <div class="col-md-12">
                    <form method="POST" action="<?= site_url('admin/animasi/update/' . $animasi->id_animasi) ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?= isset($animasi) ? $animasi->keterangan : '' ?>">
                        </div>

                        <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
                            <label>Animasi</label><br>
                            <input type="file" name="animasi" class="btn-file" id="imgInp">
                            <br>

                            <?php if (empty($animasi->animasi)) : ?>
                                <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('assets/images/no_image.png') ?>">
                            <?php else : ?>
                                <div class="mt-4" style="width: 500px">
                                    <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="320" HEIGHT="240" ALIGN="">
                                        <PARAM NAME=movie VALUE="<?= base_url('uploads/animasi/' . $animasi->animasi) ?>">
                                        <PARAM NAME=quality VALUE=high>
                                        <PARAM NAME=bgcolor VALUE=#333399>
                                        <EMBED src="<?= base_url('uploads/animasi/' . $animasi->animasi) ?>" style="width: 800px; height:500px;" quality=high bgcolor=#333399 WIDTH="320" HEIGHT="240" NAME="<?= $animasi->keterangan ?>" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
                                    </OBJECT>
                                </div>

                            <?php endif ?>

                        </div>

                        <div class="form-group timepicker">
                            <label>Tanggal Posting</label>
                            <input type="text" class="form-control" name="tgl_posting" id="waktu_picker" value="<?= isset($animasi) ? $animasi->tgl_posting : '' ?>" placeholder="Klik Untuk Waktu">
                        </div>

                        <br>

                        <button type="submit" id="btnSave" class="btn btn-primary">UPDATE</button>
                        <a role="button" href="<?= site_url() ?>admin/animasi" class="btn btn-danger ">CANCEL</a>

                    </form>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<script>
    $(document).ready(function() {
        $('#waktu_picker').datetimepicker({
            sideBySide: true,
            format: 'YYYY-MM-DD',
            icons: {
                previous: 'fa fa-arrow-left',
                next: 'fa fa-arrow-right',
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            useCurrent: true,
        });
    });
</script>