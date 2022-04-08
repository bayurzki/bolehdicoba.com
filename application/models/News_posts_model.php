<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News_posts_model extends CI_Model
{
    public function getAllNewsPosts()
    {
        // $config = $this->config();
        // $config['base_url'] = site_url('admin/dashboard');

        // $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // $query = $this->db->get('news_posts', $config['per_page'], $data['page']);
        $query = $this->db->get('news_posts');

        return $query;
    }

    public function getNewsPostsById($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('news_posts');

        return $query;
    }

    public function getNewsPostsByName($name)
    {
        $this->db->where('name', $name);

        $query = $this->db->get('news_posts');

        return $query;
    }

    public function getNewsPostsByNewsId($id)
    {
        $this->db->select('*, np.id as id, s.id as id_style')->from('news_posts np')->join('styles s', 's.id = np.style_id')->where('news_id', $id);

        $query = $this->db->get();

        return $query;
    }

    public function getOnlyOneNewsPosts()
    {
        $query = $this->db->limit(1)->join('styles', 'styles.id = news_posts.style_id')->get('news_posts');

        return $query;
    }

    public function addNewsPosts($data)
    {
        $query = $this->db->insert('news_posts', $data);

        return $query;
    }

    public function addNewsPostsReturnsId($data)
    {
        $query['result'] = $this->db->insert('news_posts', $data);
        $query['id'] = $this->db->insert_id();

        return $query;
    }

    public function editNewsPostsById($id, $formdata)
    {
        $data = $this->db->where('id', $id);
        $filename = @$formdata['img_path'];
        $news_posts = $data->get('news_posts')->result();

        if (!empty($filename)) {
            echo "MASOK SINGLE UPDATE";
            $oldfiles = $news_posts[0]->img_path;

            // deleting files
            $files = './assets/images/' . $oldfiles;

            unlink($files);
        }

        // Unlink gallery
        $gallery_path = $this->db->select('gallery.img_path')->from('gallery')->join('news_posts', 'gallery.news_posts_id = ' . $id)->get();

        if (!empty($filename) && count($gallery_path->result()) != 0) {
            echo "MASOK GALLERY";
            foreach ($gallery_path->result() as $row) {
                // deleting files
                $files = './assets/images/gallery/' . $row->img_path;

                unlink($files);
            }
        }

        $query = $this->db->where('id', $id)->update('news_posts', $formdata);

        return $query;
    }

    public function deleteNewsPostsById($id, $type)
    {
        $data = $this->db->where('id', $id);
        $news_posts = $data->get('news_posts')->result();

        if ($type == 'banner') {
            $filename = $news_posts[0]->img_path;

            if (!empty($filename)) {
                // deleting files
                $files = './assets/images/' . $filename;

                unlink(@$files);
            }
        } else {
            // Unlink gallery
            $gallery_path = $this->db->select('gallery.img_path')->from('gallery')->join('news_posts', 'gallery.news_posts_id = ' . $id)->get();

            if (count($gallery_path->result()) != 0) {
                echo "Masokkk";
                foreach ($gallery_path->result() as $row) {
                    // deleting files
                    $files = './assets/images/gallery/' . $row->img_path;

                    print("<pre>" . print_r($files, true) . "</pre>");
                    unlink($files);
                }
            }
        }


        // return $gallery_path;
        $query = $this->db->where('id', $id)->delete('news_posts');

        return $query;
    }
}

/* End of file News_news_posts_model.php */
