<?php
class Dinas extends MY_Controller {

	protected $id;
	protected $username;
	protected $role;

	public function __construct() {
		parent::__construct();
		$this->username = $this->session->userdata('user');
		$this->role = $this->session->userdata('role');
		$this->id = $this->session->userdata('id');
		if (!isset($this->username)) {
			redirect('login/dinas');
			exit;
		}
		$this->load->model('dinas_model');
		$this->load->model('agenda_model');
	}

	public function index() {
		if ($this->role === 'kestari') {
			$this->_kestari();
		}
	}

	private function _kestari() {
		$data = array(
			'title'		=> 'Kesekretariatan | BEM KM Fasilkom Unsri',
			'content'	=> 'dinas/kestari/dashboard',
			'data'		=> $this->dinas_model->get_data_lengkap($this->id),
			'agenda'	=> $this->agenda_model->get_all()
		);

		$this->loadView($data);
	}

	public function tambah_agenda() {
		if ($this->role != 'kestari') {
			redirect('dinas');
			exit;
		}

		if ($this->input->post('tambah')) {
			
		}

		$data = array(
			'title'		=> 'Tambah Agenda | BEM KM Fasilkom Unsri',
			'content'	=> 'dinas/kestari/tambah_agenda'
		);

		$this->loadView($data);
	}

}