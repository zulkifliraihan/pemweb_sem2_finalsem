<div class="modal fade" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Mobil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="create-data-form" method="POST" 
					action="<?= site_url('dashboard/mobil/store') ?>"
					enctype='multipart/form-data'
					>
					<div class="form-group">
						<label for="merk_id">Pilih Merk</label>
						<select class="form-control" id="merk_id" name="merk_id">
							<option value="">Pilih</option>
							<?php foreach ($merks as $value): ?>
							<option value="<?= $value->id ?>"><?= $value->nama . ' - ' . $value->produk ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="nopol">Nomor Polisi</label>
						<input type="text" class="form-control" id="nopol" name="nopol"
							placeholder="Enter Nomor Polisi Mobil">
					</div>
					<div class="form-group">
						<label for="warna">Warna</label>
						<input type="text" class="form-control" id="warna" name="warna" placeholder="Enter Warna Mobil">
					</div>
					<div class="form-group">
						<label for="biaya_sewa">Biaya Sewa</label>
						<input type="number" class="form-control" id="biaya_sewa" name="biaya_sewa"
							placeholder="Enter Biaya Sewa Mobil">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" class=""></textarea>
					</div>
					<div class="form-group">
						<label for="cc">CC</label>
						<input type="number" class="form-control" id="cc" name="cc" placeholder="Enter CC Mobil">
					</div>
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun"
							placeholder="Enter Tahun Mobil">
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" class="form-control" id="foto" name="foto" placeholder="Enter Foto Mobil">
					</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Mobil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="edit-data-form" method="POST"
					action="<?= site_url('dashboard/mobil/update/:did') ?>"
					enctype="multipart/form-data"
					>
					<div class="form-group">
						<label for="merk_id-edit">Pilih Merk</label>
						<select class="form-control" id="merk_id-edit" name="merk_id">
							<option value="">Pilih</option>
							<?php foreach ($merks as $value): ?>
							<option value="<?= $value->id ?>"><?= $value->nama . ' - ' . $value->produk ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="nopol-edit">Nomor Polisi</label>
						<input type="text" class="form-control" id="nopol-edit" name="nopol"
							placeholder="Enter Nomor Polisi Mobil">
					</div>
					<div class="form-group">
						<label for="warna-edit">Warna</label>
						<input type="text" class="form-control" id="warna-edit" name="warna" placeholder="Enter Warna Mobil">
					</div>
					<div class="form-group">
						<label for="biaya_sewa-edit">Biaya Sewa</label>
						<input type="number" class="form-control" id="biaya_sewa-edit" name="biaya_sewa"
							placeholder="Enter Biaya Sewa Mobil">
					</div>
					<div class="form-group">
						<label for="deskripsi-edit">Deskripsi</label>
						<textarea class="form-control" id="deskripsi-edit" name="deskripsi" rows="5" class=""></textarea>
					</div>
					<div class="form-group">
						<label for="cc-edit">CC</label>
						<input type="number" class="form-control" id="cc-edit" name="cc" placeholder="Enter CC Mobil">
					</div>
					<div class="form-group">
						<label for="tahun-edit">Tahun</label>
						<input type="number" class="form-control" id="tahun-edit" name="tahun"
							placeholder="Enter Tahun Mobil">
					</div>
					<div class="form-group">
						<label for="foto-edit">Foto</label>
						<input type="file" class="form-control" id="foto-edit" name="foto" placeholder="Enter Foto Mobil">
					</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
