<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Pengguna</li>
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
                <a href="<?= site_url() ?>admin/users/tambah" role="button" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Tambah Data Pengguna
                </a>

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
                            <th style="width: 35%">Nama Admin</th>
                            <th style="width: 35%">Username</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($admin as $row) :  ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nama_admin ?></td>
                                    <td><?= $row->username ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/users/edit/' . $row->id_admin) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
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

<script>
    $(document).ready(function() {
        $('table').DataTable();
    });

    function deleteAdmin(id_admin) {
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
                    url: '<?= site_url('admin/users/hapus/') ?>' + id_admin,
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