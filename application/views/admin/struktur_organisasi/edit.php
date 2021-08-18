<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Struktur Organisasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/struktur_organisasi">Struktur Organisasi</a></li>
          <li class="breadcrumb-item active">Tambah Struktur Organisasi</li>
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

        <div class="col-md-12">
          <form method="POST" action="<?= site_url('admin/struktur_organisasi/update/'.$struktur_organisasi->id_struktur_organisasi)?>" enctype="multipart/form-data">

            <div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
              <label>Foto Struktur Organisasi</label><br>
              <input type="file" name="foto_struktur" class="btn-file" id="imgInp">
              <br>
              
              <?php if (empty($struktur_organisasi->foto_struktur)): ?>
                <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('assets/images/no_image.png')?>">
                <?php else: ?>
                  <img class="mt-3 img-fluid img-thumbnail" id='img-upload' style="width: 500px" src="<?= base_url('uploads/struktur_organisasi/'. $struktur_organisasi->foto_struktur)?>">
                <?php endif ?>

              </div>

              <br>

              <button type="submit" class="btn btn-primary">UPDATE</button>
              <a role="button"  href="<?= site_url()?>admin/struktur_organisasi" class="btn btn-danger ">CANCEL</a>

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
