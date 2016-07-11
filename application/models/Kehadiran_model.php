<?php  
class Kehadiran_model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->table_name 		= 'kehadiran';
		$this->primary_key 		= 'id';
	}

}