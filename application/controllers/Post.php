<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Case_model');
        $this->load->model('Post_model');
        $this->load->model('News_model');
        $this->load->model('News_posts_model');
        $this->load->model('Gallery_model');
    }

    public function getPost($name = '', $id = '')
    {
        $allCases = $this->Case_model->getAllCasesWithPagination();

        if ($name == '' || $id == '') {
            $result = $this->Post_model->getOnlyOnePost();
        } else {
            $result = $this->Post_model->getPostByCaseId($id);
        }

        echo $this->blade->view()->make('webpage.case-detail', [
            'result' => $result,
            'carousel_items' => $allCases
        ]);
    }

    public function getNews($name = '', $id = '')
    {
        $allNews = $this->News_model->getAllNewsWithPagination();

        if ($name == '' || $id == '') {
            $result = $this->News_posts_model->getOnlyOneNewsPosts();
        } else {
            $result = $this->News_posts_model->getNewsPostsByNewsId($id);
        }
        
        // Get news posts ID to get Gallery
        if (!empty($result->result())) {
            foreach ($result->result() as $row) {
                if ($row->name == 'gallery') {
                    $gallery = $this->Gallery_model->getGalleryByNewsPostsId($row->id)->result();
                }else{
                    $gallery = [];
                }
            }
        } else {
            $gallery = [];
        }
        // print("<pre>" . print_r($result, true) . "</pre>");
        // die();
        echo $this->blade->view()->make('webpage.news-detail', [
            'result' => $result,
            'carousel_items' => $allNews,
            'gallery' => $gallery
        ]);
    }

    public function getCaseByCategory($filter = "digital campaign strategy")
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $page = $this->input->post('page');

        if (stripos($filter, '%20') == true) {
            $filter = str_replace("%20", " ", $filter);
        }

        $filtered = $this->Case_model->getCaseByCategory($filter, $limit, $offset);
        $casesLength = $this->Case_model->getCasesLengthByCategory($filter);

        $data['filtered'] = $filtered->result();
        $data['all_cases'] = $casesLength->num_rows();
        $data['page'] = $page;

        echo json_encode($data);
    }

    public function addPost()
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

        if ($this->Post_model->addPost($data)) {
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

    public function editPost($id = 1)
    {
        date_default_timezone_set('Asia/Jakarta');

        $data = $this->input->post();
        $data['updated_at'] = date('Y-m-d H:i:s');

        // print("<pre>" . print_r($_FILES['img_path'], true) . "</pre>");

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

        if ($this->Post_model->editPostById($id, $data)) {
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

    public function getNewsPosts($name = 'niion', $id = 6)
    {
        $result = $this->Post_model->getNewsPostsByNewsId($id);
        // $allNews = $this->Case_model->getAllNewsWithPagination();

        // print("<pre>" . print_r($data, true) . "</pre>");

        if ($result->num_rows() > 0) {
            echo $this->blade->view()->make('webpage.case-detail', [
                'result' => $result
                // 'carousel_items' => $allNews
            ]);
        }
    }

    public function getNewsByCategory($filter = '')
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $page = $this->input->post('page');

        if (stripos($filter, '%20') == true) {
            $filter = str_replace("%20", " ", $filter);
        }

        // Get all categories
        $categories = $this->News_model->getAllNews();

        if ($filter == '') {
            $filtered = $this->News_model->getAllNewsWithLimit($limit, $offset);
            $newsLength = $this->News_model->getAllNewsLength();
            $data['all_news'] = $newsLength;
        } else {
            $filtered = $this->News_model->getNewsByCategory($filter, $limit, $offset);
            $newsLength = $this->News_model->getNewsLengthByCategory($filter);
            $data['all_news'] = $newsLength->num_rows();
        }

        $data['filtered'] = $filtered->result();
        $data['page'] = $page;
        $data['categories'] = $categories->result();

        echo json_encode($data);
    }

    public function addNewsPosts()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        $data = $this->input->post();

        $temp = @$_FILES['img_path']['name'];

        // multiple image handling
        if (@count($_FILES['img_path']['name']) > 0
            && is_array($temp)
            && !empty($temp[0]) ? true : false
        ) {
            echo "MASOK MULTIPLE IMAGES";
            $this->load->library('upload');
            $dataImage = array();
            $files = $_FILES;
            $cpt = count($_FILES['img_path']['name']);

            //upload an image options
            $config = array();
            if ($cpt > 1) {
                $config['upload_path'] = FCPATH . "./assets/images/gallery/";
            } else {
                $config['upload_path'] = FCPATH . "./assets/images/";
            }

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '0';

            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['img_path']['name'] = $files['img_path']['name'][$i];
                $_FILES['img_path']['type'] = $files['img_path']['type'][$i];
                $_FILES['img_path']['tmp_name'] = $files['img_path']['tmp_name'][$i];
                $_FILES['img_path']['error'] = $files['img_path']['error'][$i];
                $_FILES['img_path']['size'] = $files['img_path']['size'][$i];

                $config['file_name'] = time() . $files['img_path']['name'][$i];

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('img_path')) {
                    // Upload failed
                    echo "Upload failed";

                    $data = [
                        "status" => false,
                        "message" => "Gagal upload gambar!"
                    ];

                    $this->session->set_flashdata('failed', $data);
                    redirect(base_url('admin/newsPosts/' . $this->session->userdata()['news_name'] . '/' . $this->session->userdata()['news_id']));
                    die();
                }

                $dataImage[] = $this->upload->data();
            }
            // Add single image
            if (count($dataImage) < 2) {
                echo "SINGLE UPLOAD";
                $data['img_path'] = $dataImage[0]['file_name'];
            }

            $data = $this->News_posts_model->addNewsPostsReturnsId($data);
            // print("<pre>" . print_r($result, true) . "</pre>");

            if ($data['result']) {
                // Multiple Images handle
                if (count($dataImage) > 1) {
                    echo "MULTIPLE UPLOAD";
                    // Insert news posts success
                    $gallery = [];

                    foreach ($dataImage as $key => $val) {
                        array_push($gallery, array(
                            'news_posts_id' => $data['id'],
                            'img_path' => $val['file_name'],
                            'type' => $val['file_type'],
                            'size' => $val['file_size']
                        ));
                    }

                    $result = $this->Gallery_model->addGallery($gallery);
                    // print("<pre>" . print_r($result, true) . "</pre>");
                    if ($result != 0 && $result) {
                        $data = [
                            "status" => true,
                            "message" => "Berhasil memasukkan data!"
                        ];

                        $this->session->set_flashdata('success', $data);
                        header("Location: $referer");
                        die();
                    }
                }

                // Edit success
                $data = [
                    "status" => true,
                    "message" => "Berhasil mengedit data!"
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
        // No Images found, just edit the data        
        else {
            echo "NO IMAGES FOUND";

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
    }

    public function editNewsPosts($id = 1)
    {
        date_default_timezone_set('Asia/Jakarta');

        $data = $this->input->post();
        // $data['img_path'] = 0;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $temp = @$_FILES['img_path']['name'];

        // data with image handling
        if (@count($_FILES['img_path']['name']) > 0
            && is_array($temp)
            && !empty($temp[0]) ? true : false
        ) {
            $this->load->library('upload');
            $dataImage = array();
            $files = $_FILES;
            $cpt = count($_FILES['img_path']['name']);

            //upload an image options
            $config = array();
            if ($cpt > 1) {
                $config['upload_path'] = FCPATH . "./assets/images/gallery/";
            } else {
                $config['upload_path'] = FCPATH . "./assets/images/";
            }

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '0';

            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['img_path']['name'] = $files['img_path']['name'][$i];
                $_FILES['img_path']['type'] = $files['img_path']['type'][$i];
                $_FILES['img_path']['tmp_name'] = $files['img_path']['tmp_name'][$i];
                $_FILES['img_path']['error'] = $files['img_path']['error'][$i];
                $_FILES['img_path']['size'] = $files['img_path']['size'][$i];

                $config['file_name'] = time() . $files['img_path']['name'][$i];

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('img_path')) {
                    // Upload failed
                    echo "Upload failed";

                    $data = [
                        "status" => false,
                        "message" => "Gagal upload gambar!"
                    ];

                    $this->session->set_flashdata('failed', $data);
                    redirect(base_url('admin/newsPosts/' . $this->session->userdata()['news_name'] . '/' . $this->session->userdata()['news_id']));
                    die();
                }

                $dataImage[] = $this->upload->data();
            }

            // Edit single image
            if (count($dataImage) < 2) {
                $data['img_path'] = $dataImage[0]['file_name'];
            }

            if ($this->News_posts_model->editNewsPostsById($id, $data)) {
                // Multiple Images handle
                if (count($dataImage) > 1) {
                    $gallery = [];

                    foreach ($dataImage as $key => $val) {
                        array_push($gallery, array(
                            'news_posts_id' => $id,
                            'img_path' => $val['file_name'],
                            'type' => $val['file_type'],
                            'size' => $val['file_size']
                        ));
                    }

                    $result = $this->Gallery_model->editGallery($id, $gallery);
                    // print("<pre>" . print_r($result, true) . "</pre>");
                    if ($result != 0 && $result) {
                        $data = [
                            "status" => true,
                            "message" => "Berhasil mengedit data!"
                        ];

                        $this->session->set_flashdata('success', $data);
                        redirect(base_url('admin/newsPosts/' . $this->session->userdata()['news_name'] . '/' . $this->session->userdata()['news_id']));
                        die();
                    }
                }

                // Edit success
                $data = [
                    "status" => true,
                    "message" => "Berhasil mengedit data!"
                ];

                $this->session->set_flashdata('success', $data);
                redirect(base_url('admin/newsPosts/' . $this->session->userdata()['news_name'] . '/' . $this->session->userdata()['news_id']));
            } else {
                // Edit failed
                $data = [
                    "status" => false,
                    "message" => "Gagal mengedit data!"
                ];

                $this->session->set_flashdata('failed', $data);
                redirect(base_url('admin/newsPosts/' . $this->session->userdata()['news_name'] . '/' . $this->session->userdata()['news_id']));
            }
        }
        // No Images found, just edit the data
        else {
            if ($this->News_posts_model->editNewsPostsById($id, $data)) {
                // Edit success
                $data = [
                    "status" => true,
                    "message" => "Berhasil mengedit data!"
                ];

                $this->session->set_flashdata('success', $data);
                redirect(base_url('admin/newsPosts/' . $this->session->userdata()['news_name'] . '/' . $this->session->userdata()['news_id']));
            } else {
                // Edit failed
                $data = [
                    "status" => false,
                    "message" => "Gagal mengedit data!"
                ];

                $this->session->set_flashdata('failed', $data);
                redirect(base_url('admin/newsPosts/' . $this->session->userdata()['news_name'] . '/' . $this->session->userdata()['news_id']));
            }
        }
    }
}

/* End of file Post.php */
