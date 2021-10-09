<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excellence_m extends CI_Model
{
    private $table = 'excellence';
    public $judul;
    public $deskripsi;
    public $icon;
    public $status_id;
      
    public function rules()
    {
        return [
            [
                'field' => 'judul',
                'label' => 'judul',
                'rules' => 'trim|required' 
            ],
            [
                'field' => 'deskripsi',
                'label' => 'deskripsi',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'icon',
                'label' => 'icon',
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
            "judul" => $this->input->post('judul'),
            "deskripsi" => $this->input->post('deskripsi'),
            "icon" => $this->input->post('icon'),
            "status_id" => $this->input->post('status_id')
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "judul" => $this->input->post('judul'),
            "deskripsi" => $this->input->post('deskripsi'),
            "icon" => $this->input->post('icon'),
            "status_id" => $this->input->post('status_id')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}