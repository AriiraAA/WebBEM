<?php  
class Anggota_model extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->table_name 	= "kepengurusan";
		$this->primary_key 	= "username";
	}

	public function get_data_lengkap($nim) {
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->join('mahasiswa_biodata', 'kepengurusan.username = mahasiswa_biodata.nomor_induk');
		$this->db->where('kepengurusan.username', $nim);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_data_byJabatan($jabatan) {
		$this->db->where('jabatan', $jabatan);
		$query = $this->db->get($this->table_name);
		$this->rows = $query->num_rows();
		return $query->result();
	}

	public function cek_data_akun($data) {
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->join('user', 'kepengurusan.username = user.username');
		$this->db->where($data);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		}
		return false;
	}
}
?>