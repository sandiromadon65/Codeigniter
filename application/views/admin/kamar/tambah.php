<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Kamar</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/kamar">Kamar</a></li>
          <li class="breadcrumb-item active">Tambah Kamar</li>
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
          <form method="POST" action="<?= site_url() ?>admin/kamar/simpan" enctype="multipart/form-data">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="nama_santri" class="col-md-3 control-label">Nama Kamar</label>
                  <input type="text" name="nama_kamar" class="form-control" placeholder="Nama Kamar" value="<?= set_value('nama_kamar') ?>">
                </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Kuota</label>
              <input type="text" name="kuota" class="form-control" placeholder="Kuota" value="<?= set_value('kuota') ?>">
            </div>           
            <br>
            <div class="form-group">
              <label for="informasi" class="col-md-3 control-label">Keterangan</label>
              <textarea name="keterangan" placeholder="Masukan Keterangan" rows="5" class="form-control"><?= set_value('Keterangan') ?></textarea>
            </div>

            

            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a role="button" href="<?= site_url() ?>admin/kamar" class="btn btn-danger ">CANCEL</a>

          </form>
        </div>
      </div><!-- /.card-body -->
    </div>
  </div><!-- /.container-fluid -->
</section>

<script>
  $(document).ready(function() {
    $('.waktu_picker').datetimepicker({
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

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    })

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