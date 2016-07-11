<div class="container">
	<?= form_open('admin/data') ?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input class="form-control" type="text" name="nama" />
				</div>
				<div class="form-group">
					<label for="nim">NIM</label>
					<input class="form-control" type="text" name="nim" />
				</div>
				<div class="form-group">
					<label for="jurusan">Jurusan</label>
					<input class="form-control" type="text" name="jurusan" />
				</div>
				<div class="form-group">
					<label for="no_hp">No. Hp</label>
					<input class="form-control" type="text" name="no_hp" />
				</div>
				<center>
					<input class="btn btn-success" type="submit" name="submit" value="Submit" />
				</center>
			</div>
		</div>
	<?= form_close() ?>
</div>