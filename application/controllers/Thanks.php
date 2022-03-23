<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thanks extends CI_Controller
{
    public function index()
    {

        $data["t"] = $this->input->get('t', true);
        $t = $this->input->get('t', true);

        if (isset($data["t"])) {
            $this->db->where('t', $data['t']);
            $cek = $this->db->get('order');

            if ($cek->num_rows() == 0) {
                redirect(base_url());
            } else {
                $data['getAllData'] = $this->db->get_where('order', ['t' => $data['t']])->row_array();

                $this->form_validation->set_rules('gambar', 'File', 'trim|xss_clean');

                

                // $gambar = $_FILES['gambar'];
                // var_dump($gambar);

                // var_dump($this->form_validation->run());
                // die();


                if ($this->form_validation->run() == false) {

                    // var_dump($test);
                    $data['judul'] = "Thanks Page | Barokah Catering";
                    $data['isi'] = $this->load->view('thanks_view', $data, true);
                    $this->load->view('main_view', $data);
                } else {

                    $gambar = $_FILES['gambar'];


                    if ($gambar['name'] != NULL) {
                        $config['upload_path'] = './assets/img/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = 2000;

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('gambar')) {
                            $err = $this->upload->display_errors();
                    echo $err;
                    die();
                            die();
                        } else {
                            $gambar = $this->upload->data('file_name');
                        }

                        $data = array(
                            'status'      => 2,
                            'gambar'      => $gambar
                            
                        );

                        $this->db->where('t', $t);
                        $this->db->update('order', $data);
                        echo '<script type="text/javascript">';
                        echo 'alert("Sukses Upload! Pesanan sedang dalam proses");';
                        echo 'window.location.href = "http://localhost:8080/barokah/";';
                        echo '</script>';
                    }
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function file_check($str)
        {
                if ($str)
                {
                    return TRUE;
                }
                else
                {

                        $this->form_validation->set_message('file_check', 'isi dlu cok');
                        return FALSE;
                }
        }
}
