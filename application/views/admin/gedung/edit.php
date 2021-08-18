<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Data Gedung</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/gedung">Gedung</a></li>
          <li class="breadcrumb-item active">Edit Gedung</li>
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
          <form method="POST" action="<?= site_url('admin/gedung/update/' . $gedung->id_gedung) ?>" enctype="multipart/form-data">

            <div class="form-group">
              <label for="nama_gedung" class="col-md-3 control-label">Nama Gedung</label>
              <input type="text" name="nama_gedung" class="form-control" placeholder="Nama Gedung" value="<?= isset($gedung) ? $gedung->nama_gedung : '' ?>">
            </div>

            <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
              <label>Foto Gedung</label><br>
              <input type="file" name="foto_gedung" class="btn-file" id="imgInp">
              <br>

              <?php if (empty($gedung->foto_gedung)) : ?>
                <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('assets/images/no_image.png') ?>">
              <?php else : ?>
                <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('uploads/gedung/' . $gedung->foto_gedung) ?>">
              <?php endif ?>

            </div>

            <div class="form-group">
              <label for="informasi" class="col-md-3 control-label">Keterangan</label>
              <textarea name="keterangan" placeholder="Keterangan" rows="5" class="form-control"><?= isset($gedung) ? $gedung->keterangan : '' ?></textarea>
            </div>

            <br>

            <button type="submit" id="btnSave" class="btn btn-primary">UPDATE</button>
            <a role="button" href="<?= site_url() ?>admin/gedung" class="btn btn-danger ">CANCEL</a>

          </form>
        </div>
      </div><!-- /.card-body -->
    </div>
  </div><!-- /.container-fluid -->
</section>


<script>
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