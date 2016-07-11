<?php  
	if (count($data) > 0) {
		foreach ($data as $row) {
			$dinas = array(
				'nama' 		=> $row->dinas,
				'bidang'	=> $row->bidang,
				'username'	=> $row->username
			);
		}
	} else {
		redirect('admin');
		exit;
	}
?>

<div class="container">
	<?php  
		$msg = $this->session->flashdata('msg');
		if (isset($msg)) {
			echo $msg;
		}
	?>
	<?= form_open_multipart('admin/edit_dinas/'.$this->session->flashdata('id_dinas')) ?>

		<div class="form-group">
			<label for="nama">Nama Dinas</label>
			<input class="form-control" type="text" name="nama" value="<?= $dinas['nama'] ?>" />
		</div>
		<div class="form-group">
			<label for="bidang">Bidang</label>
			<input class="form-control" type="text" name="bidang" value="<?= $dinas['bidang'] ?>" />
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" type="text" name="username" value="<?= $dinas['username'] ?>" />
		</div>
		<center>
			<input class="btn btn-success btn-lg" type="submit" name="edit" value="Simpan Perubahan" />
		</center>

	<?= form_close() ?>	
</div>