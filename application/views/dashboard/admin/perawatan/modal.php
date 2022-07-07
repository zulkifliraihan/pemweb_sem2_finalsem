<div class="modal fade" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Perawatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="create-data-form" method="POST" action="<?= site_url('dashboard/perawatan/store') ?>">
					<div class="form-group">
						<label for="mobil_id">Pilih Mobil</label>
						<select class="form-control" id="mobil_id" name="mobil_id">
							<option value="">Pilih</option>
							<?php foreach ($mobil as $value): ?>
								<option value="<?= $value->id ?>"><?= $value->nopol ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jenis_perawatan_id">Pilih Jenis Perawatan</label>
						<select class="form-control" id="jenis_perawatan_id" name="jenis_perawatan_id">
							<option value="">Pilih</option>
							<?php foreach ($jenisPerawatan as $value): ?>
								<option value="<?= $value->id ?>"><?= $value->nama ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter Tanggal Perawatan">
					</div>
					<div class="form-group">
						<label for="biaya">Biaya</label>
						<input type="number" class="form-control" id="biaya" name="biaya" placeholder="Enter Biaya Perawatan">
					</div>
					<div class="form-group">
						<label for="km_mobil">KM Mobil</label>
						<input type="number" class="form-control" id="km_mobil" name="km_mobil" placeholder="Enter KM Mobil Perawatan">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" class=""></textarea>
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
				<h4 class="modal-title">Edit Perawatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="edit-data-form" method="POST" action="<?= site_url('dashboard/perawatan/update/:did') ?>">
					<div class="form-group">
						<label for="mobil_id-edit">Pilih Mobil</label>
						<select class="form-control" id="mobil_id-edit" name="mobil_id">
							<option value="">Pilih</option>
							<?php foreach ($mobil as $value): ?>
								<option value="<?= $value->id ?>"><?= $value->nopol ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jenis_perawatan_id-edit">Pilih Jenis Perawatan</label>
						<select class="form-control" id="jenis_perawatan_id-edit" name="jenis_perawatan_id">
							<option value="">Pilih</option>
							<?php foreach ($jenisPerawatan as $value): ?>
								<option value="<?= $value->id ?>"><?= $value->nama ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="tanggal-edit">Tanggal</label>
						<input type="date" class="form-control" id="tanggal-edit" name="tanggal" placeholder="Enter Tanggal Perawatan">
					</div>
					<div class="form-group">
						<label for="biaya-edit">Biaya</label>
						<input type="number" class="form-control" id="biaya-edit" name="biaya" placeholder="Enter Biaya Perawatan">
					</div>
					<div class="form-group">
						<label for="km_mobil-edit">KM Mobil</label>
						<input type="number" class="form-control" id="km_mobil-edit" name="km_mobil" placeholder="Enter KM Mobil Perawatan">
					</div>
					<div class="form-group">
						<label for="deskripsi-edit">Deskripsi</label>
						<textarea class="form-control" id="deskripsi-edit" name="deskripsi" rows="5" class=""></textarea>
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

