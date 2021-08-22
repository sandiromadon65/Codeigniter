<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Santri</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/santri">Santri</a></li>
          <li class="breadcrumb-item active">Edit Santri</li>
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
          <form method="POST" action="<?= site_url('admin/santri/update/' . $santri->id_santri) ?>" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-4">
                <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
                  <label>Foto Santri</label><br>
                  <input type="file" name="foto" class="btn-file" id="imgInp">
                  <br>
                  <?php if (empty($santri->foto)) : ?>
                    <img class="img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('assets/images/avatar.jpg') ?>">
                  <?php else : ?>
                    <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('uploads/santri/' . $santri->foto) ?>">
                  <?php endif ?>
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group">
                  <label for="nama_santri" class="col-md-3 control-label">Nama Santri</label>
                  <input type="text" name="nama_santri" class="form-control" placeholder="Nama Santri" value="<?= isset($santri) ? $santri->nama_santri : '' ?>">
                </div>

                <div class="form-group timepicker">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control waktu_picker" name="tgl_lahir" value="<?= isset($santri) ? $santri->tgl_lahir : '' ?>" placeholder="Klik Untuk Waktu">
                </div>

                <div class="form-group">
                  <label class="control-label">Jenis Kelamin</label>
                  <div class="row">
                    <div class="col-md-3">
                      <label class="control-label">
                        <input type="radio" name="jenis_kelamin" value="L" class="form-control flat-red" <?= $santri->jenis_kelamin == 'L' ? 'checked' : '' ?>>
                        Laki - laki
                      </label>
                    </div>

                    <div class="col-md-3">
                      <label class="control-label">
                        <input type="radio" name="jenis_kelamin" value="P" class="form-control flat-red" <?= $santri->jenis_kelamin == 'P' ? 'checked' : '' ?>>
                        Perempuan
                      </label>
                    </div>

                  </div>
                </div>

              </div>

            </div>

            <div class="form-group">
              <label for="informasi" class="col-md-3 control-label">Alamat Lengkap</label>
              <textarea name="alamat" placeholder="Alamat Lengkap" rows="5" class="form-control"><?= isset($santri) ? $santri->alamat : '' ?></textarea>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Nama Bapak</label>
              <input type="text" name="nama_bapak" class="form-control" placeholder="Nama Bapak" value="<?= isset($santri) ? $santri->nama_bapak : '' ?>">
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Nama Ibu</label>
              <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="<?= isset($santri) ? $santri->nama_ibu : '' ?>">
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Status</label>
              <input type="text" name="status" class="form-control" placeholder="Status" value="<?= isset($santri) ? $santri->status : '' ?>">
            </div>

            <div class="form-group timepicker">
              <label>Tanggal Masuk</label>
              <input type="text" class="form-control waktu_picker" name="tgl_masuk" value="<?= isset($santri) ? $santri->tgl_masuk : '' ?>" placeholder="Klik Untuk Waktu">
            </div>

            <div class="form-group">
              <label>Nama Pengurus</label>
              <select name="id_pengurus_pengajar" class="form-control">
                <option value="">- Pilih Pengurus -</option>
                <?php foreach ($pengurus as $row) : ?>
                  <option <?php echo set_select('id_pengurus_pengajar', $row->id_pengurus, ($santri->id_pengurus_pengajar == $row->id_pengurus ? TRUE : FALSE)); ?> value="<?= $row->id_pengurus ?>"><?= $row->nama_pengurus ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Nama Gedung</label>
              <div class="row">
                <div class="col-md-3">
                  <label class="control-label">
                    <input type="radio" name="nama_gedung" value="Aula Putra" class="form-control flat-red" <?= $santri->nama_gedung == 'Aula Putra' ? 'checked' : '' ?>>
                    Aula Putra
                  </label>
                </div>

                <div class="col-md-3">
                  <label class="control-label">
                    <input type="radio" name="nama_gedung" value="Aula Putri" class="form-control flat-red" <?= $santri->nama_gedung == 'Aula Putri' ? 'checked' : '' ?>>
                    Aula Putri
                  </label>
                </div>
              </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">UPDATE</button>
            <a role="button" href="<?= site_url() ?>admin/santri" class="btn btn-danger ">CANCEL</a>

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