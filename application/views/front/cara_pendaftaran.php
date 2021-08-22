<!-- Data Informasi -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-green">
				<h2>
					Kegiatan Pondok Pesantren Al - Ittihad
				</h2>
			</div>
			<div class="body">
				<div class="col-md-12">
					<form method="POST" action="<?= site_url() ?>admin/santri/simpan" enctype="multipart/form-data">

						<div class="row">
							<div class="col-md-4">
								<div class="form-group" style="border: 2px solid #ccc; padding: 10px;">
									<label>Foto Santri</label><br>
									<input type="file" name="foto" class="btn-file" id="imgInp">
									<br>
									<img class=" img-fluid img-thumbnail" id='img-upload'
										style="width: 300px; margin-top: 10px"
										src="<?= base_url('assets/images/avatar.jpg') ?>">
								</div>
							</div>

							<div class="col-md-8">
								<div class="form-group">
									<label for="nama_santri" class="col-md-3 control-label">Nama Santri</label>
									<input type="text" name="nama_santri" class="form-control" placeholder="Nama Santri"
										value="<?= set_value('nama_santri') ?>">
								</div>

								<div class="form-group timepicker">
									<label>Tanggal Lahir</label>
									<input type="text" class="form-control waktu_picker" name="tgl_lahir"
										value="<?= set_value('tgl_lahir') ?>" placeholder="Klik Untuk Waktu">
								</div>

								<div class="form-group">
									<label class="control-label">Jenis Kelamin</label>
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">
												<input type="radio" name="jenis_kelamin" value="L"
													class="form-control flat-red"
													<?= set_radio('jenis_kelamin', 'L', TRUE); ?>>
												Laki - laki
											</label>
										</div>

										<div class="col-md-3">
											<label class="control-label">
												<input type="radio" name="jenis_kelamin" value="P"
													class="form-control flat-red"
													<?= set_radio('jenis_kelamin', 'P'); ?>>
												Perempuan
											</label>
										</div>

									</div>
								</div>

							</div>

						</div>

						<div class="form-group">
							<label for="informasi" class="col-md-3 control-label">Alamat Lengkap</label>
							<textarea name="alamat" placeholder="Alamat Lengkap" rows="5"
								class="form-control"><?= set_value('alamat') ?></textarea>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Nama Bapak</label>
							<input type="text" name="nama_bapak" class="form-control" placeholder="Nama Bapak"
								value="<?= set_value('nama_bapak') ?>">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Nama Ibu</label>
							<input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu"
								value="<?= set_value('nama_ibu') ?>">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Status</label>
							<input type="text" name="status" class="form-control" placeholder="Status"
								value="<?= set_value('status') ?>">
						</div>

						<div class="form-group timepicker">
							<label>Tanggal Masuk</label>
							<input type="text" class="form-control waktu_picker" name="tgl_masuk"
								value="<?= set_value('tgl_masuk') ?>" placeholder="Klik Untuk Waktu">
						</div>

						<div class="form-group">
							<label>Nama Pengurus</label>
							<select name="id_pengurus_pengajar" class="form-control">
								<option value="">- Pilih Pengurus -</option>
								<?php foreach ($pengurus as $row) : ?>
								<option <?php echo set_select('id_pengurus_pengajar', $row->id_pengurus); ?>
									value="<?= $row->id_pengurus ?>"><?= $row->nama_pengurus ?>
								</option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group">
							<label>Nama Gedung</label>
							<div class="row">
								<div class="col-md-3">
									<label class="control-label">
										<input type="radio" name="nama_gedung" value="Aula Putra"
											class="form-control flat-red"
											<?= set_radio('nama_gedung', 'Aula Putra', TRUE); ?>>
										Aula Putra
									</label>
								</div>

								<div class="col-md-3">
									<label class="control-label">
										<input type="radio" name="nama_gedung" value="Aula Putri"
											class="form-control flat-red"
											<?= set_radio('nama_gedung', 'Aula Putri'); ?>>
										Aula Putri
									</label>
								</div>
							</div>
						</div>

						<br>

						<button type="submit" class="btn btn-primary">SIMPAN</button>
						<a role="button" href="<?= site_url() ?>admin/santri" class="btn btn-danger ">CANCEL</a>

					</form>
				</div>
			</div>
		</div>
	</div>
</div><!-- Main content -->
