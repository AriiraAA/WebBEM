<?php  
class MY_Model extends CI_Model {

	protected $table_name;
	protected $primary_key;
	public $rows = 0;

	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$query = $this->db->get($this->table_name);
		$this->rows = $query->num_rows();
		return $query->result();
	}

	public function get_data_byKey($key) {
		$this->db->where($this->primary_key, $key);
		$query = $this->db->get($this->table_name);
		$this->rows = $query->num_rows();
		return $query->row();
	}

	public function get_data_where($condition) {
		$this->db->where($condition);
		$query = $this->db->get($this->table_name);
		$this->rows = $query->num_rows();
		return $query->result();
	}

	public function insert($data) {
		return $this->db->insert($this->table_name, $data);
	}

	public function update($key, $data) {
		$this->db->where($this->primary_key, $key);
		return $this->db->update($this->table_name, $data);
	}

	public function delete($key) {
		return $this->db->delete($this->table_name, array($this->primary_key => $key));
	}

}
?>