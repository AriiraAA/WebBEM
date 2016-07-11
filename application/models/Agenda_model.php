<?php  
class Agenda_model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->table_name 	= 'agenda';
		$this->primary_key 	= 'id';
	}

}