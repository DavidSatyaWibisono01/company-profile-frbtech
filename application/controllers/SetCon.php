
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SetCon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("SetCon_m");

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

        $data["title"] = "List Data setCon";
        $data["data_setCon"] = $this->SetCon_m->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('setCon/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $setCon = $this->SetCon_m;
        $validation = $this->form_validation;
        $validation->set_rules($setCon->rules());
        if ($validation->run()) {
            $setCon->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data setCon berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("setCon");
        }
        $data["title"] = "Tambah Data setCon";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('setCon/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('setCon');

        $setCon = $this->SetCon_m;
        $validation = $this->form_validation;
        $validation->set_rules($setCon->rules());

        if ($validation->run()) {
            $setCon->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data setCon berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("setCon");
        }
        $data["title"] = "Edit Data setCon";
        $data["data_setCon"] = $setCon->getById($id);
        if (!$data["data_setCon"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('setCon/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->SetCon_m->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data setCon berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}