<?php  
class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$username = $this->session->userdata('username');
		if (isset($username)) {
			redirect('admin');
			exit;
		}
		$nim = $this->session->userdata('nim');
		if (isset($nim)) {
			redirect('anggota');
			exit;
		}
		$dinas = $this->session->userdata('user');
		if (isset($dinas)) {
			redirect('dinas');
			exit;
		}
		$this->load->model('login_model');
	}

	public function admin() {
		if ($this->input->post('login')) {
			$input = array(
				'username' 	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password'))
			);
			$output = $this->login_model->cek_login_admin($input);
			if ($this->login_model->rows == 1) {
				foreach ($output as $row) {
					$username = $row->username;
				}
				$this->session->set_userdata(array('username' => $username));
				redirect('admin');
				exit;
			}
			$this->flashmessage('msg', '<div class="alert alert-danger">Username atau password salah!</div>');
		}

		$data = array(
			'title' 	=> 'Login Admin | BEM KM Fasilkom Unsri',
			'content'	=> 'admin/login_form'
		);
		$this->loadView($data);
	}

	public function anggota() {
		if ($this->input->post('login')) {
			$input = array(
				'kepengurusan.username' 		=> $this->input->post('nim')
			);
			
			$output = $this->login_model->cek_login_anggota($input);
			
			if ($output) {
				$this->load->model('user_model');
				$data = $this->user_model->get_data_byKey($this->input->post('nim'));
				if ($this->login_model->validatePassword($this->input->post('password'), $data->password_hash)) {
					$this->session->set_userdata(array('nim' => $data->username));
					redirect('anggota');
					exit;	
				}
			}

			$this->flashmessage('msg', '<div class="alert alert-danger">NIM atau password salah!</div>');
		}

		$data = array(
			'title' 	=> 'Login Anggota | BEM KM Fasilkom Unsri',
			'content'	=> 'anggota/login_form'
		);
		$this->loadView($data);
	}

	public function dinas() {
		if ($this->input->post('login')) {
			$input = array(
				'username' 	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password'))
			);
			$output = $this->login_model->cek_login_dinas($input);
			$this->load->model('akund_model');
			if ($this->login_model->rows == 1) {
				foreach ($output as $row) {
					$username = $row->username;
				}
				$dinas = $this->akund_model->get_data_where(array('username' => $username));
				foreach ($dinas as $row) {
					$role = $row->role;
					$id = $row->id;
				}
				$this->session->set_userdata(array(
					'user' 		=> $username, 
					'role' 		=> $role,
					'id'		=> $id
				));
				redirect('dinas');
				exit;
			}
			$this->flashmessage('msg', '<div class="alert alert-danger">Username atau password salah!</div>');
		}

		$data = array(
			'title'		=> 'Login Dinas | BEM KM Fasilkom Unsri',
			'content'	=> 'dinas/login_form'
		);
		$this->loadView($data);
	}

}
?>