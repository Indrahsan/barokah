<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('username')) {

            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['judul'] = 'Dashboard | Barokah Catering';
            $data['listuser'] = $this->db->get('user');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('user/index', $data);
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
    }

    public function user()
    {
        $username = $this->input->get('username');
        $email = $this->input->get('email');

        if ($this->session->userdata('username')) {
            if ($username == '' && $email == '') {
                $query = $this->db->get('user');
            } else {

                $this->db->where('username', $username);
                $this->db->or_where('email', $email);
                $ceks = $this->db->get('user');

                if ($ceks->num_rows() > 0) {
                    if ($username != '' && $email != '') {
                        $query = $this->db->like('username', $username)->like('email', $email)->get('user');
                    }

                    if ($username != '') {
                        $query = $this->db->like('username', $username)->get('user');
                    }

                    if ($email != '') {
                        $query = $this->db->where('email', $email)->get('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Data tidak ditemukan!</span>
        </div>');
                    redirect(base_url('dashboard/user'));
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }

        $data['username'] = $username;
        $data['email'] = $email;
        $data['total'] = $this->db->count_all_results('user');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'User Management';
        $data['listuser'] = $query;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/user', $data);
    }


    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Dashboard Barokah Catering";
            $data['isi'] = $this->load->view('login_view', $data, true);
            $this->load->view('dashboardmain_view', $data);
        } else {
            //Validasi Sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika usernya ada
        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username'  => $user['username'],
                        'role_id'   => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
                    <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                        <i class="material-icons">close</i>
                    </button>
                    <i data-notify="icon" class="material-icons">notifications</i>
                    <span data-notify="title"></span>
                    <span data-notify="message">Password salah!</span>
                </div>');
                    redirect(base_url('dashboard/login'));
                }
            } else {
                $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
                <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                    <i class="material-icons">close</i>
                </button>
                <i data-notify="icon" class="material-icons">notifications</i>
                <span data-notify="title"></span>
                <span data-notify="message">Username tidak aktif!</span>
            </div>');
                redirect(base_url('dashboard/login'));
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message">Username belum terdaftar!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
    }

    public function register()
    {
        //Mengambil semua data dari form
        $username = htmlspecialchars($this->input->post('username', true));
        $email    = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);

        //Rules
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Register | Dashboard Barokah Catering";
            $data['isi'] = $this->load->view('register_view', $data, true);
            $this->load->view('dashboardmain_view', $data);
        } else {
            $data = array(
                'username'      =>  $username,
                'email'         =>  $email,
                'password'      =>  $password,
                'role_id'       =>  2,
                'is_active'     =>  1,
                'date_created'  =>  time()
            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message">Registrasi Berhasil</span>
        </div>');

            redirect(base_url('dashboard/login'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
            <i class="material-icons">close</i>
        </button>
        <i data-notify="icon" class="material-icons">notifications</i>
        <span data-notify="title"></span>
        <span data-notify="message">Logout Berhasil</span>
    </div>');

        redirect(base_url('dashboard/login'));
    }

    public function edituser()
    {
        $id = $this->input->get('id');

        $username = htmlspecialchars($this->input->post('username', true));
        $email    = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $status   = htmlspecialchars($this->input->post('status'));


        //Rules
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->session->userdata('username')) {

            if ($this->form_validation->run() == false) {
                $data['detail'] = $this->db->get_where('user', ['id' => $id])->row_array();
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['judul'] = 'Edit User';

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/edituser', $data);
            } else {
                $getdata = $this->db->get_where('user', ['id' => $id])->row_array();
                if ($password === '') {
                    $password = $getdata['password'];
                } else {
                    $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
                }

                $data = array(
                    'username'      =>  $username,
                    'email'         =>  $email,
                    'password'      =>  $password,
                    'is_active'     =>  $status,
                );

                if (trim($this->input->post('password')) != '') {
                    $data['password'] = password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT);
                }

                $this->db->where('id', $id);
                $this->db->update('user', $data);

                
            }$this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message">Data Berhasil di Edit!</span>
        </div>');

                redirect(base_url('dashboard/user'));
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
    }

    public function deleteuser()
    {
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        $ceks = $this->db->get('user');

        if ($ceks->num_rows() > 0) {
            $this->db->where('id', $id);
            $this->db->delete('user');

            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message">Data Berhasil di Hapus!</span>
        </div>');

            redirect(base_url('dashboard/user'));
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
                <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                    <i class="material-icons">close</i>
                </button>
                <i data-notify="icon" class="material-icons">notifications</i>
                <span data-notify="title"></span>
                <span data-notify="message">Data Tidak ditemukan!</span>
            </div>');

            redirect(base_url('dashboard/user'));
        }
    }

    public function deleteorder()
    {
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        $ceks = $this->db->get('order');

        if ($ceks->num_rows() > 0) {
            $this->db->where('id', $id);
            $this->db->delete('order');

            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message">Data Berhasil di Hapus!</span>
        </div>');

            redirect(base_url('dashboard/user'));
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
                <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                    <i class="material-icons">close</i>
                </button>
                <i data-notify="icon" class="material-icons">notifications</i>
                <span data-notify="title"></span>
                <span data-notify="message">Data Tidak ditemukan!</span>
            </div>');

            redirect(base_url('dashboard/dashboard'));
        }
    }

    public function bookedorder()
    {

        $email = $this->input->get('email');
        $no_telepon = $this->input->get('no_telepon');

        if ($this->session->userdata('username')) {
            if ($email == '' && $no_telepon == '') {
                $query = $this->db->where('status', '0')->get('order');
            } else {
                $this->db->where('email', $email);
                $this->db->or_where('no_telepon', $no_telepon);
                $ceks = $this->db->get('order');

                if ($ceks->num_rows() > 0) {
                    if ($email != '' && $no_telepon != '') {
                        $query = $this->db->like('email', $email)->like('no_telepon', $no_telepon)->where('status', '0')->get('order');
                    }

                    if ($email != '') {
                        $query = $this->db->where('email', $email)->where('status', '0')->get('order');
                    }

                    if ($no_telepon != '') {
                        $query = $this->db->where('no_telepon', $no_telepon)->where('status', '0')->get('order');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Data tidak ditemukan!</span>
        </div>');
                    redirect(base_url('dashboard/bookedorder'));
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
        $data['no_telepon'] = $no_telepon;
        $data['email'] = $email;
        $data['total'] = $this->db->where('status', '0')->count_all_results('order');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Booked Order';
        $data['listuser'] = $query;
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/bookedorder', $data);
    }

    public function verifyorder()
    {
        $email = $this->input->get('email');
        $no_telepon = $this->input->get('no_telepon');

        if ($this->session->userdata('username')) {
            if ($email == '' && $no_telepon == '') {
                $query = $this->db->where('status', '1')->get('order');
            } else {
                $this->db->where('email', $email);
                $this->db->or_where('no_telepon', $no_telepon);
                $ceks = $this->db->get('order');

                if ($ceks->num_rows() > 0) {
                    if ($email != '' && $no_telepon != '') {
                        $query = $this->db->like('email', $email)->like('no_telepon', $no_telepon)->where('status', '1')->get('order');
                    }

                    if ($email != '') {
                        $query = $this->db->where('email', $email)->where('status', '1')->get('order');
                    }

                    if ($no_telepon != '') {
                        $query = $this->db->where('no_telepon', $no_telepon)->where('status', '1')->get('order');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Data tidak ditemukan!</span>
        </div>');
                    redirect(base_url('dashboard/verifyorder'));
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
        $data['no_telepon'] = $no_telepon;
        $data['email'] = $email;
        $data['total'] = $this->db->where('status', '1')->count_all_results('order');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Verify Order';
        $data['listuser'] = $query;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/verifyorder', $data);
    }

    public function completeorder()
    {
        $email = $this->input->get('email');
        $no_telepon = $this->input->get('no_telepon');

        if ($this->session->userdata('username')) {
            if ($email == '' && $no_telepon == '') {
                $query = $this->db->where('status', '2')->get('order');
            } else {
                $this->db->where('email', $email);
                $this->db->or_where('no_telepon', $no_telepon);
                $ceks = $this->db->get('order');

                if ($ceks->num_rows() > 0) {
                    if ($email != '' && $no_telepon != '') {
                        $query = $this->db->like('email', $email)->like('no_telepon', $no_telepon)->where('status', '2')->get('order');
                    }

                    if ($email != '') {
                        $query = $this->db->where('email', $email)->where('status', '2')->get('order');
                    }

                    if ($no_telepon != '') {
                        $query = $this->db->where('no_telepon', $no_telepon)->where('status', '2')->get('order');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Data tidak ditemukan!</span>
        </div>');
                    redirect(base_url('dashboard/completeorder'));
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
        $data['no_telepon'] = $no_telepon;
        $data['email'] = $email;
        $data['total'] = $this->db->where('status', '2')->count_all_results('order');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Complete Order';
        $data['listuser'] = $query;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/completeorder', $data);
    }

    public function detailbooked()
    {

        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $ceks = $this->db->where('status', '0')->get('order');

        if ($this->session->userdata('username')) {
            if ($ceks->num_rows() > 0) {

                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['judul'] = 'Booked Order | Detail';
                $data['listuser'] = $this->db->where('id', $id)->where('status', '0')->get('order');

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/detailbooked', $data);
            } else {
                $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Data tidak ditemukan!</span>
        </div>');
                redirect(base_url('dashboard'));
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
    }

    public function detailverify()
    {

        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $ceks = $this->db->where('status', '1')->get('order');

        if ($this->session->userdata('username')) {
            if ($ceks->num_rows() > 0) {

                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['judul'] = 'Verify Order | Detail';
                $data['listuser'] = $this->db->where('id', $id)->where('status', '1')->get('order');

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/detailverify', $data);
            } else {
                $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Data tidak ditemukan!</span>
        </div>');
                redirect(base_url('dashboard'));
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
    }

    public function detailcomplete()
    {

        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $ceks = $this->db->where('status', '2')->get('order');

        if ($this->session->userdata('username')) {
            if ($ceks->num_rows() > 0) {

                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['judul'] = 'Complete Order | Detail';
                $data['listuser'] = $this->db->where('id', $id)->where('status', '2')->get('order');

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('user/detailcomplete', $data);
            } else {
                $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Data tidak ditemukan!</span>
        </div>');
                redirect(base_url('dashboard'));
            }
        } else {
            $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message"> Harap Login terlebih dahulu!</span>
        </div>');
            redirect(base_url('dashboard/login'));
        }
    }

    public function action()
    {
        $konfirmasi = $this->input->post('konfirmasi', true);
        $id = $this->input->post('id', true);
        $query = $this->db->where('id', $id)->get('order')->row_array();

        if ($konfirmasi == '1') {
            if (!empty($query['email'])) {
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
                $this->email->to($query['email']);
                $this->email->subject('Pesanana anda berhasil dikonfirmasi');
                $this->email->message('Silakan menunggu pesanan anda untuk dikirim');

                if ($this->email->send()) {
                    $data = array(
                        'status'      =>  3,
                    );

                    $this->db->where('id', $id);
                    $this->db->update('order', $data);

                    $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">close</i>
            </button>
            <i data-notify="icon" class="material-icons">notifications</i>
            <span data-notify="title"></span>
            <span data-notify="message">Data Berhasil dieksekusi!</span>
        </div>');

                    redirect(base_url('dashboard/completeorder'));
                }
            } else {
                echo '0';
            }
        }
    }
}
