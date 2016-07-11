<!DOCTYPE html>
<html>
<head>
	<title>Raport BEM</title>
</head>
<style type="text/css">
	.header, .bemdata, .footer {
		display: inline-block;
	}
	.container {
		width: 700px;
	}
	.h1{
		font-size: 24px;
		font-weight: bold;
		text-align: center;
	}
	.leftimg {
		margin-right: 16px;
		margin-bottom: -40px;
	}
	.rightimg {
		margin-left: 16px;
		margin-bottom: -40px;
	}
</style>
<body style="color: black !important;">
	<div class="container">
		<center>
			<div class="row">
					<img class="leftimg" width="110" height="100" src="<?= base_url('assets/img/logounsri.png') ?>">
					<span class="h1">BEM KM Fakultas Ilmu Komputer</span>
					<img class="rightimg" width="100" height="100" src="<?= base_url('assets/img/logobem.png') ?>">
					<br/>
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="h1">Universitas Sriwijaya</span>	
			</div>
		</center>
		<hr style="border: 1px solid black !important;"/>
		<div class="row">
			<div class="col-md-6 bemdata">
				Nama: <?php if (isset($kepengurusan->nama)) echo $kepengurusan->nama; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dinas: 
				<?php  
					if ($kepengurusan->dinas === 'Pengembangan Sumber Daya Mahasiswa') {
						echo "Pengembangan SDM";
					} else {
						echo $kepengurusan->dinas;
					}
				?><br/>
				NIM: <?php if (isset($kepengurusan->username)) echo $kepengurusan->username; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Jabatan: <?= $kepengurusan->jabatan ?>
			</div>
			<div class="col-md-6 bemdata left">
				<br/>
				
			</div>
		</div>
		<br/>
		<div class="row">
			<table class="table table-bordered" border="1" width="700">
				<tbody>
					<tr>
						<th width="40">No</th>
						<th>Kriteria</th>
						<th width="40">Nilai</th>
					</tr>
					<tr>
						<td width="40">1</td>
						<td>Disiplin</td>
						<td width="60"><?php if (isset($kinerja->disiplin)) echo $kinerja->disiplin; ?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Keaktifan/Sikap</td>
						<td><?php if (isset($kinerja->keaktifan)) echo $kinerja->keaktifan; ?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Tanggung Jawab/Kinerja</td>
						<td><?php if (isset($kinerja->tanggung_jawab)) echo $kinerja->tanggung_jawab; ?></td>
					</tr>
				</tbody>
			</table>
			<i>Keterangan: <?php if (isset($kinerja->keterangan)) echo $kinerja->keterangan; ?></i>
		</div>
		<br/>
		<div class="row">
			<center>
				<span class="col-md-6 footer psdm">
					Kepala Dinas Pengembangan Sumber Daya Mahasiswa &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gubernur Mahasiswa <br/>
					 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  BEM KM Fasilkom Unsri, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  BEM KM Fasilkom Unsri,<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Rizki Akbar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Rahmatullah<br/>
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NIM. 09031281419059 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NIM. 09031181320017
				</span>
				<span class="col-md-6 footer gub">
					<!--Gubernur Mahasiswa <br/>BEM KM Fasilkom Unsri,<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					Rahmatullah<br/>
					<span>NIM. 09xxxxxxxxx</span> -->
				</span>
			</center>
		</div>
	</div>
</body>	
</html>