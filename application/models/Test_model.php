<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model
{

    public function getData()
    {
        $query = $this->db->get('test');

        return $query;
    }

    public function getByLimit($limit, $offset)
    {
        $query = $this->db->get('posts', $limit, $offset);

        return $query;
    }

    public function getGallery($id = 16)
    {
        $this->db->where('news_posts.id', $id);
        // Unlink gallery
        $gallery_path = $this->db->select('gallery.img_path')->from('gallery')->join('news_posts', 'gallery.news_posts_id = news_posts.id')->get();

        if (count($gallery_path->result()) != 0) {
            foreach ($gallery_path->result() as $row) {
                print("<pre>" . print_r($row, true) . "</pre>");
            }
        }
    }

    public function getNewsLengthByCategory($filter)
    {
        $cond = array('category =' => $filter);

        $query = $this->db->distinct()->where($cond)->get('news_update');

        return $query;
    }

    public function getAllNewsLength()
    {
        $query = $this->db->count_all_results('news_update');

        return $query;
    }

    public function getOnlyOne()
    {
        $query = $this->db->limit(1)->get('news_update');

        return $query;
    }

    public function getOnlyOneNewsPosts()
    {
        $query = $this->db->limit(1)->join('styles', 'styles.id = news_posts.style_id')->get('news_posts');

        return $query;
    }

    public function cobaAkbar($form)
    {
        $query = $this->db->replace('test', $form);

        return $query;
    }
}

/* End of file Test_model.php */
