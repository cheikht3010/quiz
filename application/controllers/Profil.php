<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Profil extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
			$this->load->library('session');
		}
		public function lister_formateur() {
			$session_data = $this->session->userdata('username');
			$this->session->set_userdata($session_data);
			$username = $_SESSION['username'];
			$data['profil'] = $this->db_model->get_profil_formateur($username);
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/profil_form',$data);
			$this->load->view('templates/bas');
		}
		public function lister_administrateur() {
			$session_data = $this->session->userdata('username');
			$this->session->set_userdata($session_data);
			$username = $_SESSION['username'];
			$data['profil'] = $this->db_model->get_profil_administrateur($username);
			$this->load->view('templates/haut_administrateur');
			$this->load->view('administrateur/profil_admin',$data);
			$this->load->view('templates/bas');
		}
		public function changer_mdp_formateur() {
			$session_data = $this->session->userdata('username');
			$this->session->set_userdata($session_data);
			$username = $_SESSION['username'];

			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('oldPwd', 'oldPwd', 'required');
			$this->form_validation->set_rules('newPwd', 'newPwd', 'required');
			$this->form_validation->set_rules('confPwd', 'confPwd', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/change_mdp_form');
				$this->load->view('templates/bas');
			}
			else {
				$oldPwd = htmlspecialchars(addslashes($this->input->post('oldPwd')));
				$newPwd = htmlspecialchars(addslashes($this->input->post('newPwd')));
				$confPwd = htmlspecialchars(addslashes($this->input->post('confPwd')));
				if(($this->db_model->connect_compte($username, $oldPwd)) && ($newPwd == $confPwd)){
					if($this->db_model->update_pwd($username, $newPwd))
					{
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/mdp_a_change');
						$this->load->view('templates/bas');
					}
				}

				else {
					$data['motDePasse'] = 'Ancien mot de passe ou confirmation du mot de passe erronée, Veuillez rééssayer';
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/change_mdp_form_err',$data);
					$this->load->view('templates/bas');
				}
			}
		}
		public function changer_profil_formateur() {
			$session_data = $this->session->userdata('username');
			$this->session->set_userdata($session_data);
			$username = $_SESSION['username'];

			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('prenom', 'prenom', 'required');
			$this->form_validation->set_rules('nom', 'nom', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/change_profil_form');
				$this->load->view('templates/bas');
			}
			else {
				$prenom = htmlspecialchars(addslashes($this->input->post('prenom')));
				$nom = htmlspecialchars(addslashes($this->input->post('nom')));
				$data['prenom'] = $prenom;
				$data['nom'] = $nom;
				if($this->db_model->update_profil($username, $prenom, $nom)){
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/profil_a_change',$data);
					$this->load->view('templates/bas');
				}
				else {
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/change_profil_form');
					$this->load->view('templates/bas');
				}
			}
		}

		public function changer_mdp_administrateur() {
			$session_data = $this->session->userdata('username');
			$this->session->set_userdata($session_data);
			$username = $_SESSION['username'];

			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('oldPwd', 'oldPwd', 'required');
			$this->form_validation->set_rules('newPwd', 'newPwd', 'required');
			$this->form_validation->set_rules('confPwd', 'confPwd', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut_administrateur');
				$this->load->view('administrateur/change_mdp_admin');
				$this->load->view('templates/bas');
			}
			else {
				$oldPwd = htmlspecialchars(addslashes($this->input->post('oldPwd')));
				$newPwd = htmlspecialchars(addslashes($this->input->post('newPwd')));
				$confPwd = htmlspecialchars(addslashes($this->input->post('confPwd')));
				if(($this->db_model->connect_compte($username, $oldPwd)) && ($newPwd == $confPwd)){
					if($this->db_model->update_pwd($username, $newPwd))
					{
						$this->load->view('templates/haut_administrateur');
						$this->load->view('administrateur/mdp_a_change');
						$this->load->view('templates/bas');
					}
				}

				else {
					$data['motDePasse'] = 'Ancien mot de passe ou confirmation du mot de passe erronée, Veuillez rééssayer';
					$this->load->view('templates/haut_administrateur');
					$this->load->view('administrateur/change_mdp_admin_err',$data);
					$this->load->view('templates/bas');
				}
			}
		}
		public function changer_profil_administrateur() {
			$session_data = $this->session->userdata('username');
			$this->session->set_userdata($session_data);
			$username = $_SESSION['username'];

			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('prenom', 'prenom', 'required');
			$this->form_validation->set_rules('nom', 'nom', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut_administrateur');
				$this->load->view('administrateur/change_profil_admin');
				$this->load->view('templates/bas');
			}
			else {
				$prenom = htmlspecialchars(addslashes($this->input->post('prenom')));
				$nom = htmlspecialchars(addslashes($this->input->post('nom')));
				$data['prenom'] = $prenom;
				$data['nom'] = $nom;
				if($this->db_model->update_profil($username, $prenom, $nom)){
					$this->load->view('templates/haut_administrateur');
					$this->load->view('administrateur/profil_a_change',$data);
					$this->load->view('templates/bas');
				}
				else {
					$this->load->view('templates/haut_administrateur');
					$this->load->view('administrateur/change_profil_admin');
					$this->load->view('templates/bas');
				}
			}
		}

	}
?>
