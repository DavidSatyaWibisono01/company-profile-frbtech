<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio_m extends CI_Model
{
    private $table = 'portofolio';
    public $nama_portofolio;
    public $deskripsi;
    public $foto;
    public $status_id;
  
    public function rules()
    {
        return [
            [
                'field' => 'nama_portofolio',
                'label' => 'nama_portofolio',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'deskripsi',
                'label' => 'deskripsi',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'foto',
                'label' => 'foto',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'status_id',
                'label' => 'status_id',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $data = array(
            "nama_portofolio" => $this->input->post('nama_portofolio'),
            "deskripsi" => $this->input->post('deskripsi'),
            "foto" => $this->input->post('foto'),
            "status_id" => $this->input->post('status_id')
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "nama_portofolio" => $this->input->post('nama_portofolio'),
            "deskripsi" => $this->input->post('deskripsi'),
            "foto" => $this->input->post('foto'),
            "status_id" => $this->input->post('status_id')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}