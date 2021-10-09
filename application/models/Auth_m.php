<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    private $table = 'user';
    public $username;
    public $password;
    public $status_id;
 
    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'status_id',
                'label' => 'status_id',
                'rules' => 'trim|required'
            ],
        ];
    }

    public function login() 
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
                            ->where('password', $password)
                            ->limit(1)
                            ->get('user');
                            
        if($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    // public function getById($id)
    // {
    //     return $this->db->get_where($this->table, ["id" => $id])->row();
    // }

    // public function getAll()
    // {
    //     $this->db->from($this->table);
    //     $this->db->order_by("id", "desc");
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function save()
    // {
    //     $data = array(
    //         "username" => $this->input->post('username'),
    //         "password" => $this->input->post('password'),
    //         "status_id" => $this->input->post('status_id')
    //     );
    //     return $this->db->insert($this->table, $data);
    // }

    // public function update()
    // {
    //     $data = array(
    //         "username" => $this->input->post('username'),
    //         "password" => $this->input->post('password'),
    //         "status_id" => $this->input->post('status_id')
    //     );
    //     return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    // }

    // public function delete($id)
    // {
    //     return $this->db->delete($this->table, array("id" => $id));
    // }
}