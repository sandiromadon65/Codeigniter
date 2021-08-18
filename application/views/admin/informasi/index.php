<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Informasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/informasi">Informasi</a></li>
          <li class="breadcrumb-item active">Informasi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <a href="<?= site_url()?>admin/informasi/tambah" role="button" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i> Tambah Data Informasi
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
                <th>Judul Informasi</th>
                <th>Informasi Lengkap</th>
                <th>Waktu Informasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($informasis as $row):  ?>
              <tr>
                <td style="width: 50px"><?= $no++ ?></td>
                <td style="width: 300px"><?= $row->judul?></td>
                <td style="width: 300px"><?= $row->info?></td>
                <td style="width: 300px"><?= $row->waktu?></td>
                <td>
                  <a href="<?= site_url('admin/informasi/edit/'.$row->id_informasi) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="javascript:void(0);" onclick="deleteInformasi(<?= $row->id_informasi ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>

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


  function deleteInformasi(id_informasi) {
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
        url : '<?= site_url('admin/informasi/hapus/')?>' +id_informasi,
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

