<?php  
class Admin extends MY_Controller {

	protected $username;

	public function __construct() {
		parent::__construct();
		$this->username = $this->session->userdata('username');
		if (!isset($this->username)) {
			redirect('login/admin');
			exit;
		}
		$this->load->model('anggota_model');
		$this->load->model('biodata_model');
		$this->load->model('dinas_model');
		$this->load->model('akund_model');
		$this->load->model('user_model');
	}

	public function index() {
		$data = array(
			'title' 		=> 'Dashboard | BEM KM Fasilkom Unsri',
			'content' 		=> 'admin/dashboard',
			'username' 		=> $this->username,
			'data_anggota' 	=> $this->anggota_model->get_all(),
			'data_dinas'	=> $this->dinas_model->get_all()
		);
		$this->loadView($data);
	}

	public function data() {
		$nodata = $this->session->userdata('no_nim');
		if (!$nodata) {
			redirect('admin');
			exit;
		}

		if ($this->input->post('submit')) {
			$data = $this->biodata_model->get_data_byKey($this->input->post('nim'));
			$is_exist = $this->biodata_model->rows;

			$data = array(
				'nama_lengkap'	=> $this->input->post('nama'),
				'nomor_induk'	=> $this->input->post('nim'),
				'jurusan'		=> $this->input->post('jurusan'),
				'no_hp'			=> $this->input->post('no_hp')
			);

			if ($is_exist) {
				$this->biodata_model->update($this->input->post('nim'), $data);
			} else {
				$this->biodata_model->insert($data);
			}

			$data = $this->anggota_model->get_data_byKey($this->input->post('nim'));
			$is_exist = $this->anggota_model->rows;

			$data = array(
				'nama'	=> $this->input->post('nama'),
				'username'	=> $this->input->post('nim')
			);

			if (!$is_exist) {
				$this->anggota_model->insert($data);
			}

			$this->session->unset_userdata('no_nim');
			redirect('admin/edit/'.$this->input->post('nim'));
			exit;
		}

		$data = array(
			'title'		=> 'Form Data | BEM KM Fasilkom Unsri',
			'content'	=> 'anggota/data_form'
		);

		$this->loadView($data);
	}

	public function tambah() {
		if ($this->input->post('tambah')) {

			$this->anggota_model->get_data_byKey($this->input->post('nim'));
			$kepengurusanExist = $this->anggota_model->rows;
			$this->biodata_model->get_data_byKey($this->input->post('nim'));
			$mahasiswaExist = $this->biodata_model->rows;
			$this->user_model->get_data_byKey($this->input->post('nim'));
			$userExist = $this->user_model->rows;

			if ($kepengurusanExist || $mahasiswaExist || $userExist) {
				$this->flashmessage('msg', '<div class="alert alert-danger">Gagal! NIM yang dimasukkan telah digunakan</div>');
				redirect('admin/tambah');
				exit;
			}

			if ($this->input->post('password') != $this->input->post('password_conf')) {
				$this->flashmessage('msg', '<div class="alert alert-danger">Gagal menambahkan anggota!  Kolom password dan password again tidak sama</div>');
				redirect('admin/tambah');
				exit;
			}

			$data_kepengurusan = array(
				'username'	=> $this->input->post('nim'),
				'nama'		=> $this->input->post('nama'),
				'dinas'		=> $this->input->post('dinas'),
				'jabatan'	=> $this->input->post('jabatan')
			);

			$this->anggota_model->insert($data_kepengurusan);

			$data_mahasiswa = array(
				'nomor_induk'	=> $this->input->post('nim'),
				'nama_lengkap'	=> $this->input->post('nama'),
				'no_hp'			=> $this->input->post('no_hp')
			);

			$this->biodata_model->insert($data_mahasiswa);

			$this->load->model('login_model');
			$data_user = array(
				'username'		=> $this->input->post('nim'),
				'email'			=> $this->input->post('email'),
				'password_hash' => $this->login_model->generatePasswordHash($this->input->post('password')),
				'status'		=> 10,
				'created_at'	=> time(),
				'updated_at'	=> time()
			);

			$this->user_model->insert($data_user);

			$this->flashmessage('msg', '<div class="alert alert-success">Anda berhasil menambahkan anggota</div>');
			redirect('admin/edit/'.$this->input->post('nim'));
			exit;
		}

		$data = array(
			'title'		=> 'Tambah Anggota | BEM KM Fasilkom Unsri',
			'content'	=> 'admin/tambah_form'
		);

		$this->loadView($data);
	}

