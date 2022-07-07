<div class="modal fade" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Merk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="create-data-form" method="POST" action="<?= site_url('dashboard/jenisperawatan/store') ?>">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Merk">
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
				<h4 class="modal-title">Edit Merk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="edit-data-form" method="POST" action="<?= site_url('dashboard/jenisperawatan/update/:did') ?>">
					<div class="form-group">
						<label for="nama-edit">Nama</label>
						<input type="text" class="form-control" id="nama-edit" name="nama" placeholder="Enter Nama Merk">
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

