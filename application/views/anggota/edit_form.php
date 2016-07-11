<?php
	if (count($data) > 0) {
		foreach ($data as $row) {
			$anggota = array(
				'nim' 				=> $row->username,
				'nama'				=> $row->nama,
				'jabatan'			=> $row->jabatan,
				'dinas' 			=> $row->dinas,
				'jurusan'			=> $row->jurusan,
				'angkatan'			=> $row->angkatan,
				'panggilan'			=> $row->nama_panggilan,
				'tempat_lahir'		=> $row->tempat_lahir,
				'tanggal_lahir'		=> $row->tanggal_lahir,
				'anak_ke'			=> $row->anak_ke,
				'jumlah_saudara'	=> $row->jumlah_saudara,
				'jenis_kelamin'		=> $row->jenis_kelamin,
				'alamat_asal'		=> $row->alamat_asal,
				'provinsi'			=> $row->provinsi,
				'kabkot'			=> $row->kabkot,
				'kecamatan'			=> $row->kecamatan,
				'alamat_sekarang'	=> $row->alamat_sekarang,
				'status_tinggal'	=> $row->status_tinggal,
				'jalur_seleksi'		=> $row->jalur_seleksi,
				'agama'				=> $row->agama,
				'hobi'				=> $row->hobi,
				'penyakit'			=> $row->penyakit,
				'no_hp'				=> $row->no_hp,
				'facebook'			=> $row->facebook,
				'twitter'			=> $row->twitter,
				'id_line'			=> $row->id_line,
				'nama_ibu'			=> $row->nama_ibu,
				'pekerjaan_ibu'		=> $row->pekerjaan_ibu,
				'nama_ayah'			=> $row->nama_ayah,
				'pekerjaan_ayah'	=> $row->pekerjaan_ayah,
				'alamat_ortu'		=> $row->alamat_ortu
			);
		}
	} else {
		$this->session->set_userdata('no_nim', true);
		redirect('anggota/data');
		exit;
	}
