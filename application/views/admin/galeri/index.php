<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Galeri</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Galeri</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-success card-outline">
      <div class="card-header">
        <a href="<?= site_url()?>admin/galeri/tambah" role="button" class="btn btn-success pull-right">
          <i class="fa fa-plus"></i> Tambah Data Galeri
        </a>

        <?php if ($this->session->flashdata('error')): ?>
          <script>
            toastr["error"]("<?= $this->session->flashdata('error') ?>", "Error")
          </script>
        <?php endif ?>

        <?php if ($this->session->flashdata('success')): ?>
          <script>
            toastr["success"]("<?= $this->session->flashdata('success') ?>", "Success")
          </script>
        <?php endif ?>

      </div>
      <div class="card-body">
        <div class="col-md-12 table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <th style="width: 5%">No</th>
                <th style="width: 25%">Foto Galeri</th>
                <th style="width: 23%">Nama Galeri</th>
                <th>Tanggal Posting</th>
                <th>Nama Admin</th>
                <th>Aksi</th>
              </thead>
            <tbody>
              <?php $no = 1; foreach ($galeris as $row):  ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <?php if (empty($row->foto_galeri)): ?>
                    <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('assets/images/no_image.png') ?>">
                    <?php else: ?>
                      <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('uploads/galeri/'.$row->foto_galeri) ?>">
                    <?php endif ?>

                  </td>
                  <td><?= $row->keterangan?></td>
                  <td><?= $row->tgl_posting?></td>
                  <td><?= $row->nama_admin?></td>
                  <td>
                    <a href="<?= site_url('admin/galeri/edit/'.$row->id_galeri) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0);" onclick="deleteGaleri(<?= $row->id_galeri ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>


          </table>

        </div>
      </div><!-- /.card-body -->
    </div>
  </div><!-- /.container-fluid -->


</section>

<script type="text/javascript">

  $(document).ready(function() {
    $('table').DataTable();
  });


  function deleteGaleri(id_galeri) {
    Swal({
      title: 'Apakah Anda Ingin Menghapus Data Ini ?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if(result.value) {
       $.ajax({
        url : '<?= site_url('admin/galeri/hapus/')?>' +id_galeri,
        type: "POST",
        dataType: "JSON",
        success: function(data){
          if(data.success){
            Swal({
              title: "Sukses !",
              text: `${data.message}`,
              type: "success",
            })
            .then((success) => {
              if (success) {
                location.reload();
              }
            });
          }
        },
        error: function(err){
          Swal("Error", "Delete Data Gagal", "error");
        }
      });
     }
   })
  }


</script>

