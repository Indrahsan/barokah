<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		if (isset($_POST["submit"])) {
			$email = $this->input->post('email', true);
			$subject = $this->input->post('subject', true);
			$pesan = $this->input->post('pesan', true);
			$nama = $this->input->post('nama', true);

			$config2 = array(
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|valid_email',
					'errors' => array(
						'required' => '%s harus diisi',
						'valid_email' => 'Format %s tidak sesuai',
					),
				),
				array(
					'field' => 'subject',
					'label' => 'Subject',
					'rules' => 'required',
					'errors' => array(
						'required' => '%s harus diisi',
					),
				),
				array(
					'field' => 'pesan',
					'label' => 'Pesan',
					'rules' => 'required',
					'errors' => array(
						'required' => '%s harus diisi',
					),
				),
				array(
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required',
					'errors' => array(
						'required' => '%s harus diisi',
					),
				)
			);

			$this->form_validation->set_rules($config2);
			if ($this->form_validation->run() == TRUE) {

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
					$this->email->from($email, $nama);
					$this->email->to('barokahcatering314@gmail.com');
					$this->email->subject($subject);
					$this->email->message($pesan);

					if ($this->email->send()) {
						echo "<script type='text/javascript'>alert('Pesan berhasil terkirim);</script>";
					} else {
						echo "ra masuk";
						show_error($this->email->print_debugger());
					}
				}
			}
		}

		$data['judul'] = "Contact Us | Barokah Catering";

		$data['isi'] = $this->load->view('contact_view', $data, true);
		$this->load->view('main_view', $data);
	}
}
