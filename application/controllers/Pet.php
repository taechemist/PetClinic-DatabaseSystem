<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pet extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('pet_model');
			$this->load->model('owner_model');
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$data['pet'] = $this->pet_model->get_pets();
			$data['num_rows'] = $this->pet_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('includes/datatable-header');
			$this->load->view('templates/body-start');
			$this->load->view('includes/menubar');
			$this->load->view('pet/home', $data);
			$this->load->view('templates/body-end');
			$this->load->view('includes/datatable-footer');
			$this->load->view('templates/footer');
		}

		public function view($id = null)
		{
			if(empty($id)){
				show_404();
			} else {
				$data['pet'] = $this->pet_model->get_pet($id);
				$data['owner2'] = $this->owner_model->get_owner($data['pet']['OWNER_ID']);
				$this->load->view('templates/header');
				$this->load->view('includes/datepicker-header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('pet/view', $data);
				$this->load->view('templates/body-end');
				$this->load->view('pet/view-b-inc');
				$this->load->view('templates/footer');
			}
		}

		public function create($action = null)
		{

			if(empty($action)) {
				$this->load->view('templates/header');
				$this->load->view('includes/datepicker-header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('pet/create');
				$this->load->view('templates/body-end');
				$this->load->view('pet/create-b-inc');
				$this->load->view('templates/footer');
			} elseif($action == 'submit') {
				$data = $this->pet_model->add_pet();
				echo json_encode($data);
			} else {
				show_404();
			}
		}

		public function ajax($action = null, $id = null)
		{
			if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) ) {

				if(empty($action)) {
					show_404();
				} elseif ($action == 'getpets') {
					$data = $this->pet_model->get_pets();
					echo json_encode($data);
				} elseif ($action == 'getpet') {
					$data = $this->pet_model->get_pet($id);
					echo json_encode($data);
				} elseif ($action == 'getnumrows') {
					$data['num_rows'] = $this->pet_model->count_rows();
					echo json_encode($data);
				} elseif ($action == 'update') {
					$data = $this->pet_model->update_pet();
					echo json_encode($data);
				} elseif ($action == 'delpet') {
					$data = $this->pet_model->del_pet($id);
					echo json_encode($data);
				} else {
					show_404();
				}

			} else {
				show_404();
			}
		}

//		public function view($page = 'home')
//		{
//			 if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
//			{
//				// Whoops, we don't have a page for that!
//				show_404();
//			}
//			$data['title'] = ucfirst($page); // Capitalize the first letter
//			$this->load->view('templates/header', $data);
//			$this->load->view('pages/'.$page, $data);
//			$this->load->view('templates/footer', $data);
//		}
}