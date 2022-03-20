<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thanks extends CI_Controller
{
    public function index()
    {

        $data["t"] = $this->input->get('t', true);

        if (isset($data["t"])) {
            $this->db->where('t', $data['t']);
            $cek = $this->db->get('order');

            if ($cek->num_rows() == 0) {
                redirect(base_url());
            } else {
                $test = $this->db->get_where('order', ['t' => $data['t']])->row_array();

                var_dump($test);
            }
        } else {
            redirect(base_url());
        }


        // $data['judul'] = "Thanks | Barokah Catering";
        // $data['isi'] = $this->load->view('thanks_view', $data, true);
        // $this->load->view('main_view', $data);
    }
}
