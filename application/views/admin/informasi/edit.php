<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Informasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/informasi">Informasi</a></li>
          <li class="breadcrumb-item active">Edit Informasi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">

      <div class="card-body">
        
        <?= validation_errors(); ?>
        
        <div class="col-md-12">
          <form method="POST" action="<?= site_url('admin/informasi/update/'. $informasi->id_informasi )?>">

            <div class="form-group">
              <label for="judul" class="col-md-3 control-label">Judul Informasi</label>
              <input type="text" name="judul" class="form-control" placeholder="Judul Informasi" value="<?= isset($informasi) ? $informasi->judul : '' ?>">
            </div>

            <div class="form-group">
              <label for="informasi" class="col-md-3 control-label">Informasi Lengkap</label>
              <textarea name="info" placeholder="Informasi Lengkap" rows="5" class="form-control"><?= isset($informasi) ? $informasi->info : '' ?></textarea>
            </div>

            <div class="form-group timepicker">
              <label>Waktu Informasi</label>
              <input type="text" class="form-control waktu_picker" name="waktu" value="<?=isset($informasi) ? $informasi->waktu : '' ?>" placeholder="Klik Untuk Waktu" >
            </div>

            <br>

            <button type="submit" class="btn btn-primary">UPDATE</button>
            <a role="button"  href="<?= site_url()?>admin/gedung" class="btn btn-danger ">CANCEL</a>

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

</script>
</div>