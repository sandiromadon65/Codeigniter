<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/santri">Pengguna</a></li>
                    <li class="breadcrumb-item active">Edit Pengguna</li>
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
                    <form method="POST" action="<?= site_url('admin/users/update/'.$admin->id_admin) ?>">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Admin</label>
                            <input type="text" name="nama_admin" class="form-control" placeholder="Nama Admin" value="<?= isset($admin) ? $admin->nama_admin : '' ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= isset($admin) ? $admin->username : '' ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Konfirmasi Password</label>
                            <input type="password" name="passwordconf" class="form-control" placeholder="Konfirmasi Password">
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <a role="button" href="<?= site_url() ?>admin/users" class="btn btn-danger ">CANCEL</a>

                    </form>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<script>
    $(document).ready(function() {

    });
</script>
</div>