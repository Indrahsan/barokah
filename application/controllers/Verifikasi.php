<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
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
        $id = $this->session->userdata('id');

        if ($this->session->userdata('id')) {

            $data['judul'] = "Verifikasi OTP | Barokah Catering";
            $data['isi'] = $this->load->view('verifikasi_view', $data, true);
            $this->load->view('main_view', $data);
        } else {
            redirect(base_url());
        } 
    }

    public function actionotp()
    {
        $id = $this->session->userdata('id');
        $otp = $this->input->post('otp', true);
        $query = $this->db->where('id', $id)->get('order')->row_array();
        $encrypt = substr(md5($query['tgl_order']), 0, 10);
        $t = str_shuffle($encrypt);


        if ($this->session->userdata('id')) {
            if ($otp == $query['otp']) {
                $data = array(
                    'status'      =>  1,
                    't'           => $t
                );

                $this->db->where('id', $id);
                $this->db->update('order', $data);
                redirect(base_url() . 'thanks?t=' . $t);
            } else {
                echo '<script type="text/javascript">';
				echo 'alert("Kode OTP salah");';
				echo 'window.location.href = "http://localhost:8080/barokah/verifikasi";';
				echo '</script>';
                die();
            }
        } else {
            redirect(base_url());
        }
    }
}
