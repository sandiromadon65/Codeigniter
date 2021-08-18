<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Animasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Animasi</li>
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
                <a href="<?= site_url() ?>admin/animasi/tambah" role="button" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Tambah Data Animasi
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
                            <th style="width: 25%">Animasi</th>
                            <th style="width: 20%">Nama Animasi</th>
                            <th>Tanggal Posting</th>
                            <th>Nama Admin</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($animasi as $row) :  ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?php if (empty($row->animasi)) : ?>
                                            <img class="img-responsive img-thumbnail" style="width: 100%" src="<?= base_url('assets/images/no_image.png') ?>">
                                        <?php else : ?>
                                            <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="320" HEIGHT="240" ALIGN="">
                                                <PARAM NAME=movie VALUE="<?= base_url('uploads/animasi/' . $row->animasi) ?>">
                                                <PARAM NAME=quality VALUE=high>
                                                <PARAM NAME=bgcolor VALUE=#333399>
                                                <EMBED src="<?= base_url('uploads/animasi/' . $row->animasi) ?>" quality=high bgcolor=#333399 WIDTH="320" HEIGHT="240" NAME="<?= $row->keterangan ?>" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
                                            </OBJECT>
                                        <?php endif ?>

                                    </td>
                                    <td><?= $row->keterangan ?></td>
                                    <td><?= $row->tgl_posting ?></td>
                                    <td><?= $row->nama_admin ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/animasi/edit/' . $row->id_animasi) ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0);" onclick="deleteAnimasi(<?= $row->id_animasi ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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


    function deleteAnimasi(id_animasi) {
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
                    url: '<?= site_url('admin/animasi/hapus/') ?>' + id_animasi,
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