<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{
    public function config()
    {
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];

        $config['num_links'] = floor($choice);
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging mt-3 mr-3"><nav><ul class="pagination d-inline-flex text-right">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        return $config;
    }

    public function addPost($data)
    {
        $query = $this->db->insert('posts', $data);

        return $query;
    }

    public function getAllPosts()
    {
        // $config = $this->config();
        // $config['base_url'] = site_url('admin/dashboard');

        // $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // $query = $this->db->get('posts', $config['per_page'], $data['page']);
        $query = $this->db->get('posts');

        return $query;
    }

    public function getPostById($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('posts');

        return $query;
    }

    public function getOnlyOnePost()
    {
        $query = $this->db->limit(1)->join('styles', 'styles.id = posts.style_id')->where('posts.style_id = 6')->get('posts');

        return $query;
    }

    public function getPostByName($name)
    {
        $this->db->where('name', $name);

        $query = $this->db->get('posts');

        return $query;
    }

    public function getPostByCaseId($id)
    {
        $this->db->select('*, posts.id as id, styles.name, styles.id as id_style')->from('posts')->join('styles', 'styles.id = posts.style_id')->where('case_id', $id);

        $query = $this->db->get();

        return $query;
    }

    public function editPostById($id, $formdata)
    {
        $data = $this->db->where('id', $id);
        $oldfiles = $data->get('posts')->result()[0]->img_path;
        $filename = $formdata['img_path'];

        if (!empty($filename)) {
            // deleting files
            $files = './assets/images/' . $oldfiles;

            unlink($files);
        }

        $query = $this->db->where('id', $id)->update('posts', $formdata);

        return $query;
    }

    public function deletePostById($id)
    {
        $data = $this->db->where('id', $id);
        $filename = $data->get('posts')->result()[0]->img_path;

        if (!empty($filename)) {
            // deleting files
            $files = './assets/images/' . $filename;

            unlink($files);
        }

        $query = $this->db->where('id', $id)->delete('posts');

        return $query;
    }
}

/* End of file Post_model.php */
