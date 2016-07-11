<?php  
class Logout extends CI_Controller {

	private $role;

	public function __construct() {
		parent::__construct();
		$username 	= $this->session->userdata('username');
		$nim		= $this->session->userdata('nim');
		$dinas 		= $this->session->userdata('user');
		if (isset($username)) {
			$this->role = 'admin';
		} else if (isset($dinas)) {
			$this->role = 'dinas';
		} else {
			$this->role = 'anggota';
		}
	}

	public function index() {
		$this->session->sess_destroy();
		redirect($this->role);
	}
}
?>