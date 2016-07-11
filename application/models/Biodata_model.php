<?php  
class Biodata_model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->table_name 	= 'mahasiswa_biodata';
		$this->primary_key 	= 'nomor_induk';
	}

}
?>