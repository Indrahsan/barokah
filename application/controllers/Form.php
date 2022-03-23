<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{

	public function index()
	{

		$data["menu"] = $this->input->get('menu', true);

		if (!isset($data["menu"])) {
			redirect(base_url() . "menu");
		}

		if ($data["menu"] == "Paket 1") {
			$data["gambar"] = "ayam-pop.jpg";
		}

		if ($data["menu"] == "Paket 2") {
			$data["gambar"] = "Ayam-Teriyaki.jpeg";
		}

		if ($data["menu"] == "Paket 3") {
			$data["gambar"] = "Nasi-Kuning.jpeg";
		}

		if ($data["menu"] == "Paket 4") {
			$data["gambar"] = "Nasi-Uduk.jpeg";
		}

		if ($data["menu"] == "Paket 5") {
			$data["gambar"] = "Nasi-Goreng.jpeg";
		}

		if ($data["menu"] == "Paket 6") {
			$data["gambar"] = "ayam-pop.jpg";
		}

		if (isset($_POST["submit"])) {

			$nama 			= $this->input->post('nama', true);
			$telp 			= $this->input->post('telp', true);
			$email 			= $this->input->post('email', true);
			$paket 			= $this->input->post('paket', true);
			$tgl_pengiriman = $this->input->post('book_date', true);
			$jml 			= $this->input->post('jumlah', true);
			$alamat 		= $this->input->post('alamat', true);
			$metode_bayar	= $this->input->post('mtd_bayar', true);
			$otp = rand(1000, 9999);
			$status = 0;
			$jml_harga = 15000 * $jml;

			if ($jml < 50) {
				echo "<script type='text/javascript'>alert('pesanan kurang dari ketentuan');</script>";
			} else {

				// SELECT * FROM order WHERE no_telepon = $telp OR email = $email
				$this->db->where('no_telepon', $telp);
				$this->db->or_where('email', $email);
				$cek = $this->db->get('order');

				if ($cek->num_rows() == 0) {
					$data = array(
						'nama'					=>		$nama,
						'no_telepon'			=>		$telp,
						'email'					=>		$email,
						'jml_harga'				=>		$jml_harga,
						'paket'					=> 		$paket,
						'tgl_pengiriman'		=>		$tgl_pengiriman,
						'jml_pesanan'			=>		$jml,
						'alamat'				=>		$alamat,
						'otp'					=>		$otp,
						'status'				=> 		$status,
						'metode_bayar'			=>		$metode_bayar,
						'tgl_order'				=> 		time()
					);

					$this->db->insert('order', $data);
				} else {
					echo '<script type="text/javascript">';
					echo 'alert("Email / No telepon sudah terdaftar");';
					echo 'window.location.href = "http://localhost:8080/barokah/";';
					echo '</script>';
					die();
				}

				if (!empty($email)) {
					$config = array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => 'barokahcatering314@gmail.com',
						'smtp_pass' => 'ericcant0na7',
						'mailtype' => 'html',
						'charset' => 'iso-8859-1',
						'newline'   => "\r\n"
					);

					$this->load->library('email', $config);
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from('barokahcatering314@gmail.com', 'Barokah Catering');
					$this->email->to($email);
					$this->email->subject('Noreply');
					$this->email->message('Jangan berikan pada siapapun. Kode OTP Anda adalah ' . $otp);

					if ($this->email->send()) {
						$query = $this->db->get_where('order', ['email' => $email])->row_array();

						$session = [
							'id'		=>	$query['id'],
						];

						$this->session->set_userdata($session);
						redirect(base_url() . 'verifikasi');
					} else {
						show_error($this->email->print_debugger());
					}
				}
			}
		}


		$data['judul'] = "Form Registrasi | Barokah Catering";
		$data['isi'] = $this->load->view('form_view', $data, true);
		$this->load->view('main_view', $data);
	}
}
