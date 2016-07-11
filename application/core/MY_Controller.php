<?php  
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	protected function loadView($data) {
		return $this->load->view('includes/template', $data);
	}

	protected function flashmessage($key, $msg) {
		return $this->session->set_flashdata($key, $msg);
	}

}
?>