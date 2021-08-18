<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Pengurus</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Pengurus</li>
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
        <a href="<?= site_url()?>admin/pengurus/tambah" role="button" class="btn btn-success pull-right">
          <i class="fa fa-plus"></i> Tambah Data Pengurus
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
                <th>Foto Pengurus</th>
                <th>Nama Pengurus</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </thead>
            <tbody>
              <?php $no = 1; foreach ($pengurus as $row):  ?>
              <tr>
                <td style="width: 50px"><?= $no++ ?></td>
                <td style="width: 15%">
                  <?php if (empty($row->foto_pengurus)): ?>
                    <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('assets/images/avatar.jpg') ?>">
                    <?php else: ?>
                      <img class="img-fluid img-thumbnail" style="width: 100%" src="<?= base_url('uploads/pengurus/' .$row->foto_pengurus) ?>">
                    <?php endif ?>

                  </td>
                  <td style="width: 300px"><?= $row->nama_pengurus ?></td>
                  <td style="width: 300px"><?= $row->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' ?>

                </td>
                <td style="width: 300px"><?= $row->no_telepon?></td>
                <td style="width: 300px"><?= $row->nama_jabatan?></td>
                <td>
                  <!-- <a href="javascript:void(0)" onclick="detailPengurus(<?= $row->id_pengurus ?>)" class="btn btn-primary" title="Detail"><i class="fa fa-eye"></i></a> -->
                  <a href="<?= site_url('admin/pengurus/edit/'.$row->id_pengurus) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="javascript:void(0);" onclick="deletePengurus(<?= $row->id_pengurus ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>

                </td>
              </tr>
            <?php endforeach ?>
          </tbody>


        </table>

      </div>
    </div><!-- /.card-body -->
  </div>
</div>
</section>

<script type="text/javascript">

  $(document).ready(function() {
    $('table').DataTable();
  });

  function deletePengurus(id_pengurus) {
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
        url : '<?= site_url('admin/pengurus/hapus/')?>' +id_pengurus,
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

