<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Webpage extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Case_model');
        $this->load->model('Post_model');
        $this->load->model('News_model');
        $this->load->model('News_posts_model');
    }

    public function index()
    {
        $limit = 6;

        $data['results'] = $this->Case_model->getAllCasesWithLimit($limit)->result();
        $data['all_news'] = $this->News_model->getAllNews()->result();
        $data['description'] = "We expand brands through digital performance branding.";

        echo $this->blade->view()->make('webpage.index', $data);
    }

    public function linkttree(){

        echo $this->blade->view()->make('webpage.links');
    }

    public function about()
    {
        $data['description'] = "Create short term impacts while building long term values through performance branding.";
        $data['title'] = "About Us";
        echo $this->blade->view()->make('webpage.about');
    }

    public function whatWeDo()
    {
        $data['title'] = "What we do";
        $data['description'] =  "Generate visitors, improve conversion rate and maintain lifetime values to boost your business";
        echo $this->blade->view()->make('webpage.what-we-do', $data);
    }

    public function caseStudy($name = '', $id = ''){
        $data['results'] = $this->Case_model->getAllCases()->result();
        $data['title'] = "Case Study";
        $data['description'] = 'Explore more about our partner success stories.';
        
        if (isset($_GET['search'])) {
            if ($name == '' || $id == '') {
                $datana = $this->Case_model->getAllCasesWithPaginationfilter($_GET['search'],$_GET['bisnis_size'],$_GET['industry'],$_GET['product'],$_GET['region'],$_GET['objective'])->result();
                if (sizeof($datana) == 0) {
                    $data['data'] = NULL;
                }else{
                    $data['data'] = $datana;
                }
                $data['component'] = $this->Post_model->getAllPosts()->result();
            } else {
                $data['data'] = $this->Case_model->getCaseById($id)->result();
                $data['component'] = $this->Post_model->getPostByCaseId($id)->result();
            }
            $data['filter'] = array(
                'search' => $_GET['search'],
                'bisnis_size' => $_GET['bisnis_size'],
                'industry' => $_GET['industry'],
                'product' => $_GET['product'],
                'region' => $_GET['region'],
                'objective' => $_GET['objective'],
            );
        }else{
            if ($name == '' || $id == '') {
                $data['data'] = $this->Case_model->getAllCasesWithPagination()->result();
                $data['component'] = $this->Post_model->getAllPosts()->result();
            } else {
                $data['data'] = $this->Case_model->getCaseById($id)->result();
                $data['component'] = $this->Post_model->getPostByCaseId($id)->result();
            }
            $data['filter'] = NULL;
        }
        $data['industry'] = $this->Case_model->industry();
        $data['bisnis_size'] = $this->Case_model->bisnis_size();
        $data['product'] = $this->Case_model->product();
        $data['objective'] = $this->Case_model->objective();
        $data['categories'] = $this->Case_model->getAllCases()->result();
        $data['region'] = $this->Case_model->region();
        echo $this->blade->view()->make('webpage.case-study', $data);
    }

    public function newsAndUpdate($name = '', $id = '', $category = '')
    {
        $data['results'] = $this->News_model->getAllNews2()->result();
        
        if ($name == '' || $id == '') {
            $data['data'] = $this->News_model->getOnlyOneNews()->result();
        } else {
            $data['data'] = $this->News_model->getNewsById($id)->result();
        }
        $data['primary'] = $this->News_model->getPrimaryNews();
        //print("<pre>" . print_r($this->News_model->getPrimaryNews(), true) . "</pre>");

        echo $this->blade->view()->make('webpage.news-and-update', $data);
    }

    public function event1(){
        $data['title'] = "BDD Webinar: 2021 Digital Marketing Insights";
        $data['teks'] = "Register yourself by filling the registration form below:";
        $data['success_note'] = "Thank you for registering our webinar! We will send the details to your email. Don't forget to follow our social media for more information about digital marketing and advertising. See you soon!";
        echo $this->blade->view()->make('webpage.marketing-insight', $data);
    }

    public function kirim_email()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        $date_now = date('d-m-Y');
        $config_mail['smtp_user'] = 'app@bolehdicoba.com';
        $config_mail['password'] = 'bnkgndvalgwvbmha';
        $config_mail['smtp_port'] = 'smtp.gmail.com';
        $config_mail['port'] = '587';
        $config_mail['protocol'] = 'TLS';
        $config_mail['mailtype'] = 'html';
        $config_mail['charset'] = 'iso-8859-1';

        $email_to = 'adityasholahudin608@gmail.com';

        $pesan = "
            <table cellpadding='0' cellspacing='0' border='0' align='center' style='border-collapse:collapse;line-height:100%!important;margin:0;padding:0;width:100%!important'>
                <tbody>
                    <tr>
                        <td>
                            <table style='border-collapse:collapse;margin:auto;max-width:700px;min-width:320px;background:#494949;width:100%'>
                                <tbody>
                                    <tr>
                                        <td valign='top' style='padding:0px 20px'>
                                            <table cellpadding'0' cellspacing='0' border='0' align='center' style='background-clip:padding-box;border-collapse:collapse;color:#545454;font-size:13px;line-height:20px;margin:0 auto;width:100%'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top'>
                                                            <table cellpadding='0' cellspacing='0' border='0' style='background-clip:padding-box;border-collapse:separate;width:100%;background:#fff;border-radius:3px;margin-top:20px;padding-bottom:20px;width:100%;'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td style='background-clip:padding-box;color:#545454;font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:20px;overflow:hidden;padding:15px 20px' colspan='2'>
                                                                            <p style='margin:20px 0;font-size:20px;text-align:center'>
                                                                                <img src=\"https://cdn.shopify.com/s/files/1/1133/9738/t/15/assets/logo-black_180x.png?v=3401774231970810097\" style=\"max-width: 200px; width: 100%; margin: auto; display: block;\" />
                                                                            </p>
                                                                            <div style='width:100%;height: 20px;background: #494949;margin:20px 0;'></div>
                                                                            <p style='margin:5px 0;text-align:center;font-size: 1.4em;font-weight: bold;'>
                                                                                Order Confirmation, " . $date_now . "
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style='text-align:center;overflow:hidden;padding:15px 20px'>
                                                                            Pesanan kamu akan segera diproses
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table cellpadding='0' cellspacing='0' border='0' class='m_-688961049760307625message_footer_table' align=' center' style='border-collapse:collapse;color:#545454;font-family:'Helvetica Neue',Arial,sans-serif;font-size:13px;line-height:20px;margin:0 auto;max-width:100%;width:100%'>
                                                <tbody>
                                                    <tr>
                                                        <td style='padding:20px;color:white;text-align:center'>
                                                            Need help? contact us at email <a href='mailto:adityasholahudin608@gmail.com' style='text-decoration: revert;color: white;'>hometryon@gmail.com</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        ";

        // Capctha
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

        $userIp = $this->input->ip_address();

        $secret = $this->config->item('google_secret');

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $status = json_decode($output, true);

        if ($status['success']) {
            // Captcha success
            $this->load->library('email', $config_mail);
            $this->email->set_newline("\r\n");
            $this->email->from('app@bolehdicoba.com', 'tes email');
            $this->email->reply_to('apaaja12345@gmail.com');
            $this->email->to($email_to);
            $this->email->subject('Konfirmasi Pesanan');
            $this->email->message($pesan);

            $this->email->send();

            $data = [
                "status" => true,
                "message" => "Success sending message!"
            ];

            $this->session->set_flashdata('success', $data);
        } else {
            $data = [
                "status" => false,
                "message" => "Google Recaptcha Unsuccessful!"
            ];

            $this->session->set_flashdata('errors', $data);
        }

        header("Location: $referer");
    }
}

/* End of file Webpage.php */
