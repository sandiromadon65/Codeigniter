<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Jabatan Pengurus</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/jabatan_pengurus">Jabatan Pengurus</a></li>
          <li class="breadcrumb-item active">Tambah Jabatan Pengurus</li>
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
          <form method="POST" action="<?= site_url()?>admin/jabatan_pengurus/simpan">

            <div class="form-group">
              <label for="nama_jabatan" class="col-md-3 control-label">Nama Jabatan</label>
              <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" value="<?= set_value('nama_jabatan')?>">
            </div>

            <br>

            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a role="button"  href="<?= site_url()?>admin/jabatan_pengurus" class="btn btn-danger ">CANCEL</a>

          </form>
        </div>
      </div><!-- /.card-body -->
    </div>
  </div><!-- /.container-fluid -->
</section>
