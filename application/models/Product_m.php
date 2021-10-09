<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_m extends CI_Model
{
    private $table = 'product';
    public $nama;
    public $deskripsi;
    public $foto;
    public $link;
    public $status_id;
       
    public function rules()
    {
        return [
            [
                'field' => 'nama',  
                'label' => 'nama',  
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
                'field' => 'link',
                'label' => 'link',
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
            "nama" => $this->input->post('nama'),
            "deskripsi" => $this->input->post('deskripsi'),
            "foto" => $this->upload(),
            "link" => $this->input->post('link'),
            "status_id" => $this->input->post('status_id')
        );

        if($_FILES['foto'] = ''){}else{
            $config['upload_path'] = './upload/product';
            $config['allowed_types'] = 'jpg|png|gif';
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload gagal"; die();
            }
            else{
                $foto = $this->upload->data('file_name');
            }
        }

        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "deskripsi" => $this->input->post('deskripsi'),
            "foto" => $this->upload(),
            "link" => $this->input->post('link'),
            "status_id" => $this->input->post('status_id')
        );

        if($_FILES['foto'] = ''){}else{
            $config['upload_path'] = './upload/product';
            $config['allowed_types'] = 'jpg|png|gif';
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload gagal"; die();
            }
            else{
                $foto = $this->upload->data('file_name');
            }
        }

        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        
        return $this->db->delete($this->table, array("id" => $id));
    }

    public function upload()
    {
        $config['upload_path'] = 'upload/product';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
			redirect(site_url('product/add'));
		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
			$filename = site_url('upload/') . 'product/' . $add['foto'];
			$replcate = str_replace("/", "", $filename);
			$replcate = str_replace("\/", "/", $replcate);
			$add['foto'] = $replcate;
		}
		$data = array();
		$data['filenames'] = [];
		$files = (isset($_FILES['foto'])) ? $_FILES['foto'] : array();

		if (isset($files['nama'])) {
			if (isset($_FILES['foto'])) {

				$data = array();
				$data['filenames'] = [];
				// Count total files
				$countfiles = count($_FILES['foto']['nama']);

				// Looping all files
				for ($i = 0; $i < $countfiles; $i++) {

					if (!empty($_FILES['foto']['nama'][$i])) {

						// Define new $_FILES array - $_FILES['file']
						$_FILES['file']['name'] = $_FILES['foto']['nama'][$i];
						$_FILES['file']['type'] = $_FILES['foto']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['foto']['error'][$i];
						$_FILES['file']['size'] = $_FILES['foto']['size'][$i];

						// Set preference
						$config['upload_path'] = './upload/product';
						$config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
						// $config['max_size'] = '500000000'; // max_size in kb
						$config['file_name'] = $_FILES['foto']['nama'][$i];

						//Load upload library
						$this->load->library('upload', $config);

						try {

							// File upload
							if ($this->upload->do_upload('file')) {
								// Get data about the file
								$uploadData = $this->upload->data();
								$filename = site_url('upload/') . 'product/' . $uploadData['file_name'];
								$replcate = str_replace("index.php/", "", $filename);
								$filename = $replcate;

								// Initialize array
								array_push($data['filenames'], $filename);
							}
						}

						//catch exception
						catch (Exception $e) {
							echo 'Message: ' . $e->getMessage();
						}
					}
				}
			}
		}

		if (count($data['filenames']) > 0) {

			$image = json_encode($data['filenames']);
			$replcate = str_replace("\/", "/", $image);
			$data['filenames'] = $replcate;
			$add['foto_detail'] = $data['filenames'];
		} else {
			$data['filenames'] = "[]";
		}
		$this->Product_m->add('product', $add);
		redirect(site_url('product'));

        return $this->db->insert($this->table, $data);
    }
}