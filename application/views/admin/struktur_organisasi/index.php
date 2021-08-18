<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Struktur Organisasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Struktur Organisasi</li>
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

        <?php if ($has_struktur_organisasi == 1) : ?>
          <a href="<?= site_url() ?>admin/struktur_organisasi/tambah" role="button" class="btn btn-success pull-right disabled">
            <i class="fa fa-plus"></i> Tambah Data Struktur Organisasi
          </a>
        <?php else : ?>
          <a href="<?= site_url() ?>admin/struktur_organisasi/tambah" role="button" class="btn btn-success pull-right">
            <i class="fa fa-plus"></i> Tambah Data Struktur Organisasi
          </a>

        <?php endif ?>

        <?php if ($this->session->flashdata('error')) : ?>
          <script>
            toastr["error"]("<?= $this->session->flashdata('error') ?>", "Error")
          </script>
        <?php endif ?>

        <?php if ($this->session->flashdata('success')) : ?>
          <script>
            toastr["success"]("<?= $this->session->flashdata('success') ?>", "Success")
          </script>
        <?php endif ?>

      </div>
      <div class="card-body">
        <div class="col-md-12 table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <!-- <tr> -->
              <th style="width: 5%">No</th>
              <th style="width: 70%">Foto Struktur</th>
              <th>Aksi</th>
              <!-- </tr> -->
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($struktur_organisasi as $row) :  ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <?php if (empty($row->foto_struktur)) : ?>
                      <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('assets/images/no_image.png') ?>">
                    <?php else : ?>
                      <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('uploads/struktur_organisasi/' . $row->foto_struktur) ?>">
                    <?php endif ?>

                  </td>
                  <td>
                    <a href="<?= site_url('admin/struktur_organisasi/edit/' . $row->id_struktur_organisasi) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0);" onclick="deleteStruktur(<?= $row->id_struktur_organisasi ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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

  function deleteStruktur(id_struktur_organisasi) {
    Swal({
      title: 'Apakah Anda Ingin Menghapus Data Ini ?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '<?= site_url('admin/struktur_organisasi/hapus/') ?>' + id_struktur_organisasi,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            if (data.success) {
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
          error: function(err) {
            Swal("Error", "Delete Data Gagal", "error");
          }
        });
      }
    })
  }
</script>