<div class="modal fade" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="create-data-form" method="POST" action="<?= site_url('dashboard/user/store') ?>">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select class="form-control" name="role" id="role">
							<option value="">Pilih</option>
							<option value="administrator">Administrator</option>
							<option value="public">Public</option>
						</select>
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
				<h4 class="modal-title">Edit User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="edit-data-form" method="POST" action="<?= site_url('dashboard/user/update/:did') ?>">
					<div class="form-group">
						<label for="username-edit">Username</label>
						<input type="text" class="form-control" id="username-edit" name="username" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label for="email-edit">Email address</label>
						<input type="email" class="form-control" id="email-edit" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="password-edit">Password</label>
						<input type="password" class="form-control" id="password-edit" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="role-edit">Role</label>
						<select class="form-control" name="role" id="role-edit">
							<option value="">Pilih</option>
							<option value="administrator">Administrator</option>
							<option value="public">Public</option>
						</select>
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

