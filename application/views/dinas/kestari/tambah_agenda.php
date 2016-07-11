<div class="container">
	<center>
		<h1>Tambah Agenda</h1>
	</center>
	<?= form_open('dinas/tambah_agenda') ?>
		<div class="form-group">
			<label for="nama">Nama Agenda</label>
			<input class="form-control" type="text" name="nama" />
		</div>
		<div class="form-group">
			<label for="lokasi">Lokasi</label>
			<input class="form-control" type="text" name="lokasi" />
		</div>
		<div class="form-group">
			<label for="waktu_mulai">Waktu Mulai</label>
			<input class="form-control" type="text" name="waktu_mulai" />
		</div>
		<div class="form-group">
			<label for="waktu_selesai">Waktu Selesai</label>
			<input class="form-control" type="text" name="waktu_selesai" />
		</div>
		<div class="form-group">
			<label for="deskripsi">Deskripsi</label>
			<textarea class="form-control" rows="15" name="deskripsi"></textarea>
		</div>
		<div class="form-group">
			<label for="kepanitiaan">Kepanitiaan</label>
			<input type="checkbox" name="kepanitiaan" id="kepanitiaan" />
		</div>
		<div id="panitia">
			<button disabled class="btn btn-danger pull-right" id="tambah_panitia"><i class="glyphicon glyphicon-plus"></i> Tambah Panitia</button>
			<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Panitia 1</h3>
			  	</div>
			  	<div class="panel-body">
			    	<div class="row">
			    		<div class="col-md-6">
			    			<div class="form-group">
			    				<label for="nama_panitia">Nama Panitia</label>
			    				<select class="form-control" name="nama_panitia[]">
			    					<option value="panitia1">Panitia 1</option>
			    					<option value="panitia1">Panitia 2</option>
			    				</select>
			    			</div>
			    		</div>
			    		<div class="col-md-6">
			    			<div class="form-group">
			    				<label for="jabatan_panitia">Jabatan Panitia</label>
			    				<select class="form-control" name="jabatan_panitia[]">
			    					<option value="panitia1">Panitia 1</option>
			    					<option value="panitia1">Panitia 2</option>
			    				</select>
			    			</div>
			    		</div>
			    	</div>
			  	</div>
			</div>
		</div>
	<?= form_close() ?>
</div>