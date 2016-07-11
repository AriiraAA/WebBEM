<?php  
class Login_model extends MY_Model {

	public $rows = 0;

	public function cek_login_admin($data) {
		$this->load->model('admin_model');
		$query = $this->admin_model->get_data_where($data);
		$this->rows = $this->admin_model->rows;
		return $query;
	}

	public function cek_login_anggota($data) {
		$this->load->model('anggota_model');
		$query = $this->anggota_model->cek_data_akun($data);
		return $query;
	}

	public function cek_login_dinas($data) {
		$this->load->model('akund_model');
		$query = $this->akund_model->get_data_where($data);
		$this->rows = $this->akund_model->rows;
		return $query;
	}

	/**
	 * Fungsi-fungsi yang diambil dari yii2 framework
	 **/
	public static function generatePasswordHash($password, $cost = 13)
	{
		$salt = static::generateSalt($cost);
		$hash = crypt($password, $salt);

		if (!is_string($hash) || strlen($hash) < 32) {
			throw new Exception('Unknown error occurred while generating hash.');
		}

		return $hash;
	}

	protected static function generateSalt($cost = 13)
	{
		$cost = (int)$cost;
		if ($cost < 4 || $cost > 30) {
			throw new InvalidParamException('Cost must be between 4 and 31.');
		}

		// Get 20 * 8bits of pseudo-random entropy from mt_rand().
		$rand = '';
		for ($i = 0; $i < 20; ++$i) {
			$rand .= chr(mt_rand(0, 255));
		}

		// Add the microtime for a little more entropy.
		$rand .= microtime();
		// Mix the bits cryptographically into a 20-byte binary string.
		$rand = sha1($rand, true);
		// Form the prefix that specifies Blowfish algorithm and cost parameter.
		$salt = sprintf("$2y$%02d$", $cost);
		// Append the random salt data in the required base64 format.
		$salt .= str_replace('+', '.', substr(base64_encode($rand), 0, 22));
		return $salt;
	}

	public static function validatePassword($password, $hash)
	{
		if (!is_string($password) || $password === '') {
			throw new InvalidParamException('Password must be a string and cannot be empty.');
		}

		if (!preg_match('/^\$2[axy]\$(\d\d)\$[\.\/0-9A-Za-z]{22}/', $hash, $matches) || $matches[1] < 4 || $matches[1] > 30) {
			throw new InvalidParamException('Hash is invalid.');
		}

		$test = crypt($password, $hash);
		$n = strlen($test);
		if (strlen($test) < 32 || $n !== strlen($hash)) {
			return false;
		}

		// Use a for-loop to compare two strings to prevent timing attacks. See:
		// http://codereview.stackexchange.com/questions/13512
		$check = 0;
		for ($i = 0; $i < $n; ++$i) {
			$check |= (ord($test[$i]) ^ ord($hash[$i]));
		}

		return $check === 0;
	}

}
?>