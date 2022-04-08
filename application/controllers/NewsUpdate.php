<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NewsUpdate extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
    }

    public function addNews()
    {
        $data = $this->input->post();

        // If there's an image
        if (!empty($_FILES['img_path']['size'])) {
            $image = $_FILES['img_path'];

            $new_name = time() . $image['name'];
            $config['upload_path'] = FCPATH . "./assets/images/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('img_path')) {
                echo "Upload failed";
                // Upload failed
                $data = [
                    "status" => false,
                    "message" => "Gagal upload gambar!"
                ];

                $this->session->set_flashdata('failed', $data);
                redirect(base_url() . 'admin/newsUpdate');
            } else {
                echo "Upload success";
                $upload_data = $this->upload->data('file_name');

                $data['img_path'] = $upload_data;
            }
        }

        // print("<pre>" . print_r($data, true) . "</pre>");
        if ($this->News_model->addNews($data)) {
            // Insert success
            $data = [
                "status" => true,
                "message" => "Berhasil memasukkan data!"
            ];

            $this->session->set_flashdata('success', $data);
            redirect(base_url('admin/newsUpdate'));
        } else {
            // Insert failed
            $data = [
                "status" => false,
                "message" => "Gagal memasukkan data!"
            ];

            $this->session->set_flashdata('failed', $data);
            redirect(base_url('admin/newsUpdate'));
        }
    }

    public function editNews($id = '')
    {
        date_default_timezone_set('Asia/Jakarta');

        $data = $this->input->post();
        $data['updated_at'] = date('Y-m-d H:i:s');

        if (!empty($_FILES['img_path']['size'])) {
            $image = $_FILES['img_path'];

            $new_name = time() . $image['name'];
            $config['upload_path'] = FCPATH . "./assets/images/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('img_path')) {
                // Upload failed
                $data = [
                    "status" => false,
                    "message" => "Gagal upload gambar!"
                ];

                $this->session->set_flashdata('failed', $data);
                die();
            } else {
                $upload_data = $this->upload->data('file_name');

                $data['img_path'] = $upload_data;
            }
        }

        $result = $this->News_model->editNewsById($id, $data);

        if ($result) {
            // Update success
            $data = [
                "status" => true,
                "message" => "Berhasil update data!"
            ];

            $this->session->set_flashdata('success', $data);
            redirect(base_url() . 'admin/newsUpdate');
        } else {
            // Update failed
            $data = [
                "status" => false,
                "message" => "Gagal update data!"
            ];

            $this->session->set_flashdata('failed', $data);
            redirect(base_url() . 'admin/newsUpdate');
        }
    }
}

/* End of file NewsUpdate.php */
