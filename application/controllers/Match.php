<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Match extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('db_model');
			$this->load->helper('url_helper');
		}
		public function code_match_pour_joueur()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('templates/haut');
			$this->load->view('joueur/saisir_code_match_joueur');
			$this->load->view('templates/bas');
		}

		public function afficher_saisir_pseudo_joueur()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('code', 'code', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut');
				$this->load->view('joueur/saisir_code_match_joueur');
				$this->load->view('templates/bas');
			}
			else {
				$codeMatch = htmlspecialchars(addslashes($this->input->post('code')));
				if(($this->db_model->est_match($codeMatch))&&($this->db_model->est_match_actif($codeMatch))) {
					$session_data = array('codeMatch' => $codeMatch);
					$this->session->set_userdata($session_data);
					$this->load->view('templates/haut');
					$this->load->view('joueur/saisir_pseudo_joueur');
					$this->load->view('templates/bas');
				}

				else {
					$data['inexistant'] = 'Ce match n\'existe pas ou n\'est pas encore activé !';
					$this->load->view('templates/haut');
					$this->load->view('joueur/saisir_code_match_joueur_inexistant',$data);
					$this->load->view('templates/bas');
				}
			}

		}
		public function afficher_match_joueur(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('pseudo', 'pseudo', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/haut');
				$this->load->view('joueur/saisir_pseudo_joueur');
				$this->load->view('templates/bas');
			}
			else {
				$pseudo = htmlspecialchars(addslashes($this->input->post('pseudo')));
				
				$session_data = array('joueur' => $pseudo);
				$this->session->set_userdata($session_data);
					

				$session_data = $this->session->userdata('codeMatch');
				$this->session->set_userdata($session_data);
				$codeMatch = $_SESSION['codeMatch'];

				if($this->db_model->est_pas_pseudo($pseudo,$codeMatch)){
					if($this->db_model->inserer_pseudo_joueur($pseudo, $codeMatch)){
						$data['matchs'] = $this->db_model->get_le_match($codeMatch);
						$data['pseudo'] = $pseudo;
						$this->load->view('templates/haut');
						$this->load->view('joueur/match_quest_rep_joueur',$data);
						$this->load->view('templates/bas');
					}
				}

				else {
					$data['existant'] = 'Ce pseudo existe déjà ';
					$this->load->view('templates/haut');
					$this->load->view('joueur/saisir_pseudo_joueur_existant',$data);
					$this->load->view('templates/bas');
				}
			}

		}
		public function valider_match_joueur(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			// On recupere le pseudo du joueur
			$session_data = $this->session->userdata('joueur');
			$this->session->set_userdata($session_data);
			$joueur = $_SESSION['joueur'];

			// On recupere le code u match
			$session_data = $this->session->userdata('codeMatch');
			$this->session->set_userdata($session_data);
			$codeMatch = $_SESSION['codeMatch'];

			// Les regles de valiation
			$this->form_validation->set_rules('rep[]','rep[]','required');

			// si la va lidation renvoie false, on réaffiche la page de jeu
			if ($this->form_validation->run() == FALSE) {
				$data['matchs'] = $this->db_model->get_le_match($codeMatch);
				$data['pseudo'] = $joueur;
				$this->load->view('templates/haut');
				$this->load->view('joueur/match_quest_rep_joueur',$data);
				$this->load->view('templates/bas');
			}
			// Sinon on traite le résultat
			else {
				// On recupere toutes les valeurs cochées de reponses dans le tableau reps 
				$reps = $this->input->post('rep[]');
				// reponses = reps
				$reponses = $reps;
				// ? questions doit contenir le qst_id
				$questions = $this->db_model->get_all_question($codeMatch);

				$resutat_final = 0;
				$nb_questions = 0;
				$nb_succes = 0;

				// Pour chaque question
				foreach($questions as $question) {
					$temp =0; // Temp represente le nombre de reponses coches
					// On recupere les bonnes reponses de chaque question dans nb_bonnes_reponses
					$id_qst = $question["qst_id"];
					$nb_bonnes_reponses = $this->db_model->get_les_bonnes_reponses($id_qst);
					$nb_questions++;
					// On parcours toutes les reponses données
					foreach ($reponses as $reponse) {
						// On recupere l'info de la reponse
						$inf_qsts = $this->db_model->get_rep_info($reponse);
						// Si le qst_id de cette reponse est la meme que celui de la question
						foreach ($inf_qsts as $inf_qst) {
							if (($inf_qst["qst_id"]) == $id_qst) {
								// On test si cette reponse est vrai
								//Si oui
								if (($inf_qst["rep_valeur"]) ==1) {
									$temp++; // On augmente temp
								}
								else {
									$temp--; // Sinon on décremente temp
								}	
							}
						}
					}
					// Si le nombre de bonnes reponses pour cette question est égale au nombre de reponses donnees..... et si toutes ces reponses sont bonnes alors le score augmente de 10
					if ($nb_bonnes_reponses==$temp) {
						$nb_succes++;
						$resutat_final+=10;
					}
				}
				if ($this->db_model->set_score($resutat_final, $joueur, $codeMatch)) {
					$data['pourcentage'] = ($nb_succes/$nb_questions)*100;
					$data['codeMatch'] = $codeMatch;
					$data['pseudo'] = $joueur;
					$data['score'] = $this->db_model->get_score_joueur($codeMatch,$joueur);
					$this->load->view('templates/haut');
					$this->load->view('joueur/fin_du_match_joueur',$data);
					$this->load->view('templates/bas');
				}
			}

		}

		public function afficher_bonnes_reponses(){
			$session_data = $this->session->userdata('codeMatch');
			$this->session->set_userdata($session_data);
			$codeMatch = $_SESSION['codeMatch'];

			$data['matchs'] = $this->db_model->get_le_match($codeMatch);
			$this->load->view('templates/haut');
			$this->load->view('joueur/afficher_bonnes_reponses_joueur',$data);
			$this->load->view('templates/bas');
		}

		public function afficher($codeMatch){
					$data['matchs'] = $this->db_model->get_le_match($codeMatch);
					$this->load->view('templates/haut');
					$this->load->view('match_quest_rep_joueur',$data);
					$this->load->view('templates/bas');
		}
	}
?>