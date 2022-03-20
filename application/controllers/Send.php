<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {

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

        $otp = rand(1000, 9999);

        $config = Array (
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'hasanindra71@gmail.com',
            'smtp_pass' => 'ericcant0na7',
            'mailtype' => 'html',
            'sharset' => 'iso-8859-1'
        );

        $this->load->library('email'); 
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('Testing@indra.com', 'testing');
        $this->email->to('indrahsan80@gmail.com');
        $this->email->subject('test email');
        $this->email->message('Otp Anda Adalah ' . $otp);

        return $this->email->send();
	}
} 