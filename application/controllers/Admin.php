<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Case_model');
		$this->load->model('Post_model');
		$this->load->model('News_model');
		$this->load->model('News_posts_model');
		$this->load->model('Style_model');
		$this->load->model('Gallery_model');
	}

	public function index()
	{
		if ($this->session->userdata('username') != '') {
			redirect(base_url() . 'admin/dashboard');
		}
		echo $this->blade->view()->make('admin.login');
	}

	public function dashboard()
	{
		if ($this->session->userdata('username') != '') {
			$data['data'] = $this->Case_model->getAllCases()->result();
			$data['pagination'] = $this->pagination->create_links();
			$data['no'] = $this->uri->segment('3') + 1;
			// print("<pre>" . print_r($data, true) . "</pre>");
			echo $this->blade->view()->make('admin.dashboard', $data);
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function caseForm($id = ''){

		if ($this->session->userdata('username') != '') {
			$industry = $this->Case_model->industry();
			$bisnis_size = $this->Case_model->bisnis_size();
			$product = $this->Case_model->product();
			$objective = $this->Case_model->objective();
			$categories = $this->Case_model->getAllCases()->result();
			$region = $this->Case_model->region();
			if ($id != '') {
				// for edit case
				$data = $this->Case_model->getCaseById($id)->result();

				echo $this->blade->view()->make('admin.case-form', [
					'data' => $data,
					'category' => $categories,
					'industry' => $industry,
					'bisnis_size' => $bisnis_size,
					'product' => $product,
					'region' => $region,
					'objective' => $objective
				]);
			} else {
				// for add case
				echo $this->blade->view()->make('admin.case-form', [
					'category' => $categories,
					'industry' => $industry,
					'bisnis_size' => $bisnis_size,
					'product' => $product,
					'region' => $region,
					'objective' => $objective
				]);
			}
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function deleteCase($id)
	{
		$data = $this->Case_model->deleteCaseById($id);

		if ($data) {
			// delete success
			$data = [
				"status" => true,
				"message" => "Berhasil menghapus data!"
			];

			$this->session->set_flashdata('success', $data);
			redirect(base_url() . 'admin/dashboard');
		} else {
			// delete failed
			$data = [
				"status" => false,
				"message" => "Gagal menghapus data!"
			];

			$this->session->set_flashdata('errors', 'Error deleting data');
			redirect(base_url() . 'admin/dashboard');
		}
	}

	public function component($name = "niion", $id = 6)
	{
		if ($this->session->userdata('username') != '') {
			$post = $this->Post_model->getPostByCaseId($id)->result();
			$styles = $this->Style_model->getAllStyles()->result();

			// add case ID to session
			$temp = $this->session->userdata();
			$temp['case_id']  = $id;
			$temp['case_name'] = $name;
			$this->session->set_userdata($temp);

			echo $this->blade->view()->make('admin.component-dashboard', [
				'data' => $post,
				'styles' => $styles
			]);
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function componentForm($id = '')
	{
		if ($this->session->userdata('username') != '') {
			// print("<pre>" . print_r($this->session->userdata(), true) . "</pre>");

			$styles = $this->Style_model->getAllStyles()->result();
			$allCases = $this->Case_model->getAllCasesWithPagination()->result();

			if ($id != '') {
				// for edit case
				$data = $this->Post_model->getPostById($id)->result();

				echo $this->blade->view()->make('admin.component-form', [
					'data' => $data,
					'styles' => $styles,
					'carousel_items' => $allCases
				]);
			} else {
				// for add case
				echo $this->blade->view()->make('admin.component-form', [
					'styles' => $styles,
					'carousel_items' => $allCases
				]);
			}
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function deleteComponent($id)
	{
		$data = $this->Post_model->deletePostById($id);

		if ($data) {
			// delete success
			$data = [
				"status" => true,
				"message" => "Berhasil menghapus data!"
			];

			$this->session->set_flashdata('success', $data);
			echo json_encode($data);
		} else {
			// delete failed
			$data = [
				"status" => false,
				"message" => "Gagal menghapus data!"
			];

			$this->session->set_flashdata('errors', 'Error deleting data');
			echo json_encode($data);
		}
	}

	public function newsUpdate()
	{
		if ($this->session->userdata('username') != '') {
			$data['data'] = $this->News_model->getAllNews()->result();
			$data['pagination'] = $this->pagination->create_links();
			$data['no'] = $this->uri->segment('3') + 1;
			// print("<pre>" . print_r($data, true) . "</pre>");
			echo $this->blade->view()->make('admin.blog.news-dashboard', $data);
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function newsForm($id = '')
	{
		if ($this->session->userdata('username') != '') {
			$categories = $this->News_model->getAllNews()->result();

			if ($id != '') {
				// for edit news
				$data = $this->News_model->getNewsById($id)->result();

				echo $this->blade->view()->make('admin.blog.news-form', [
					'data' => $data,
					'category' => $categories
				]);
			} else {
				// for add news
				echo $this->blade->view()->make('admin.blog.news-form', [
					'category' => $categories
				]);
			}
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function deleteNews($id)
	{
		$data = $this->News_model->deleteNewsById($id);

		if ($data) {
			// delete success
			$data = [
				"status" => true,
				"message" => "Berhasil menghapus data!"
			];

			$this->session->set_flashdata('success', $data);
			redirect(base_url() . 'admin/newsUpdate');
		} else {
			// delete failed
			$data = [
				"status" => false,
				"message" => "Gagal menghapus data!"
			];

			$this->session->set_flashdata('errors', 'Error deleting data');
			redirect(base_url() . 'admin/newsUpdate');
		}
	}

	public function newsPosts($name = "niion", $id = 6)
	{
		if ($this->session->userdata('username') != '') {
			$post = $this->News_posts_model->getNewsPostsByNewsId($id)->result();
			$styles = $this->Style_model->getAllStyles()->result();

			// add case ID to session
			$temp = $this->session->userdata();
			$temp['news_id']  = $id;
			$temp['news_name'] = $name;
			$this->session->set_userdata($temp);

			echo $this->blade->view()->make('admin.blog.component-news-dashboard', [
				'data' => $post,
				'styles' => $styles
			]);
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function newsPostsForm($id = '')
	{
		if ($this->session->userdata('username') != '') {
			$styles = $this->Style_model->getAllStyles()->result();
			$allNews = $this->News_model->getAllNewsWithPagination()->result();

			if ($id != '') {
				// for edit case
				$data = $this->News_posts_model->getNewsPostsById($id)->result();
				$gallery = $this->Gallery_model->getGalleryByNewsPostsId($id)->result();

				// print("<pre>" . print_r($gallery, true) . "</pre>");

				echo $this->blade->view()->make('admin.blog.component-news-form', [
					'data' => $data,
					'styles' => $styles,
					'carousel_items' => $allNews,
					'gallery' => $gallery
				]);
			} else {
				// for add case
				echo $this->blade->view()->make('admin.blog.component-news-form', [
					'styles' => $styles,
					'carousel_items' => $allNews,
					'gallery' => []
				]);
			}
		} else {
			redirect(base_url() . 'admin/login');
		}
	}

	public function deleteNewsPosts($id, $type)
	{
		$referer = $_SERVER['HTTP_REFERER'];

		$result = $this->News_posts_model->deleteNewsPostsById($id, $type);

		if ($result) {
			// delete success
			$data = [
				"status" => true,
				"message" => "Berhasil menghapus data!"
			];

			$this->session->set_flashdata('success', $data);
			header("Location: $referer");
			// echo json_encode($data);
		} else {
			// delete failed
			$data = [
				"status" => false,
				"message" => "Gagal menghapus data!"
			];

			$this->session->set_flashdata('errors', $data);
			header("Location: $referer");
			// echo json_encode($data);
		}
	}

	public function login()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			# success
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->Admin_model->login($username, $password)) {
				// User found
				$session_data = array(
					'username' => $username,
					'password' => $password
				);

				$this->session->set_userdata($session_data);

				redirect(base_url() . 'admin/dashboard');
			} else {
				// User not found
				$this->session->set_flashdata('errors', 'Invalid username or password');
				$this->index();
			}
		} else {
			# if errors or failed
			$this->index();
		}
	}

	public function logout()
	{
		$session_data = array(
			'username',
			'password'
		);

		$this->session->unset_userdata($session_data);

		redirect(base_url() . 'admin/login');
	}
}
