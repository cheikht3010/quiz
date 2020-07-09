<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Actualite extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
		}
		public function afficher($numero) {
			if ($numero==FALSE) {
				$url=base_url(); header("Location:$url");
			}
			else {
				$data['titre'] = 'Actualité :';
				$data['actus'] = $this->db_model->get_actualite($numero);
				$this->load->view('templates/haut');
				$this->load->view('actualite_afficher',$data);
				$this->load->view('templates/bas');
			}
		}
		public function afficher_news_formateur() {
			$data['actus'] = $this->db_model->get_all_news();
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/actualites_afficher_form',$data);
			$this->load->view('templates/bas');
		}
		public function afficher_news_administrateur() {
			$data['actus'] = $this->db_model->get_all_news();
			$this->load->view('templates/haut_administrateur');
			$this->load->view('administrateur/actualites_afficher_admin',$data);
			$this->load->view('templates/bas');
		}
	}
?>