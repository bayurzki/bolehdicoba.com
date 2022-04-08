<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Test_model');
        $this->load->model('Case_model');
        $this->load->model('News_model');
    }


    public function index()
    {
        $data = ["status" => "success"];

        echo $this->blade->view()->make('test.page', [
            'data' => $data
        ]);
    }

    public function getTest()
    {
        $result = $this->Test_model->getData();

        if ($result->num_rows() > 0) {
            echo $this->blade->view()->make('test.page', [
                'result' => $result
            ]);
        }
    }

    public function getLimit()
    {
        $data = $this->Test_model->getByLimit(3, 1)->result();

        print("<pre>" . print_r($data, true) . "</pre>");
    }

    public function getGallery($id = 1)
    {
        $this->Test_model->getGallery();
    }

    public function getLength($filter = 'Digital Campaign Strategy')
    {
        $this->Case_model->getCasesLengthByCategory($filter);
    }

    public function getNewsLength()
    {
        print_r($this->Test_model->getAllNewsLength());
    }

    public function getOnlyOne()
    {
        print("<pre>" . print_r($this->Test_model->getOnlyOne()->result(), true) . "</pre>");
    }

    public function getOnlyOneNewsPosts()
    {
        print("<pre>" . print_r($this->Test_model->getOnlyOneNewsPosts()->result(), true) . "</pre>");
    }

    public function cobaAkbar()
    {
        $data = [
            'id' => '1',
            'kategori' => 'akbar',
            'title' => 'Title A'
        ];

        print("<pre>" . print_r($this->Test_model->cobaAkbar($data), true) . "</pre>");
    }
}

/* End of file Test.php */
