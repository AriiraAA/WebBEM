<?php  
class Anggota extends MY_Controller {

	protected $nim;

	public function __construct() {
		parent::__construct();
		$this->nim = $this->session->userdata('nim');
		if (!isset($this->nim)) {
			redirect('login/anggota');
			exit;
		}
		$this->load->model('anggota_model');
		$this->load->model('biodata_model');
		$this->load->model('kinerja_model');
		$this->load->model('kehadiran_model');
		$this->load->model('kepanitiaan_model');
		$this->load->model('agenda_model');
	}

	public function index() {
		$data = array(
			'title'			=> 'Home | BEM KM Fasilkom Unsri',
			'content'		=> 'anggota/dashboard',
			'data'			=> $this->biodata_model->get_data_byKey($this->nim),
			'kehadiran'		=> $this->kehadiran_model->get_data_where(array('nim_anggota' => $this->nim)),
			'kepanitiaan'	=> $this->kepanitiaan_model->get_data_where(array('nim_anggota' => $this->nim))
		);

		$this->loadView($data);
	}

	public function download() {
		$kinerja = $this->kinerja_model->get_data_byKey($this->nim);
		$kepengurusan = $this->anggota_model->get_data_byKey($this->nim);

		$data = array(
			'kinerja' 		=> $kinerja,
			'kepengurusan' 	=> $kepengurusan
		);

		//load the view and saved it into $html variable
        $html = $this->load->view('anggota/cetak_raport', $data, true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "raport_bem - ". $kepengurusan->username .".pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}

	public function edit() {
		$nim = $this->nim;
		$data = $this->anggota_model->get_data_byKey($nim);

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

			redirect('anggota/edit/'.$this->input->post('username'));
			exit;
		}
		
		$this->flashmessage('nim_anggota', $nim);
		$data = array(
			'title' 	=> 'Edit ' . $nim . ' | BEM KM Fasilkom Unsri',
			'content' 	=> 'anggota/edit_form',
			'data'		=> $this->anggota_model->get_data_lengkap($nim)
		);

		$this->loadView($data);
	}

	public function ubah_password() {
		if ($this->input->post('ubah')) {
			$this->load->model('login_model');
			$this->load->model('user_model');
			$data = $this->user_model->get_data_byKey($this->nim);
			if ($this->login_model->validatePassword($this->input->post('password_lama'), $data->password_hash)) {
				if ($this->input->post('password_baru') === $this->input->post('password_conf')) {
					$this->user_model->update($this->nim, array('password_hash' => $this->login_model->generatePasswordHash($this->input->post('password_baru'))));
					$this->flashmessage('msg', '<div class="alert alert-success">Anda berhasil mengubah password</div>');
				} else {
					$this->flashmessage('msg', '<div class="alert alert-danger">Kolom password baru harus sama dengan kolom password again</div>');
				}
			} else {
				$this->flashmessage('msg', '<div class="alert alert-danger">Password lama anda tidak cocok</div>');
			}

			redirect('anggota/ubah_password');
			exit;
		}

		$data = array(
			'title' 	=> 'Ubah Password | BEM KM Fasilkom Unsri',
			'content' 	=> 'anggota/ubah_password_form',
			'data'		=> $this->biodata_model->get_data_byKey($this->nim)
		);

		$this->loadView($data);
	}

}
?>