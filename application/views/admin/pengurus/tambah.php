<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Pengurus</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/pengurus">Pengurus</a></li>
          <li class="breadcrumb-item active">Tambah Pengurus</li>
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
          <form method="POST" action="<?= site_url()?>admin/pengurus/simpan" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-4">
                <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
                  <label>Foto Pengurus</label><br>
                  <input type="file" name="foto_pengurus" class="btn-file" id="imgInp">
                  <br>
                  <img class=" img-fluid img-thumbnail" id='img-upload' style="width: 300px; margin-top: 10px" src="<?= base_url('assets/images/avatar.jpg')?>">
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group">
                  <label for="nama_pengurus" class="col-md-3 control-label">Nama Pengurus</label>
                  <input type="text" name="nama_pengurus" class="form-control" placeholder="Nama Pengurus" value="<?= set_value('nama_pengurus')?>">
                </div>

                <div class="form-group">
                  <label class="control-label">Jenis Kelamin</label>
                  <div class="row">
                    <div class="col-md-3">
                      <label class="control-label">
                        <input type="radio" name="jenis_kelamin" value="L" class="form-control flat-red" <?= set_radio('jenis_kelamin', 'L', TRUE); ?>>
                        Laki - laki
                      </label>
                    </div>

                    <div class="col-md-3">
                      <label class="control-label">
                        <input type="radio" name="jenis_kelamin" value="P" class="form-control flat-red" <?= set_radio('jenis_kelamin', 'P'); ?>>
                        Perempuan
                      </label>
                    </div>
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">No Telepon</label>
                  <input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" value="<?= set_value('no_telepon')?>">
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Jabatan</label>
                  <!-- <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?= set_value('jabatan')?>"> -->

                  <select name="id_jabatan_pengurus" class="form-control">
                    <option value="">- Pilih Jabatan -</option>
                    <?php foreach ($jabatan_pengurus as $row): ?>
                      <option <?php echo set_select('id_jabatan_pengurus', $row->id_jabatan_pengurus); ?> value="<?= $row->id_jabatan_pengurus?>"><?= $row->nama_jabatan?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>

            </div>

          </div>

          <br>

          <button type="submit" class="btn btn-primary">SIMPAN</button>
          <a role="button"  href="<?= site_url()?>admin/pengurus" class="btn btn-danger ">CANCEL</a>

        </form>
      </div>
    </div><!-- /.card-body -->
  </div>
</div><!-- /.container-fluid -->
</section>

<script>

  $(document).ready(function() {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    })

  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
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

    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }

  });

  $("#imgInp").change(function(){
    readURL(this);
  });

</script>
</div>