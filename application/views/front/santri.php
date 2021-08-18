<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-green">
                <h2>
                    Data Santri
                </h2>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama Santri</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Tanggal Masuk</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($santri as $row): ?>
                                <tr>
                                <td>
                                    <img src="<?= base_url('uploads/santri/' . $row->foto) ?>" alt="">
                                </td>
                                <td>
                                    <?= $row->nama_santri?>
                                </td>
                                <td>
                                    <?= $row->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' ?>
                                </td>
                                <td>
                                    <?= $row->status?>
                                </td>
                                <td>
                                    <?= $row->tgl_masuk?>
                                </td>
                                <td>
                                    <button onclick="detailDataSantri(<?= $row->id_santri?>)" type="button" class="btn btn-success waves-effect">
                                    <i class="material-icons">remove_red_eye</i>
                                    <span>DETAIL</span>
                                </button>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->

<!-- Modal Dialog Santri Untuk Menampilkan Detail Data Santri -->
<div class="modal fade" id="modalSantri" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Data Santri</h4>
            </div>
            <div class="modal-body">
               <table class="table table-striped" id="tabelDetailSantri">
                <tbody></tbody>
               </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var url = '<?= base_url('santri/detail/')?>';
    var base_image = "<?= base_url('uploads/santri/')?>";
    //fungsi menampilkan data santri
    function detailDataSantri(id) {
        $("#modalSantri").modal('show');
        $.ajax(url + id, {
            type: 'GET',
            success: function(res){
                console.log(res);
                $("#modalSantri .modal-title").text('Profil Santri : ' + res.nama_santri);
                var output = `
                    <tr>
                        <td colspan="2">
                            <img src="${base_image + res.foto}" alt="" />
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Santri</td>
                        <td>${res.nama_santri}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>${getJenisKelamin(res.jenis_kelamin)}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>${res.alamat}</td>
                    </tr>
                    <tr>
                        <td>Nama Wali/Bapak</td>
                        <td>${res.nama_bapak}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>${res.nama_ibu}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>${res.status}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>${res.tgl_lahir}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>${res.tgl_masuk}</td>
                    </tr>
                `;
                $('#tabelDetailSantri > tbody').html(output);
            },
            error: function(err) {

            }
        });
    }

    function getJenisKelamin(jk) {
        if(jk == 'L'){
            return 'Laki-Laki';
        }
        return 'Perempuan';
    }
</script>