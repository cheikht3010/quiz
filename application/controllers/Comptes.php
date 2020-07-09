<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Comptes extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
		}
		public function lister_comptes() {
			$data['titre'] = 'Liste des comptes :';
			$data['nb_form'] = $this->db_model->nombre_de_formateur();
			$data['comptes'] = $this->db_model->get_all_profils();
			$this->load->view('templates/haut_administrateur');
			$this->load->view('administrateur/liste_comptes_admin',$data);
			$this->load->view('templates/bas');
		}

	}
?>