	public function edit() {
		$nim = $this->uri->segment(3);
		$data = $this->anggota_model->get_data_byKey($nim);
		$is_exist =  $this->anggota_model->rows;
		if (!isset($nim) || !$is_exist) {
			$this->flashmessage('msg', '<div class="alert alert-danger">Gagal mengedit data</div>');
			redirect('admin');
			exit;
		}

		if ($this->input->post('edit')) {
			$data_kepengurusan = array(
				'username'			=> $this->input->post('username'),
				'nama'				=> $this->input->post('nama'),
				'jabatan'			=> $this->input->post('jabatan'),
				'dinas'				=> $this->input->post('dinas')
			);

			$biodata = array(
				'nomor_induk'		=> $this->input->post('username'),
				'jurusan'			=> $this->input->post('jurusan'),
				'angkatan'			=> $this->input->post('angkatan'),
				'nama_lengkap'		=> $this->input->post('nama'),
				'tempat_lahir'		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
				'anak_ke'			=> $this->input->post('anak_ke'),
				'jumlah_saudara'	=> $this->input->post('jumlah_saudara'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'alamat_asal'		=> $this->input->post('alamat_asal'),
				'provinsi'			=> $this->input->post('provinsi'),
				'kabkot'			=> $this->input->post('kabkot'),
				'kecamatan'			=> $this->input->post('kecamatan'),
				'alamat_sekarang'	=> $this->input->post('alamat_sekarang'),
				'status_tinggal'	=> $this->input->post('status_tinggal'),
				'jalur_seleksi'		=> $this->input->post('jalur_seleksi'),
				'agama'				=> $this->input->post('agama'),
				'hobi'				=> $this->input->post('hobi'),
				'penyakit'			=> $this->input->post('penyakit'),
				'no_hp'				=> $this->input->post('no_hp'),
				'facebook'			=> $this->input->post('facebook'),
				'twitter'			=> $this->input->post('twitter'),
				'id_line'			=> $this->input->post('id_line'),
				'nama_ayah'			=> $this->input->post('nama_ayah'),
				'pekerjaan_ayah'	=> $this->input->post('pekerjaan_ayah'),
				'nama_ibu'			=> $this->input->post('nama_ibu'),
				'pekerjaan_ibu'		=> $this->input->post('pekerjaan_ibu'),
				'alamat_ortu'		=> $this->input->post('alamat_ortu')
			);

			$this->anggota_model->update($nim, $data_kepengurusan);
			$this->biodata_model->update($nim, $biodata);

			$this->flashmessage('msg', '<div class="alert alert-success">Anda berhasil mengedit data ini</div>');

			redirect('admin/edit/'.$this->input->post('username'));
			exit;
		}
		
		$this->flashmessage('nim_anggota', $nim);
		$data = array(
			'title' 	=> 'Edit ' . $nim . ' | BEM KM Fasilkom Unsri',
			'content' 	=> 'admin/edit_form',
			'data'		=> $this->anggota_model->get_data_lengkap($nim)
		);

		$this->loadView($data);
	}

	public function delete() {
		$nim = $this->uri->segment(3);
		if (!isset($nim)) {
			$this->flashmessage('msg', '<div class="alert alert-danger">Gagal menghapus data</div>');
			redirect('admin');
			exit;
		}

		$data = $this->anggota_model->get_data_byKey($nim);
		$is_exist =  $this->anggota_model->rows;
		if ($is_exist) {
			$this->anggota_model->delete($nim);
			$this->biodata_model->delete($nim);
			$this->user_model->delete($nim);
			$this->flashmessage('msg', '<div class="alert alert-success">Anda berhasil menghapus data</div>');
		} else {
			$this->flashmessage('msg', '<div class="alert alert-danger">Gagal menghapus data</div>');
		}

		redirect('admin');
	}

	public function edit_dinas() {
		$id = $this->uri->segment(3);
		$data = $this->dinas_model->get_data_byKey($id);
		$is_exist = $this->dinas_model->rows;
		if (!isset($id) || !$is_exist) {
			$this->flashmessage('msg', '<div class="alert alert-danger">Gagal mengedit data</div>');
			redirect('admin');
			exit;
		}

		if ($this->input->post('edit')) {
			$data_dinas = array(
				'dinas'		=> $this->input->post('nama'),
				'bidang'	=> $this->input->post('bidang')
			);

			$data_akun = array(
				'username'	=> $this->input->post('username')
			);

			$this->dinas_model->update($id, $data_dinas);
			$this->akund_model->update($id, $data_akun);

			$this->flashmessage('msg', '<div class="alert alert-success">Anda berhasil mengedit data dinas</div>');

			redirect('admin/edit_dinas/'.$id);
			exit;
		}

		$this->flashmessage('id_dinas', $id);
		$data = array(
			'title' 	=> 'Edit ' . $id . ' | BEM KM Fasilkom Unsri',
			'content' 	=> 'admin/edit_dinas_form',
			'data'		=> $this->dinas_model->get_data_lengkap($id)
		);
		$this->loadView($data);
	}

}
?>