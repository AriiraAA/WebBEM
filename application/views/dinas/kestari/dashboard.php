<style type="text/css">
	.my-custom-table tr td:first-child {
		font-weight: bold;
	}
</style>
<div class="container">
	<div class="pull-right">
		<a class="btn btn-warning" href="<?= base_url('dinas/tambah_agenda') ?>"><i class="glyphicon glyphicon-plus"></i> Tambah Agenda</a>
	</div>
	<?php foreach ($agenda as $row): ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?= $row->nama ?></h3>
			</div>
			<div class="panel-body">
				<p><?= $row->deskripsi ?></p>
				<table class="table my-custom-table">
					<tr>
						<td width="100">Lokasi</td>
						<td><?= $row->lokasi ?></td>
					</tr>
					<tr>
						<td>Mulai</td>
						<td><?= $row->waktu_mulai ?></td>
					</tr>
					<tr>
						<td>Selesai</td>
						<td><?= $row->waktu_selesai ?></td>
					</tr>
				</table>
				<p class="pull-right"><a href="#">Absensi</a> <?php if ($row->kepanitiaan == 'on'): ?> | <a href="#">Kepanitiaan</a> <?php endif; ?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>