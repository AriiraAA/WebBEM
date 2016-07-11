<div class="container">
	<?php 
		$msg = $this->session->flashdata('msg');
		if (isset($msg)) {
			echo $msg;
		}
	?>
	<?= form_open('anggota/ubah_password') ?>

		<div class="form-group">
			<label for="password_lama">Password Lama</label>
			<input class="form-control" type="password" name="password_lama" />
		</div>
		<div class="form-group">
			<label for="password_baru">Password Baru</label>
			<input class="form-control" type="password" name="password_baru" />
		</div>
		<div class="form-group">
			<label for="password_conf">Password Again</label>
			<input class="form-control" type="password" name="password_conf" />
		</div>
		<center>
			<input class="btn btn-success btn-lg" type="submit" name="ubah" value="Ubah Password" />
		</center>

	<?= form_close() ?>
</div>