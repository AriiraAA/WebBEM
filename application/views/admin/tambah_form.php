<div class="container">
	<?php 
		$msg = $this->session->flashdata('msg');
		if (isset($msg)) {
			echo $msg;
		}
	?>
	<?= form_open('admin/tambah') ?>

		<div class="form-group">
			<label for="nama">Nama</label>
			<input class="form-control" type="text" name="nama" />
		</div>
		<div class="form-group">
			<label for="nim">NIM</label>
			<input class="form-control" type="text" name="nim" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" />
		</div>
		<div class="form-group">
			<label for="password_conf">Password Again</label>
			<input class="form-control" type="password" name="password_conf" />
		</div>
		<div class="form-group">
			<label for="dinas">Dinas</label>
			<input class="form-control" type="text" name="dinas" />
		</div>
		<div class="form-group">
			<label for="jabatan">Jabatan</label>
			<input class="form-control" type="text" name="jabatan" />
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email" />
		</div>
		<div class="form-group">
			<label for="no_hp">No. Hp</label>
			<input class="form-control" type="text" name="no_hp" />
		</div>
		<center>
			<input class="btn btn-success btn-lg" type="submit" name="tambah" value="Tambah Anggota" />
		</center>

	<?= form_close() ?>
</div>