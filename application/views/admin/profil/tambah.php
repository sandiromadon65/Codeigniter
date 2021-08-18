<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Profil Pesantren</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/profil">Profil Pesantren</a></li>
          <li class="breadcrumb-item active">Tambah Profil Pesantren</li>
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
          <form method="POST" action="<?= site_url() ?>admin/profil/simpan" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
                  <label>Logo</label><br>
                  <input type="file" name="logo" class="btn-file" id="imgInp">
                  <br>
                  <img class=" img-fluid img-thumbnail" id='img-upload' style="width: 300px; margin-top: 10px" src="<?= base_url('assets/images/no_image.png') ?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
                  <label>Foto Struktur Organisasi</label><br>
                  <input type="file" name="foto_struktur_organisasi" class="btn-file2" id="imgInp2">
                  <br>
                  <img class="mt-3 img-fluid img-thumbnail2" id='img-upload2' style="width: 300px" src="<?= base_url('assets/images/no_image.png') ?>">
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="nama" class="col-md-3 control-label">Nama Pesantren</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Pesantren" value="<?= set_value('nama') ?>">
            </div>

            <div class="form-group">
              <label class="control-label">Visi</label>
              <textarea name="visi" placeholder="Visi" rows="8" class="form-control"><?= set_value('visi') ?></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Misi</label>
              <textarea name="misi" placeholder="Misi" rows="10" class="form-control"><?= set_value('misi') ?></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Alamat</label>
              <textarea name="alamat" placeholder="Alamat" rows="5" class="form-control"><?= set_value('alamat') ?></textarea>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">No Telepon</label>
              <input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" value="<?= set_value('no_telepon') ?>">
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Kode POS</label>
              <input type="text" name="kode_pos" class="form-control" placeholder="Kode POS" value="<?= set_value('kode_pos') ?>">
            </div>

        </div>

        <br>

        <button type="submit" class="btn btn-primary">SIMPAN</button>
        <a role="button" href="<?= site_url() ?>admin/profil" class="btn btn-danger ">CANCEL</a>

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

  function readURL2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#img-upload2').attr('src', e.target.result);
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

  $("#imgInp2").change(function() {
    readURL2(this);
  });
</script>
</div>