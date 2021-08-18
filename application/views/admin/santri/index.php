<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Santri</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Santri</li>
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
        <a href="<?= site_url()?>admin/santri/tambah" role="button" class="btn btn-success pull-right">
          <i class="fa fa-plus"></i> Tambah Data Santri
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
              <th style="width: 25%">Foto Santri</th>
              <th>Nama Santri</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Nama Pengurus</th>
              <th>Nama Gedung</th>
              <th>Nama Admin</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($santris as $row):  ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <?php if (empty($row->foto)): ?>
                    <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('assets/images/avatar.jpg') ?>">
                    <?php else: ?>
                      <img class="img-fluid img-thumbnail" style="width: 100%" src="<?= base_url('uploads/santri/'.$row->foto) ?>">
                    <?php endif ?>
                  </td>
                  <td style="width: 300px"><?= $row->nama_santri?></td>
                  <td style="width: 300px"><?= $row->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' ?>
                </td>
                <td style="width: 300px"><?= $row->tgl_lahir?></td>
                <td><?= $row->nama_pengurus ?></td>
                <td><?= $row->nama_gedung ?></td>
                <td><?= $row->nama_admin ?></td>
                <td>
                  <a href="javascript:void(0)" onclick="detailSantri(<?= $row->id_santri ?>)" class="btn btn-primary" title="Detail"><i class="fa fa-eye"></i></a>
                  <a href="<?= site_url('admin/santri/edit/'.$row->id_santri) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="javascript:void(0);" onclick="deleteSantri(<?= $row->id_santri ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="modalDetailSantri" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailSantri">Detail Data Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tabelDetailSantri" class="table table-bordered">

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  $(document).ready(function() {
    $('table').DataTable();
  });

  function detailSantri(id_santri) {
    $('#modalDetailSantri').modal('show');
    let output = "";

    $.ajax({
      url : '<?= site_url('admin/santri/detail/') ?>' +id_santri,
      type: "GET",
      dataType: "JSON",
      success: function(response){
        var data = response.data;

        output+=`
        <tr>
        <th colspan="2">
        <img class="img-responsive" style="width: 100%" src="<?= base_url('uploads/santri/') ?>${data.foto}">
        </th>     
        </tr>

        <tr>
        <th>Nama Santri</th>
        <td>${data.nama_santri}</td>
        </tr>

        <tr>
        <th>Tanggal Lahir</th>
        <td>${data.tgl_lahir}</td>
        </tr>

        <tr>
        <th>Jenis Kelamin</th>
        <td>${data.jenis_kelamin == 'L' ? "Laki - Laki" : "Perempuan"} </td>
        </tr>

        <tr>
        <th>Alamat</th>
        <td>${data.alamat}</td>
        </tr>

        <tr>
        <th>Nama Bapak</th>
        <td>${data.nama_bapak}</td>
        </tr>

        <tr>
        <th>Nama Ibu</th>
        <td>${data.nama_ibu}</td>
        </tr>

        <tr>
        <th>Status</th>
        <td>${data.status}</td>
        </tr>

        <tr>
        <th>Tanggal Masuk</th>
        <td>${data.tgl_masuk}</td>
        </tr>

        <tr>
        <th>Nama Pengurus</th>
        <td>${data.nama_pengurus}</td>
        </tr>

        <tr>
        <th>Nama Gedung</th>
        <td>${data.nama_gedung}</td>
        </tr>

        <tr>
        <th>Nama Admin</th>
        <td>${data.nama_admin}</td>
        </tr>

        `;
        $('#tabelDetailSantri').html(output);

      },
      error: function(err){
        Swal("Error", "Data Gagal Ditampilkan", "error");
      }
    });
  }


  function deleteSantri(id_santri) {
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
        url : '<?= site_url('admin/santri/hapus/')?>' +id_santri,
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

