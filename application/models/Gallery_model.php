<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
    public function getGalleryByNewsPostsId($id)
    {
        $this->db->where('news_posts_id', $id);

        $query = $this->db->get('gallery');

        return $query;
    }

    public function addGallery($data)
    {
        $query = $this->db->insert_batch('gallery', $data);

        return $query;
    }

    public function editGallery($news_posts_id, $gallery)
    {
        $this->db->where('news_posts_id', $news_posts_id)->delete('gallery');

        $query = $this->db->insert_batch('gallery', $gallery);

        return $query;
    }
}

/* End of file Gallery_model.php */
