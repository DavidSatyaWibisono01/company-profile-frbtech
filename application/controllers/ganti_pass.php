
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_pass extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Ganti_pass_m");

        if($this->session->userdata('status_id') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
          redirect('auth/login');
        }
    }

    public function index()
    {

        $data["title"] = "Ganti Password";
        $data["data_user"] = $this->Ganti_pass_m->getBySession();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ganti_pass/index', $data);
        $this->load->view('templates/footer');
    }

    public function change()
    {
        $pass = $this->Ganti_pass_m;
        $validation = $this->form_validation;
        $validation->set_rules($pass->rules());

        $data["title"] = "Ganti Password";
        $data["data_user"] = $this->Ganti_pass_m->getBySession();

        if($validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('ganti_pass/index', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1'); 
            if(!password_verify($currentPassword, $data['username']['password'])){
                $this->session->flashdata('pesan', '<div class="alert alert-danger" role="alert">Password sekarang salah!</div>');
                redirect('ganti_pass');
            } else {
                if($currentPassword == $newPassword){
                    $this->session->flashdata('pesan', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('ganti_pass');
                } else {
                    //password sudah ok
                    // $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->db->set('password');
                    $this->db->where($this->table, $this->session->userdata('username'));
                    $this->db->update($this->table);

                    $this->session->flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diganti!</div>');
                    redirect('ganti_pass/change');
                }
            }
        }

    }

}