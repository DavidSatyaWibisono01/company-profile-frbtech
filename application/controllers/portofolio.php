
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Portofolio_m");

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

        $data["title"] = "List Data portofolio";
        $data["data_portofolio"] = $this->Portofolio_m->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('portofolio/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $portofolio = $this->Portofolio_m;
        $validation = $this->form_validation;
        $validation->set_rules($portofolio->rules());
        if ($validation->run()) {
            $portofolio->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data portofolio berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("portofolio");
        }
        $data["title"] = "Tambah Data portofolio";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('portofolio/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('portofolio');

        $portofolio = $this->Portofolio_m;
        $validation = $this->form_validation;
        $validation->set_rules($portofolio->rules());

        if ($validation->run()) {
            $portofolio->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data portofolio berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("portofolio");
        }
        $data["title"] = "Edit Data portofolio";
        $data["data_portofolio"] = $portofolio->getById($id);
        if (!$data["data_portofolio"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('portofolio/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Portofolio_m->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data portofolio berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}