?>
<div class="container">
	<div class="row">
		<?= form_open_multipart('anggota/edit/'.$this->session->flashdata('nim_anggota')) ?>

		<?php  
			$msg = $this->session->flashdata('msg');
			if (isset($msg)) {
				echo $msg;
			}
		?>

		<div class="col-md-3">
			<a href="#" class="thumbnail">
				<img src="https://akademik.unsri.ac.id/images/foto_mhs/20<?= $anggota['nim'][7] . $anggota['nim'][8] ?>/<?= $anggota['nim'] ?>.jpg" width="100" height="134" />
			</a>
			<div class="panel panel-primary">
			  	<div class="panel-body">
			    	<table class="table">
			    		<tr>
			    			<td>No. Hp</td>
			    			<td><input class="form-control" type="text" name="no_hp" value="<?= $anggota['no_hp'] ?>" /></td>
			    		</tr>
			    		<tr>
			    			<td>Facebook</td>
			    			<td><input class="form-control" type="text" name="facebook" value="<?= $anggota['facebook'] ?>" /></td>
			    		</tr>
			    		<tr>
			    			<td>Twitter</td>
			    			<td><input class="form-control" type="text" name="twitter" value="<?= $anggota['twitter'] ?>" /></td>
			    		</tr>
			    		<tr>
			    			<td>Line</td>
			    			<td><input class="form-control" type="text" name="id_line" value="<?= $anggota['id_line'] ?>" /></td>
			    		</tr>
			    	</table>
			  	</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Data Pribadi</h3>
				  	</div>
				  	<div class="panel-body">
				    	<div class="form-group">
				    		<label for="nama">Nama</label>
				    		<input class="form-control" type="text" name="nama" value="<?= $anggota['nama'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="username">NIM</label>
				    		<input class="form-control" type="text" name="username" value="<?= $anggota['nim'] ?>" />
				    		<small style="color: red;"><i>*pastikan NIM yang anda masukkan sesuai dengan NIM Unsri</i></small>
				    	</div>
				    	<div class="form-group">
				    		<label for="dinas">Dinas</label>
				    		<input class="form-control" type="text" name="dinas" value="<?= $anggota['dinas'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="jabatan">Jabatan</label>
				    		<input class="form-control" type="text" name="jabatan" value="<?= $anggota['jabatan'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="jurusan">Jurusan</label>
				    		<input class="form-control" type="text" name="jurusan" value="<?= $anggota['jurusan'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="angkatan">Angkatan</label>
				    		<input class="form-control" type="text" name="angkatan" value="<?= $anggota['angkatan'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="tempat_lahir">Tempat Lahir</label>
				    		<input class="form-control" type="text" name="tempat_lahir" value="<?= $anggota['tempat_lahir'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="tanggal_lahir">Tanggal Lahir</label>
				    		<input class="form-control" type="text" name="tanggal_lahir" value="<?= $anggota['tanggal_lahir'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="anak_ke">Anak Ke-</label>
				    		<input class="form-control" type="text" name="anak_ke" value="<?= $anggota['anak_ke'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="jumlah_saudara">Jumlah Saudara</label>
				    		<input class="form-control" type="text" name="jumlah_saudara" value="<?= $anggota['jumlah_saudara'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="jenis_kelamin">Jenis Kelamin</label>
				    		<input class="form-control" type="text" name="jenis_kelamin" value="<?= $anggota['jenis_kelamin'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="alamat_asal">Alamat Asal</label>
				    		<input class="form-control" type="text" name="alamat_asal" value="<?= $anggota['alamat_asal'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="provinsi">Provinsi</label>
				    		<input class="form-control" type="text" name="provinsi" value="<?= $anggota['provinsi'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="kabkot">Kabupaten/Kota</label>
				    		<input class="form-control" type="text" name="kabkot" value="<?= $anggota['kabkot'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="kecamatan">Kecamatan</label>
				    		<input class="form-control" type="text" name="kecamatan" value="<?= $anggota['kecamatan'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="alamat_sekarang">Alamat Sekarang</label>
				    		<input class="form-control" type="text" name="alamat_sekarang" value="<?= $anggota['alamat_sekarang'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="status_tinggal">Status Tinggal</label>
				    		<input class="form-control" type="text" name="status_tinggal" value="<?= $anggota['status_tinggal'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="jalur_seleksi">Jalur Seleksi</label>
				    		<input class="form-control" type="text" name="jalur_seleksi" value="<?= $anggota['jalur_seleksi'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="agama">Agama</label>
				    		<input class="form-control" type="text" name="agama" value="<?= $anggota['agama'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="hobi">Hobi</label>
				    		<input class="form-control" type="text" name="hobi" value="<?= $anggota['hobi'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="penyakit">Penyakit</label>
				    		<input class="form-control" type="text" name="penyakit" value="<?= $anggota['penyakit'] ?>" />
				    	</div>
				  	</div>
				</div>
				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Data Orang Tua</h3>
				  	</div>
				  	<div class="panel-body">
				    	<div class="form-group">
				    		<label for="nama_ayah">Nama Ayah</label>
				    		<input class="form-control" type="text" name="nama_ayah" value="<?= $anggota['nama_ayah'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="pekerjaan_ayah">Pekerjaan Ayah</label>
				    		<input class="form-control" type="text" name="pekerjaan_ayah" value="<?= $anggota['pekerjaan_ayah'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="nama_ibu">Nama Ibu</label>
				    		<input class="form-control" type="text" name="nama_ibu" value="<?= $anggota['nama_ibu'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="pekerjaan_ibu">Pekerjaan Ibu</label>
				    		<input class="form-control" type="text" name="pekerjaan_ibu" value="<?= $anggota['pekerjaan_ibu'] ?>" />
				    	</div>
				    	<div class="form-group">
				    		<label for="alamat_ortu">Alamat Orang Tua</label>
				    		<input class="form-control" type="text" name="alamat_ortu" value="<?= $anggota['alamat_ortu'] ?>" />
				    	</div>
				  	</div>
				</div>
			</div>
		</div>
		<center>
			<input class="btn btn-success btn-lg" type="submit" name="edit" value="Simpan Perubahan" />
		</center>
		<?= form_close() ?>
	</div>
</div>