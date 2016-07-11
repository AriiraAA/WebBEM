<?php  
	$anggota = array(
		'nim'		=> $data->nomor_induk,
		'no_hp'		=> $data->no_hp,
		'facebook'	=> $data->facebook,
		'twitter'	=> $data->twitter,
		'id_line'	=> $data->id_line
	);
?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<a href="#" class="thumbnail">
				<img src="https://akademik.unsri.ac.id/images/foto_mhs/20<?= $anggota['nim'][7] . $anggota['nim'][8] ?>/<?= $anggota['nim'] ?>.jpg" width="100" height="134" />
			</a>
			<div class="panel panel-primary">
			  	<div class="panel-body">
			    	<table class="table">
			    		<tr>
			    			<td>No. Hp</td>
			    			<td><?= $anggota['no_hp'] ?></td>
			    		</tr>
			    		<tr>
			    			<td>Facebook</td>
			    			<td><?= $anggota['facebook'] ?></td>
			    		</tr>
			    		<tr>
			    			<td>Twitter</td>
			    			<td><?= $anggota['twitter'] ?></td>
			    		</tr>
			    		<tr>
			    			<td>Line</td>
			    			<td><?= $anggota['id_line'] ?></td>
			    		</tr>
			    	</table>
			  	</div>
			</div>
			<center>
				<a class="btn btn-warning" href="<?= base_url('anggota/download') ?>">Download Raport</a>
			</center>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Absensi</h3>
			  </div>
			  <div class="panel-body">
			    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-success">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          Hadir
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				        <ul>
				        	<?php  
				        		foreach ($kehadiran as $row) {
				        			if (strtolower($row->status) === 'hadir') {
				        				$agenda = $this->agenda_model->get_data_byKey($row->id_agenda);
				        				echo '<li>'.$agenda->nama.'</li>';
				        			}
				        		}
				        	?>
				        </ul>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-warning">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Izin
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body">
				        <ul>
				        	<?php  
				        		foreach ($kehadiran as $row) {
				        			if (strtolower($row->status) === 'izin') {
				        				$agenda = $this->agenda_model->get_data_byKey($row->id_agenda);
				        				echo '<li>'.$agenda->nama.'</li>';
				        			}
				        		}
				        	?>
				        </ul>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-danger">
				    <div class="panel-heading" role="tab" id="headingThree">
				      <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          Tidak Hadir
				        </a>
				      </h4>
				    </div>
				    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				      <div class="panel-body">
				        <ul>
				        	<?php  
				        		foreach ($kehadiran as $row) {
				        			if (strtolower($row->status) === 'tidak hadir') {
				        				$agenda = $this->agenda_model->get_data_byKey($row->id_agenda);
				        				echo '<li>'.$agenda->nama.'</li>';
				        			}
				        		}
				        	?>
				        </ul>
				      </div>
				    </div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Kepanitiaan yang pernah terlibat</h3>
			  </div>
			  <div class="panel-body">
			    <ul>
			    	<?php  
				    	foreach ($kepanitiaan as $row) {
				    		$agenda = $this->agenda_model->get_data_byKey($row->id_agenda);
				    		echo '<li>'.$agenda->nama.'</li>';
				    	}
				    ?>
			    </ul>
			  </div>
			</div>
		</div>
	</div>
</div>