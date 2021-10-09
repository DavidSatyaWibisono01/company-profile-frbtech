
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_m");
    }

    public function index()
    {
        $data["title"] = "Login";
        $this->load->view('templates/header');
        $this->load->view('auth/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/login');
        } else {
            $auth = $this->Auth_m->login();

            if($auth == FALSE) {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password anda salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
              redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('password', $auth->password);
                $this->session->set_userdata('status_id', $auth->status_id);

                redirect('user');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}