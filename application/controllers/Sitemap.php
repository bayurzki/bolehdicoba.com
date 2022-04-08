<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
    }

    public function index(){
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('sitemap');
    }

    public function pages(){

        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('sitemap_pages');
    }

    public function news(){
        $data['news'] = $this->News_model->getAllNews()->result();

        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('sitemap_news', $data);
    }

    public function all_link(){
        $data['news'] = $this->News_model->getAllNews()->result();

        echo $this->blade->view()->make('webpage.links', $data);
    }

}