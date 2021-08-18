<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Animasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/animasi">Animasi</a></li>
                    <li class="breadcrumb-item active">Tambah Animasi</li>
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
                    <form method="POST" action="<?= site_url() ?>admin/animasi/simpan" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?= set_value('keterangan') ?>">
                        </div>

                        <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
                            <label>Animasi</label><br>
                            <input type="file" name="animasi" class="btn-file" id="imgInp" accept=".swf, .gif">
                            <br>
                            <!-- <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('assets/images/no_image.png') ?>"> -->
                        </div>

                        <div class="form-group timepicker">
                            <label>Tanggal Posting</label>
                            <input type="text" class="form-control" name="tgl_posting" id="waktu_picker" value="<?= set_value('tgl_posting') ?>" placeholder="Klik Untuk Waktu">
                        </div>

                        <br>

                        <button type="submit" id="btnSave" class="btn btn-primary">SIMPAN</button>
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