<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Profil Pesantren</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Profil Pesantren</li>
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
        <?php if ($has_profil >= 1) : ?>
          <a href="<?= site_url() ?>admin/profil/tambah" role="button" class="btn btn-success pull-right disabled">
            <i class="fa fa-plus"></i> Tambah Data Profil Pesantren
          </a>
        <?php else : ?>
          <a href="<?= site_url() ?>admin/profil/tambah" role="button" class="btn btn-success pull-right">
            <i class="fa fa-plus"></i> Tambah Data Profil Pesantren
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
              <th style="width: 5%">No</th>
              <th style="width: 15%">Logo</th>
              <th style="width: 15%">Foto Struktur Organisasi</th>
              <th>Nama Pesantren</th>
              <th>Email</th>
              <th>No Telepon</th>
              <th>Nama Admin</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($profil as $row) :  ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <?php if (empty($row->logo)) : ?>
                      <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('assets/images/avatar.jpg') ?>">
                    <?php else : ?>
                      <img class="img-fluid img-thumbnail" style="width: 100%" src="<?= base_url('uploads/profil/' . $row->logo) ?>">
                    <?php endif ?>
                  </td>
                  <td>
                    <?php if (empty($row->logo)) : ?>
                      <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('assets/images/avatar.jpg') ?>">
                    <?php else : ?>
                      <img class="img-fluid img-thumbnail" style="width: 100%" src="<?= base_url('uploads/struktur_organisasi/' . $row->foto_struktur_organisasi) ?>">
                    <?php endif ?>
                  </td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->email ?>

                  </td>
                  <td><?= $row->no_telepon ?></td>
                  <td><?= $row->nama_admin ?></td>
                  <td>
                    <a href="javascript:void(0)" onclick="detailProfil(<?= $row->id_profil ?>)" class="btn btn-primary" title="Detail"><i class="fa fa-eye"></i></a>
                    <a href="<?= site_url('admin/profil/edit/' . $row->id_profil) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                    <!-- <a href="javascript:void(0);" onclick="deleteProfil(<?= $row->id_profil ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a> -->

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
<div class="modal fade" id="modalDetailProfil" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailProfil">Detail Data Profil Pesantren</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tabelDetailProfil" class="table table-bordered">

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('table').DataTable();
  });

  function detailProfil(id_profil) {
    $('#modalDetailProfil').modal('show');
    let output = "";

    $.ajax({
      url: '<?= site_url('admin/profil/detail/') ?>' + id_profil,
      type: "GET",
      dataType: "JSON",
      success: function(response) {
        var data = response.data;

        output += `
        <tr>
        <th colspan="2">
        <img class="img-responsive" style="width: 100%" src="<?= base_url('uploads/profil/') ?>${data.logo}">
        </th>
        </tr>

        <tr>
        <th colspan="2">
        <img class="img-responsive" style="width: 100%" src="<?= base_url('uploads/struktur_organisasi/') ?>${data.foto_struktur_organisasi}">
        </th>
        </tr>

        <tr>
        <th>Nama Pesantren</th>
        <td>${data.nama}</td>
        </tr>

        <tr>
        <th>Visi</th>
        <td>${data.visi}</td>
        </tr>

        <tr>
        <th>Misi</th>
        <td>${data.misi} </td>
        </tr>

        <tr>
        <th>Alamat</th>
        <td>${data.alamat}</td>
        </tr>

        <tr>
        <th>Email</th>
        <td>${data.email}</td>
        </tr>

        <tr>
        <th>No Telepon</th>
        <td>${data.no_telepon}</td>
        </tr>

        <tr>
        <th>Kode POS</th>
        <td>${data.kode_pos}</td>
        </tr>

        `;
        $('#tabelDetailProfil').html(output);

      },
      error: function(err) {
        Swal("Error", "Data Gagal Ditampilkan", "error");
      }
    });
  }

  function deleteProfil(id_profil) {
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
          url: '<?= site_url('admin/profil/hapus/') ?>' + id_profil,
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