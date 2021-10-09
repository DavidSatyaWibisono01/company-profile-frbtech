<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_m extends CI_Model
{
    private $table = 'client';
    public $nama_client;
    public $logo_client;
    public $status_id;

       public function rules()
    {
        return [
            [
                'field' => 'nama_client',  
                'label' => 'nama_client',  
                'rules' => 'trim|required' 
            ],
            [
                'field' => 'logo_client',
                'label' => 'logo_client',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'status_id',
                'label' => 'status_id',
                'rules' => 'trim|required'
            ],
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
            "nama_client" => $this->input->post('nama_client'),
            "logo_client" => $this->input->post('logo_client'),
            "status_id" => $this->input->post('status_id')
        );
        return $this->db->insert($this->table, $data);

        // $config['upload_path'] = '././upload/produk';
		// $config['allowed_types'] = 'gif|jpg|png|JPG';
		// $this->load->library('upload', $config);
		// if (!$this->upload->do_upload('userfile')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	redirect(site_url('Welcome/VFormAddProduk'));
		// } else {
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$add['foto'] = implode($this->upload->data());
		// 	$filename = site_url('upload/') . 'produk/' . $add['foto'];
		// 	$replcate = str_replace("index.php/", "", $filename);
		// 	$replcate = str_replace("\/", "/", $replcate);
		// 	$add['foto'] = $replcate;
		// }
		// $data = array();
		// $data['filenames'] = [];
		// $files = (isset($_FILES['files'])) ? $_FILES['files'] : array();

		// if (isset($files['name'])) {
		// 	if (isset($_FILES['files'])) {

		// 		$data = array();
		// 		$data['filenames'] = [];
		// 		// Count total files
		// 		$countfiles = count($_FILES['files']['name']);

		// 		// Looping all files
		// 		for ($i = 0; $i < $countfiles; $i++) {

		// 			if (!empty($_FILES['files']['name'][$i])) {

		// 				// Define new $_FILES array - $_FILES['file']
		// 				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
		// 				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
		// 				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		// 				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
		// 				$_FILES['file']['size'] = $_FILES['files']['size'][$i];

		// 				// Set preference
		// 				$config['upload_path'] = 'upload/';
		// 				$config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
		// 				// $config['max_size'] = '500000000'; // max_size in kb
		// 				$config['file_name'] = $_FILES['files']['name'][$i];

		// 				//Load upload library
		// 				$this->load->library('upload', $config);

		// 				try {

		// 					// File upload
		// 					if ($this->upload->do_upload('file')) {
		// 						// Get data about the file
		// 						$uploadData = $this->upload->data();
		// 						$filename = site_url('upload/') . 'produk/' . $uploadData['file_name'];
		// 						$replcate = str_replace("index.php/", "", $filename);
		// 						$filename = $replcate;

		// 						// Initialize array
		// 						array_push($data['filenames'], $filename);
		// 					}
		// 				}

		// 				//catch exception
		// 				catch (Exception $e) {
		// 					echo 'Message: ' . $e->getMessage();
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		// if (count($data['filenames']) > 0) {

		// 	$image = json_encode($data['filenames']);
		// 	$replcate = str_replace("\/", "/", $image);
		// 	$data['filenames'] = $replcate;
		// 	$add['foto_detail'] = $data['filenames'];
		// } else {
		// 	$data['filenames'] = "[]";
		// }
		// $this->MSudi->AddData('tbl_produk', $add);
		// redirect(site_url('Welcome/DataProduk'));
    }

    public function update()
    {
        $data = array(
            "nama_client" => $this->input->post('nama_client'),
            "logo_client" => $this->input->post('logo_client'),
            "status_id" => $this->input->post('status_id')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}