<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Quiz extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
			$this->load->library('session');
		}

		public function option_quiz_pour_formateur()
		{
			$data['quiz_s'] = $this->db_model->get_all_quiz();
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/option_quiz_form',$data);
			$this->load->view('templates/bas');
		}
	}
?>