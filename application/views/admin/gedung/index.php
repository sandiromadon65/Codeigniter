<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Gedung</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Gedung</li>
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
        <a href="<?= site_url()?>admin/gedung/tambah" role="button" class="btn btn-success pull-right">
          <i class="fa fa-plus"></i> Tambah Data Gedung
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
              <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Foto Gedung</th>
                <th style="width: 20%">Nama Gedung</th>
                <th style="width: 35%">Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($gedung as $row):  ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <?php if (empty($row->foto_gedung)): ?>
                    <img class="img-responsive img-thumbnail"  src="<?= base_url('assets/images/no_image.png') ?>">
                    <?php else: ?>
                      <img class="img-responsive img-thumbnail" src="<?= base_url('uploads/gedung/'.$row->foto_gedung) ?>">
                    <?php endif ?>
                  </td>
                  <td><?= $row->nama_gedung ?></td>
                  <td><?= $row->keterangan ?></td>
                  <td>
                    <a href="<?= site_url('admin/gedung/edit/'.$row->id_gedung) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0);" onclick="deleteGedung(<?= $row->id_gedung ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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

  function deleteGedung(id_gedung) {
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
        url : '<?= site_url('admin/gedung/hapus/')?>' +id_gedung,
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

