<?php  
class Kepanitiaan_model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->table_name 	= 'kepanitiaan';
		$this->primary_key 	= 'id';
	}

}