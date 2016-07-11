<?php  
class AkunD_Model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->table_name 	= "akun_dinas";
		$this->primary_key  = "id";
	}

}
?>