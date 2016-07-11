<?php  
class Dinas_model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->table_name 	= "dinas";
		$this->primary_key 	= "id";
	}

	public function get_data_lengkap($id) {
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->join('akun_dinas', 'dinas.id = akun_dinas.id');
		$this->db->where('dinas.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

}
?>