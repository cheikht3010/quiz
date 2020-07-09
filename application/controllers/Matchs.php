<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Matchs extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
			$this->load->library('session');
		}
		public function lister()
		{
			$data['titre'] = 'Liste des matchs, de leurs questions et des reponses assocéees :';
			$data['matchs'] = $this->db_model->get_match();
			$this->load->view('templates/haut');
			$this->load->view('matchs_liste',$data);
			$this->load->view('templates/bas');
		}
		public function option_match_pour_formateur()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['matchs'] = $this->db_model->get_quiz_match_actif();
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/option_match_form',$data);
			$this->load->view('templates/bas');
		}
		public function code_match_pour_formateur()
		{
			$data['matchs'] = $this->db_model->get_les_codes_match();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/saisir_code_match',$data);
			$this->load->view('templates/bas');
		}
		public function code_match_pour_modifier_formateur()
		{
			$data['matchs'] = $this->db_model->get_les_codes_match();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/saisir_code_match_modifier_form',$data);
			$this->load->view('templates/bas');
		}
		public function code_match_pour_supprimer_formateur()
		{
			$data['matchs'] = $this->db_model->get_les_codes_match();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/saisir_code_match_supprimer_form',$data);
			$this->load->view('templates/bas');
		}
		public function code_match_pour_raz_formateur()
		{
			$data['matchs'] = $this->db_model->get_les_codes_match();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/saisir_code_match_raz_form',$data);
			$this->load->view('templates/bas');
		}
		public function zero_match() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('code', 'code', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data['matchs'] = $this->db_model->get_les_codes_match();
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/saisir_code_match_raz_form',$data);
				$this->load->view('templates/bas');
			}
			else {
				$codeMatch = htmlspecialchars(addslashes($this->input->post('code')));
				if($this->db_model->est_match($codeMatch)){
					$session_data = $this->session->userdata('username');
					$this->session->set_userdata($session_data);
					$pseudo = $_SESSION['username'];
					// Si le formateur en est l'auteur
					if($this->db_model->est_auteur_match($pseudo,$codeMatch)){
						// Si le code du match est bon
						$session_data = array('codeMatch' => $codeMatch); //
						$this->session->set_userdata($session_data);
						$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
						$data['joueurs'] = $this->db_model->get_joueurs_du_match($codeMatch);
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/fomulaire_raz_match_form',$data);
						$this->load->view('templates/bas');
					}
					else {
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/vous_etes_pas_auteur_match_raz_form');
						$this->load->view('templates/bas');
					}

				}

				else {
					$data['matchs'] = $this->db_model->get_les_codes_match();
					$this->load->helper('form');
					$this->load->library('form_validation');
					$data['inexistant'] = 'Ce code match n\'existe pas !';
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/saisir_code_match_raz_form_inexistant',$data);
					$this->load->view('templates/bas');
				}
			}
		}
		public function raz_match() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('debut', 'debut', 'required');
			$this->form_validation->set_rules('fin', 'fin', 'required');
			if ($this->form_validation->run() == FALSE) {
				$session_data = $this->session->userdata('codeMatch');
				$this->session->set_userdata($session_data);
				$codeMatch = $_SESSION['codeMatch'];
				$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
				$data['joueurs'] = $this->db_model->get_joueurs_du_match($codeMatch);
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/fomulaire_raz_match_form',$data);
				$this->load->view('templates/bas');
			}
			else {
				$laSituation = htmlspecialchars(addslashes($this->input->post('situation')));
				$leDebut = htmlspecialchars(addslashes($this->input->post('debut')));
				$laFin = htmlspecialchars(addslashes($this->input->post('fin')));
				$session_data = $this->session->userdata('codeMatch');
				$this->session->set_userdata($session_data);
				$codeMatch = $_SESSION['codeMatch'];

				$session_data = $this->session->userdata('username');
				$this->session->set_userdata($session_data);
				$pseudo = $_SESSION['username'];

				if(($this->db_model->est_match($codeMatch)) && ($this->db_model->est_auteur_match($pseudo,$codeMatch))){
					if($this->db_model->raz_le_match($codeMatch,$laSituation,$leDebut,$laFin)){
						$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
						$data['joueurs'] = $this->db_model->get_joueurs_du_match($codeMatch);
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/fomulaire_raz_match_form_reussite',$data);
						$this->load->view('templates/bas');
					}
				}
				else {
					$data['matchs'] = $this->db_model->get_les_codes_match();
					$this->load->helper('form');
					$this->load->library('form_validation');

					$data['erreur'] = 'Erreur lors de la remise à zero';
					$session_data = $this->session->userdata('codeMatch');
					$this->session->set_userdata($session_data);
					$codeMatch = $_SESSION['codeMatch'];
					$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
					$data['joueurs'] = $this->db_model->get_joueurs_du_match($codeMatch);
					
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/fomulaire_raz_match_form_erreur',$data);
					$this->load->view('templates/bas');
				}
			}
		}

		public function modifier_match() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('code', 'code', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data['matchs'] = $this->db_model->get_les_codes_match();
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/saisir_code_match_modifier_form',$data);
				$this->load->view('templates/bas');
			}
			else {
				$codeMatch = htmlspecialchars(addslashes($this->input->post('code')));
				// Si le code du match est bon
				if($this->db_model->est_match($codeMatch)){
					$session_data = $this->session->userdata('username');
					$this->session->set_userdata($session_data);
					$pseudo = $_SESSION['username'];
					// Si le formateur en est l'auteur
					if($this->db_model->est_auteur_match($pseudo,$codeMatch)){
						$session_data = array('codeMatch' => $codeMatch); //
						$this->session->set_userdata($session_data);
						$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/fomulaire_modif_match_form',$data);
						$this->load->view('templates/bas');
					}
					// Sinon on lui reéaffiche le message d'erreur puis il est redirigé
					else {
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/vous_etes_pas_auteur_match_form');
						$this->load->view('templates/bas');
					}

				}

				else {
					$data['matchs'] = $this->db_model->get_les_codes_match();
					$this->load->helper('form');
					$this->load->library('form_validation');
					$data['inexistant'] = 'Ce code match n\'existe pas !';
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/saisir_code_match_modifier_form_inexistant',$data);
					$this->load->view('templates/bas');
				}
			}
		}

		public function update_match() {
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('intitule', 'intitule', 'required');
			$this->form_validation->set_rules('situation', 'situation', 'required');
			$this->form_validation->set_rules('debut', 'debut', 'required');
			$this->form_validation->set_rules('fin', 'fin', 'required');

				$session_data = $this->session->userdata('codeMatch');

				$this->session->set_userdata($session_data);
				
				$codeMatch = $_SESSION['codeMatch'];


			if ($this->form_validation->run() == FALSE) {
				$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/fomulaire_modif_match_form',$data);
				$this->load->view('templates/bas');
			}
			else {
				$intitule = htmlspecialchars(addslashes($this->input->post('intitule')));
				$situation = htmlspecialchars(addslashes($this->input->post('situation')));
				$debut = htmlspecialchars(addslashes($this->input->post('debut')));
				$fin = htmlspecialchars(addslashes($this->input->post('fin')));

					$session_data = $this->session->userdata('username');
					$this->session->set_userdata($session_data);
					$pseudo = $_SESSION['username'];
				if (($this->db_model->est_auteur_match($pseudo,$codeMatch)) &&($this->db_model->update_du_match($codeMatch,$intitule,$situation,$debut,$fin))){
					$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
					$data['reussite'] = "La modification du match a été effectuée avec succés";
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/fomulaire_modif_match_form_reussite',$data);
					$this->load->view('templates/bas');
				}

				else {
					$data['matchs'] = $this->db_model->get_les_codes_match();
					$this->load->helper('form');
					$this->load->library('form_validation');
					$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
					$data['erreur'] = 'Champ(s) vide(s) ou mal renseigné(s) !';
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/fomulaire_modif_match_form_erreur',$data);
					$this->load->view('templates/bas');
				}
			}
		}
		public function supprimer_match() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('code', 'code', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data['matchs'] = $this->db_model->get_les_codes_match();
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/saisir_code_match_supprimer_form',$data);
				$this->load->view('templates/bas');
			}
			else {
				$codeMatch = htmlspecialchars(addslashes($this->input->post('code')));
				if($this->db_model->est_match($codeMatch))
				{
					$session_data = $this->session->userdata('username');
					$this->session->set_userdata($session_data);
					$pseudo = $_SESSION['username'];

					// Si le formateur en est l'auteur
					if($this->db_model->est_auteur_match($pseudo,$codeMatch)){
						if($this->db_model->supprimer_match($codeMatch)) {
							$data['leMatch'] = $codeMatch;
							$data['matchs'] = $this->db_model->get_les_codes_match();
							$this->load->view('templates/haut_formateur');
							$this->load->view('formateur/suppression_match_reussite',$data);
							$this->load->view('templates/bas');
						}
					}
					// Sinon on lui reéaffiche le message d'erreur puis il est redirigé
					else {
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/vous_etes_pas_auteur_match_sup_form');
						$this->load->view('templates/bas');
					}

				}

				else {
					$data['matchs'] = $this->db_model->get_les_codes_match();
					$this->load->helper('form');
					$this->load->library('form_validation');
					$data['inexistant'] = 'Ce code match n\'existe pas !';
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/saisir_code_match_supprimer_form_inexistant',$data);
					$this->load->view('templates/bas');
				}
			}
		}
		public function code_match_pour_creer_formateur()
		{
			$data['quiz_matchs'] = $this->db_model->get_les_quiz_match();
			$data['matchs'] = $this->db_model->get_quiz_match_actif();
			$data['quiz_s'] = $this->db_model->get_les_quiz();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('templates/haut_formateur');
			$this->load->view('formateur/fomulaire_creer_match_form',$data);
			$this->load->view('templates/bas');
		}
		public function creer_match() {
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('quiz', 'quiz', 'required');
			$this->form_validation->set_rules('intitule', 'intitule', 'required');
			$this->form_validation->set_rules('situation', 'situation', 'required');
			$this->form_validation->set_rules('debut', 'debut', 'required');
			$this->form_validation->set_rules('fin', 'fin', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data['quiz_matchs'] = $this->db_model->get_les_quiz_match();
				$data['matchs'] = $this->db_model->get_les_codes_match();
				$data['quiz_s'] = $this->db_model->get_les_quiz();
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/fomulaire_creer_match_form',$data);
				$this->load->view('templates/bas');
			}
			else {
				$codeMatch = $this->db_model->genererChaineAleatoire(8);
				while (($this->db_model->est_match($codeMatch)) || (strlen($codeMatch) == 0) || (strlen($codeMatch) != 8)) {
					$codeMatch = $this->db_model->genererChaineAleatoire(8);
				}
				$intitule = htmlspecialchars(addslashes($this->input->post('intitule')));
				$quiz = htmlspecialchars(addslashes($this->input->post('quiz')));
				$situation = htmlspecialchars(addslashes($this->input->post('situation')));
				$debut = htmlspecialchars(addslashes($this->input->post('debut')));
				$fin = htmlspecialchars(addslashes($this->input->post('fin')));

				if (!($this->db_model->quiz_complet($quiz))) {
					$data['quiz_matchs'] = $this->db_model->get_les_quiz_match();
					$data['matchs'] = $this->db_model->get_les_codes_match();
					$data['quiz_s'] = $this->db_model->get_les_quiz();
					$this->load->helper('form');
					$this->load->library('form_validation');
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/fomulaire_creer_match_form_quiz_incomplet',$data);
					$this->load->view('templates/bas');
				}

				else {
					$session_data = $this->session->userdata('username');
					$this->session->set_userdata($session_data);
					$pseudo = $_SESSION['username'];
					if ($this->db_model->create_match($codeMatch,$intitule,$quiz,$situation,$debut,$fin,$pseudo)) {
						$data['matchs'] = $this->db_model->get_tout_du_match($codeMatch);
						$data['code'] = $codeMatch; 
						$this->load->view('templates/haut_formateur');
						$this->load->view('formateur/fomulaire_creer_match_form_reussite',$data);
						$this->load->view('templates/bas');	
					}
				}
			}
		}
		public function terminer_le_match() {
			// On recupere le code u match
			$session_data = $this->session->userdata('codeMatch');
			$this->session->set_userdata($session_data);
			$codeMatch = $_SESSION['codeMatch'];
			$nb_questions = 0;
			$questions = $this->db_model->get_all_question($codeMatch);
			foreach($questions as $question) {
				$nb_questions++;
			}
			$score_max = $nb_questions * 10;
			$data['codeMatch'] = $codeMatch;
			$data['score_max'] = $score_max;
			$data['score'] = $this->db_model->score_match($codeMatch);
			if ($this->db_model->update_desactivation_du_match($codeMatch)) {
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/terminer_le_match_form',$data);
				$this->load->view('templates/bas');
			}
		}
		public function afficher_match() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('code', 'code', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut_formateur');
				$this->load->view('formateur/saisir_code_match');
				$this->load->view('templates/bas');
			}
			else {
				$codeMatch = htmlspecialchars(addslashes($this->input->post('code')));
				if($this->db_model->est_match($codeMatch)){
					$data['matchs'] = $this->db_model->get_le_match($codeMatch);
					$data['score'] = $this->db_model->score_match($codeMatch);
					$session_data = array('codeMatch' => $codeMatch);
					$this->session->set_userdata($session_data);
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/match_quest_rep_form',$data);
					$this->load->view('templates/bas');
				}

				else {
					$this->load->view('templates/haut_formateur');
					$this->load->view('formateur/saisir_code_match');
					//$this->load->view('page_accueil');
					$this->load->view('templates/bas');
				}
			}
		}
	}
?>