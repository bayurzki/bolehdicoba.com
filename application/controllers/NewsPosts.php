<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NewsPosts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_posts_model');
        $this->load->model('News_model');
    }

    public function addNewsPosts()
    {
        $referer = $_SERVER['HTTP_REFERER'];
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
                redirect(base_url() . 'admin/dashboard');
            } else {
                echo "Upload success";
                $upload_data = $this->upload->data('file_name');

                $data['img_path'] = $upload_data;
            }
        }

        // print("<pre>" . print_r($data, true) . "</pre>");
        if ($this->News_posts_model->addNewsPosts($data)) {
            // Insert success
            $data = [
                "status" => true,
                "message" => "Berhasil memasukkan data!"
            ];

            $this->session->set_flashdata('success', $data);
            header("Location: $referer");
        } else {
            // Insert failed
            $data = [
                "status" => false,
                "message" => "Gagal memasukkan data!"
            ];

            $this->session->set_flashdata('failed', $data);
            header("Location: $referer");
        }
    }

    public function editNewsPosts($id = 1)
    {
        date_default_timezone_set('Asia/Jakarta');

        $data = $this->input->post();
        $data['updated_at'] = date('Y-m-d H:i:s');

        // print("<pre>" . print_r($referer, true) . "</pre>");        

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
                redirect(base_url() . 'admin/dashboard');
            } else {
                echo "Upload success";
                $upload_data = $this->upload->data('file_name');

                $data['img_path'] = $upload_data;
            }
        }

        if ($this->News_posts_model->editNewsPostsById($id, $data)) {
            // Edit success
            $data = [
                "status" => true,
                "message" => "Berhasil mengedit data!"
            ];

            $this->session->set_flashdata('success', $data);
            redirect(base_url('admin/component/' . $this->session->userdata()['case_name'] . '/' . $this->session->userdata()['case_id']));
        } else {
            // Edit failed
            $data = [
                "status" => false,
                "message" => "Gagal mengedit data!"
            ];

            $this->session->set_flashdata('failed', $data);
            redirect(base_url('admin/component/' . $this->session->userdata()['case_name'] . '/' . $this->session->userdata()['case_id']));
        }
    }

    public function getCaseByCategory($filter = "digital campaign strategy")
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $page = $this->input->post('page');

        if (stripos($filter, '%20') == true) {
            $filter = str_replace("%20", " ", $filter);
        }

        $filtered = $this->News_model->getCaseByCategory($filter, $limit, $offset);
        $allNews = $this->News_model->getAllNewsByCategory($filter);

        $data['filtered'] = $filtered->result();
        $data['all_cases'] = $allNews->result();
        $data['page'] = $page;

        echo json_encode($data);
    }

    public function getNewsPosts($name = 'niion', $id = 6)
    {
        $result = $this->News_posts_model->getNewsPostsByCaseId($id);
        $allNews = $this->News_model->getAllNewsWithPagination();

        // print("<pre>" . print_r($data, true) . "</pre>");

        if ($result->num_rows() > 0) {
            echo $this->blade->view()->make('webpage.case-detail', [
                'result' => $result,
                'carousel_items' => $allNews
            ]);
        }
    }
}

/* End of file NewsNewsPostss.php */
