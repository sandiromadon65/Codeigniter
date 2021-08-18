<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Kegiatan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/kegiatan">Kegiatan</a></li>
          <li class="breadcrumb-item active">Tambah Kegiatan</li>
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
          <form method="POST" action="<?= site_url() ?>admin/kegiatan/simpan" enctype="multipart/form-data">

            <div class="row">
              <div class="col-12 col-md-5">
                <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
                  <label>Foto Kegiatan</label><br>
                  <input type="file" name="foto_kegiatan" class="btn-file" id="imgInp">
                  <br>
                  <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('assets/images/no_image.png') ?>">
                </div>
              </div>

              <div class="col-12 col-md-7">
                <div class="form-group">
                  <label for="nama_kegiatan" class="col-md-3 control-label">Nama Kegiatan</label>
                  <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan" value="<?= set_value('nama_kegiatan') ?>">
                </div>

                <div class="form-group timepicker">
                  <label>Waktu Kegiatan</label>
                  <input type="text" class="form-control" name="jam" id="waktu_picker" value="<?= set_value('jam') ?>" placeholder="Klik Untuk Waktu">
                </div>

                <div class="form-group">
                  <label for="informasi" class="col-md-3 control-label">Tempat Kegiatan</label>
                  <input type="text" name="tempat" class="form-control" placeholder="Tempat Kegiatan" value="<?= set_value('tempat') ?>">
                </div>
              </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a role="button" href="<?= site_url() ?>admin/kegiatan" class="btn btn-danger ">CANCEL</a>

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
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        previous: 'fa fa-arrow-left',
        next: 'fa fa-arrow-right',
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      },
      useCurrent: true,
    });
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#img-upload').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {

    var input = $(this).parents('.input-group').find(':text'),
      log = label;

    if (input.length) {
      input.val(log);
    } else {
      if (log) alert(log);
    }

  });

  $("#imgInp").change(function() {
    readURL(this);
  });
</script>
</div>