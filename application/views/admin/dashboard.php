<div class="container">
	<ul class="nav nav-tabs">
	  	<li class="active"><a data-toggle="tab" href="#anggota">Daftar Anggota</a></li>
	  	<li><a data-toggle="tab" href="#dinas">Dinas</a></li>
	  	<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
	</ul>

	<div class="tab-content">
	  	<div id="anggota" class="tab-pane fade in active">
	    	<center>
				<h1>Daftar Anggota BEM KM Fasilkom Unsri</h1>
			</center>
			<?php  
				$msg = $this->session->flashdata('msg');
				if (isset($msg)) {
					echo $msg;
				}
			?>
			<a class="btn btn-warning pull-left" href="<?= base_url('admin/tambah') ?>"><i class="glyphicon glyphicon-plus"></i> Tambah Anggota</a>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Dinas</th>
						<th>Jabatan</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 0; foreach ($data_anggota as $row): ?>
						<tr>
							<td><?= ++$i ?></td>
							<td>
								<img src="https://akademik.unsri.ac.id/images/foto_mhs/20<?= $row->username[7] . $row->username[8] ?>/<?= $row->username ?>.jpg" width="100" height="134" />
							</td>
							<td><?= $row->username ?></td>
							<td><?= $row->nama ?></td>
							<td><?= $row->dinas ?></td>
							<td><?= $row->jabatan ?></td>
							<td><a href="<?= base_url('admin/edit/'.$row->username) ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
								<?= form_open('admin/delete/'.$row->username, array('style' => 'display: inline;')) ?>
									<button type="submit" class="btn btn-danger" onclick="conf(); return false;"><i class="glyphicon glyphicon-trash"></i> Delete</button>
								<?= form_close() ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
	  	</div>
	  	<div id="dinas" class="tab-pane fade">
	    	<center>
	    		<h1>Daftar Dinas BEM KM Fasilkom Unsri</h1>
	    	</center>
	    	<table class="table table-striped table-hover">
	    		<thead>
	    			<tr>
	    				<th>No</th>
	    				<th>Logo</th>
	    				<th>Nama</th>
	    				<th>Bidang</th>
	    				<th></th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php foreach ($data_dinas as $row): ?>
	    				<tr>
	    					<td><?= $row->id ?></td>
	    					<td><img align="middle" src="<?= base_url('assets/img/logo/'.$row->id.'.png') ?>" /></td>
	    					<td><?= $row->dinas ?></td>
	    					<td><?= $row->bidang ?></td>
	    					<td><a href="<?= base_url('admin/edit_dinas/'.$row->id) ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
								<?php  form_open('admin/delete_dinas/'.$row->id, array('style' => 'display: inline;')) ?>
									<button type="submit" class="btn btn-danger" onclick="conf(); return false;"><i class="glyphicon glyphicon-trash"></i> Delete</button>
								<?php form_close() ?>
							</td>
	    				</tr>
	    			<?php endforeach; ?>
	    		</tbody>
	    	</table>
	  	</div>
	  	<div id="menu2" class="tab-pane fade">
	    	<h3>Menu 2</h3>
	    	<p>Some content in menu 2.</p>
	  	</div>
	</div>
</div>
<script type="text/javascript">
	function conf() {
		var c = confirm("Apakaha anda yakin menghapus data anggota ini?");
		if (c) {
			this.submit();
		}
	}
</script>