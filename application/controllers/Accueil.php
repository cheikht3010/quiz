<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Accueil extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
		}
		public function afficher()
		{
			$data['actus'] = $this->db_model->get_all_news();
			$this->load->helper('url');
			//Chargement de la view haut.php
			$this->load->view('templates/haut');

			//Chargement de la view du milieu : page_accueil.php
			$this->load->view('page_accueil', $data);

			//Chargement de la view bas.php
			$this->load->view('templates/bas');
		}
	}
?>