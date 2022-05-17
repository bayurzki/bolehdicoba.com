<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Case_model extends CI_Model
{
    public function config()
    {
        $config['total_rows'] = $this->db->count_all('case_study');
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

    public function getCaseById($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('case_study');

        return $query;
    }

    public function getOnlyOneCase()
    {
        $query = $this->db->limit(1)->get('case_study');

        return $query;
    }

    public function getAllCases()
    {
        $query = $this->db->get('case_study');

        return $query;
    }

    public function getAllCasesWithLimit($limit)
    {
        $query = $this->db->limit($limit)->get('case_study');

        return $query;
    }

    public function getAllCasesWithPagination()
    {
        $config = $this->config();
        $config['base_url'] = site_url('post/getPost');

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //$query = $this->db->get('posts', $config['per_page'], $data['page']);
        $query = $this->db->query("
            SELECT *, (SELECT COUNT(*) FROM posts WHERE posts.case_id = case_study.id) AS component FROM case_study 
            ORDER BY created_at DESC
        ");

        return $query;
    }

    public function getAllCasesWithPaginationfilter($search,$bisnis_size,$industry,$product,$region,$objective)
    {
        $config = $this->config();
        $config['base_url'] = site_url('post/getPost');

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        if ($bisnis_size != 'all') {
            $bis = '=';
        }else{
            $bis = '!=';
        }

        if ($industry != 'all') {
            $ind = '=';
        }else{
            $ind = '!=';
        }

        if ($product != 'all') {
            $pr = '=';
        }else{
            $pr = '!=';
        }

        if ($region != 'all') {
            $rg = '=';
        }else{
            $rg = '!=';
        }

        if ($objective != 'all') {
            $ob = '=';
        }else{
            $ob = '!=';
        }
        if ($search != '') {
            $query = $this->db->query("
                SELECT *, (SELECT COUNT(*) FROM posts WHERE posts.case_id = case_study.id) AS component FROM case_study WHERE 
                name LIKE '%$search%' OR excerpt LIKE '%$search%' AND
                bisnis_size ".$bis." '$bisnis_size' AND 
                category ".$ind." '$industry' AND 
                product ".$pr." '$product' AND 
                region ".$rg." '$region' AND 
                objective ".$ob." '$objective'
            ");
        }else{
            $query = $this->db->query("
                SELECT *, (SELECT COUNT(*) FROM posts WHERE posts.case_id = case_study.id) AS component FROM case_study WHERE 
                bisnis_size ".$bis." '$bisnis_size' AND 
                category ".$ind." '$industry' AND 
                product ".$pr." '$product' AND 
                region ".$rg." '$region' AND 
                objective ".$ob." '$objective'
            ");
        }
        
        return $query;
    }

    public function getCasesLengthByCategory($filter)
    {
        $cond = array('category =' => $filter);

        $query = $this->db->distinct()->where($cond)->get('case_study');

        return $query;
    }

    public function getAllCasesByCategory($filter)
    {
        $cond = array('category =' => $filter);

        $this->db->distinct()->select('id, name, title, img_path, category, created_at')->where($cond);

        $query = $this->db->get('case_study');

        return $query;
    }

    public function getCaseByCategory($filter, $limit = 3, $offset = 0)
    {
        $cond = array('category =' => $filter);

        $this->db->distinct()->select('id, name, title, img_path, category, created_at')->where($cond);

        $query = $this->db->get('case_study', $limit, $offset);

        return $query;
    }

    public function addCase($data)
    {
        $query = $this->db->insert('case_study', $data);

        return $query;
    }

    public function editCaseById($id, $formdata)
    {
        $data = $this->db->where('id', $id);
        $oldfiles = $data->get('case_study')->result()[0]->img_path;
        $filename = $formdata['img_path'];

        if (!empty($filename)) {
            // deleting files
            $files = './assets/images/' . $oldfiles;

            unlink($files);
        }

        $query = $this->db->where('id', $id)->update('case_study', $formdata);

        return $query;
    }

    public function deleteCaseById($id)
    {
        $data = $this->db->where('id', $id);
        $filename = $data->get('case_study')->result()[0]->img_path;

        if (!empty($filename)) {
            // deleting files
            $files = './assets/images/' . $filename;

            unlink($files);
        }

        $query = $this->db->where('id', $id)->delete('case_study');

        return $query;
    }

    public function product(){
        $data = array(
            'Footwear',
            'Apparel',
            'Accesories',
            'Cosmetics',
            'Medical Products',
            'Digital Products'
        );
        return $data;
    }

    public function bisnis_size(){
        $data = array(
            'Agency',
            'Large enterprise',
            'Small and medium-sized enterprises'
        );
        return $data;
    }

    public function industry(){
        $data = array(
            'Automotive',
            'B2B',
            'Consumer goods',
            'E-commerce',
            'Education',
            'Entertainment and media',
            'Financial services',
            'Gaming',
            'Health and pharmaceuticals',
            'Non-profits and organisations',
            'Professional Services',
            'Property',
            'Restaurants',
            'Retail',
            'Sports',
            'Technology',
            'Telecommunication',
            'Travel'
        );
        return $data;
    }

    public function objective(){
        $data = array(
            array(
                'parent' => 'Agency',
                'child' => array(
                    'Brand awareness',
                    'Reach',
                    'Social good',
                    'Video Views'
                )
            ),
            
            array(
                'parent' => 'Consideration',
                'child' => array(
                    'App installs',
                    'Website clicks',
                    'App engagement',
                    'Lead generation',
                    'Post Engagement'
                ),
            ),

            array(
                'parent' => 'Conversion',
                'child' => array(
                    'Event responses',
                    'Website Conversions',
                    'Catalogue Sales',
                    'Store Traffic'
                )
            )
        );
        return $data;
    }

    public function region(){
        $query = $this->db->get('province');
        $query = $query->result_array();
        return $query;
    }
}

/* End of file Case_model.php */
