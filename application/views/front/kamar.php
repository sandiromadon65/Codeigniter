<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-green">
                <h2>
                    Data Kamar
                </h2>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kamar</th>
                                <th>Kuota</th>
                                <th>Keterangan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($kamar as $row): ?>
                                <tr>
                                <td>
                                <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $row->nama_kamar?>
                                </td>
                                <td>
                                    <?php  if($row->kuota > 0) {
                                    echo "$row->kuota";
                                  }
                                  else
                                  {
                                    echo "<button type='button' class='btn btn-block btn-success btn-flat'>Sudah Penuh</button>";
                                  } 
                                        ?>
                                </td>
                                <td>
                                    <?= $row->keterangan?>
                                </td>
                                <td>
                                    -
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
