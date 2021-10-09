<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_pass_m extends CI_Model
{
    private $table = 'user';
    public $username;
    public $password;
     
    public function rules()
    {
        return [
            [
                'field' => 'currentPassword',
                'label' => 'Password lama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'newPassword1',
                'label' => 'Password baru',
                'rules' => 'trim|required|matches[newPassword2]'
            ],
            [
                'field' => 'newPassword2',
                'label' => 'Konfirmasi password',
                'rules' => 'trim|required|matches[newPassword1]'
            ],
        ];
    }

    public function getBySession()
    {
        $this->db->get_where($this->table, ['username' => $this->session->userdata('username')])->row_array();
    }

    public function update()
    {
        $data = array(
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "status_id" => $this->input->post('status_id')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('password')));
    }

}