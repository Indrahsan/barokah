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
                $data['getAllData'] = $this->db->get_where('order', ['t' => $data['t']])->row_array();

                if (empty($_FILES['gambar']['name']))
                {
                    $this->form_validation->set_rules('gambar', 'Image', 'required');
                }

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
                            echo '<script type="text/javascript">';
                            echo 'alert("Perikasa gambar yang diupload");';
                            echo 'window.location.href = "http://localhost:8080/barokah/";';
                            echo '</script>';
                            die();
                        } else {
                            $gambar = $this->upload->data('file_name');
                        }

                        $data = array(
                            'gambar'      =>  $gambar,
                            'status'      => 2
                        );

                        $this->db->where('t', $data['t']);
                        $this->db->insert('order', $data);
                        echo '<script type="text/javascript">';
                        echo 'alert("Pesanan Sedang di proses");';
                        echo 'window.location.href = "http://localhost:8080/barokah/";';
                        echo '</script>';
                    }
                }
            }
        } else {
            redirect(base_url());
        }
    }
}
