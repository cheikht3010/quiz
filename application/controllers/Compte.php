<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Compte extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
		}
		public function lister() {
			$data['titre'] = 'Liste des pseudos :';
			$data['pseudos'] = $this->db_model->get_all_compte();
			$this->load->view('templates/haut');
			$this->load->view('compte_liste',$data);
			$this->load->view('templates/bas');
		}
		public function connecter() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('pseudo', 'pseudo', 'required');
			$this->form_validation->set_rules('mdp', 'mdp', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut');
				$this->load->view('compte_connecter');
				$this->load->view('templates/bas');
			}
			else {
				$username = htmlspecialchars(addslashes($this->input->post('pseudo')));
				$password = htmlspecialchars(addslashes($this->input->post('mdp')));


				if($this->db_model->connect_compte($username,$password)) {
					if(($this->db_model->est_formateur($username)) && ($this->db_model->compte_actif($username)))
					{
						$session_data = array('username' => $username,
												'type' => "F" );
						$this->session->set_userdata($session_data);
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/compte_menu_form');
						$this->load->view('templates/bas');
					}
					else if(($this->db_model->est_administrateur($username)) && ($this->db_model->compte_actif($username)))
					{
						$session_data = array('username' => $username,
												'type'=>"A" );
						$this->session->set_userdata($session_data);
						$this->load->view('templates/haut_administrateur');
						$this->load->view('administrateur/compte_menu_admin');
						$this->load->view('templates/bas');
					}
					else {
						$data['inactif'] = 'Ce compte est inactif ! Veuillez contacter un Administrateur du site pour l\'activer';
						$this->load->view('templates/haut');
						$this->load->view('compte_connecter_inactif',$data);
						$this->load->view('templates/bas');
					}
				}
				else {
					$data['inexistant'] = 'Identifiants inconnus/erronés';
					$this->load->view('templates/haut');
					$this->load->view('compte_connecter_inexistant',$data);
					$this->load->view('templates/bas');
				}
			}
		}
		public function mon_accueil(){
			$session_data = $this->session->userdata('username');
			$this->session->set_userdata($session_data);
			$username = $_SESSION['username'];
			if($this->db_model->est_formateur($username)){
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/compte_menu_form');
				$this->load->view('templates/bas');
			}
			if($this->db_model->est_administrateur($username)){
				$this->load->view('templates/haut_administrateur');
				$this->load->view('administrateur/compte_menu_admin');
				$this->load->view('templates/bas');
			}
		}

		public function deconnecter(){
			$this->session->sess_destroy();
			redirect(base_url(), 'refresh');
		}

	}
?>