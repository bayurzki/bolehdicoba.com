<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{
    public function config()
    {
        $config['total_rows'] = $this->db->count_all('news_update');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];

        $config['num_links'] = floor($choice);
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging mt-3 mr-3"><nav class="text-center"><ul class="pagination d-inline-flex text-right">';
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

    public function getNewsById($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('news_update');

        return $query;
    }

    public function getOnlyOneNews()
    {
        $query = $this->db->limit(1)->get('news_update');

        return $query;
    }

    public function getAllNews()
    {
        $query = $this->db->get('news_update');

        return $query;
    }

    public function getAllNewsWithLimit($limit = 3, $offset = 0)
    {
        $query = $this->db->from('news_update');
        $query = $this->db->order_by('created_at','desc');
        $query = $this->db->limit($limit, $offset);
        $query = $this->db->get();

        return $query;
    }

    public function getAllNewsLength()
    {
        $query = $this->db->count_all_results('news_update');

        return $query;
    }

    public function getAllNewsWithPagination()
    {
        $config = $this->config();
        $config['base_url'] = site_url('post/getNews');

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // $query = $this->db->get('news_posts', $config['per_page'], $data['page']);
        // $query = $this->db->get('news_update');
        $limit = 3;
        $offset =0;
        $query = $this->db->from('news_update');
        $query = $this->db->order_by('created_at','desc');
        $query = $this->db->limit($limit, $offset);
        $query = $this->db->get();

        return $query;
    }

    public function getNewsLengthByCategory($filter)
    {
        $cond = array('category =' => $filter);

        $query = $this->db->distinct()->where($cond)->get('news_update');

        return $query;
    }

    public function getAllNewsByCategory($filter)
    {
        $cond = array('category =' => $filter);

        $this->db->distinct()->select('id, name, title, img_path, category, created_at')->where($cond);

        $query = $this->db->get('news_update');

        return $query;
    }

    public function getNewsByCategory($filter, $limit = 3, $offset = 0)
    {
        $cond = array('category =' => $filter);

        $this->db->distinct()->select('id, name, title, img_path, category, created_at')->where($cond);

        $query = $this->db->get('news_update', $limit, $offset);

        return $query;
    }

    public function addNews($data)
    {
        $query = $this->db->insert('news_update', $data);

        return $query;
    }

    public function editNewsById($id, $formdata)
    {
        $data = $this->db->where('id', $id);
        $oldfiles = $data->get('news_update')->result()[0]->img_path;
        $filename = $formdata['img_path'];

        // print("<pre>" . print_r($data, true) . "</pre>");

        if (!empty($filename)) {
            // deleting files
            $files = './assets/images/' . $oldfiles;

            unlink($files);
        }

        $query = $this->db->where('id', $id)->update('news_update', $formdata);

        return $query;
    }

    public function deleteNewsById($id)
    {
        $data = $this->db->where('id', $id);
        $filename = $data->get('news_update')->result()[0]->img_path;

        if (!empty($filename)) {
            // deleting files
            $files = './assets/images/' . $filename;

            unlink($files);
        }

        $query = $this->db->where('id', $id)->delete('news_update');

        return $query;
    }
}

/* End of file News_model.php */
