<?php
	class Db_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		public function get_all_news() {
	        $query = $this->db->query('SELECT * FROM actualite ;');
	        return $query->result_array();
        }
		public function get_all_compte() {
			$query = $this->db->query("SELECT cpt_pseudo FROM compte;");
			return $query->result_array();
		}
		public function get_all_profils() {
			$query = $this->db->query("SELECT * FROM compte;");
			return $query->result_array();
		}
		public function get_all_quiz() {
			$query = $this->db->query("SELECT * FROM quiz;");
			return $query->result_array();
		}
		public function get_les_quiz() {
			$query = $this->db->query("SELECT * FROM quiz WHERE quiz_Situation = 'A';");
			return $query->result_array();
		}
		public function get_les_quiz_match() {
			$query = $this->db->query("SELECT quiz.quiz_id, quiz_intitule, quiz_description, match_code, match_intutile
				FROM quiz
				LEFT JOIN matchjeu ON quiz.quiz_id = matchjeu.quiz_id WHERE quiz_Situation = 'A';");
			return $query->result_array();
		}
		public function get_match(){
	        $query = $this->db->query('SELECT match_code,match_intutile,question.qst_id,qst_libelle, rep_id, rep_libelle, qst_ordre FROM reponse INNER JOIN question ON reponse.qst_id = question.qst_id INNER JOIN quiz ON quiz.quiz_id = question.quiz_id INNER JOIN matchjeu ON matchjeu.quiz_id = quiz.quiz_id;');
	        return $query->result_array();         
        }
        /////////////////////////////////////////////////////////////////////////
        public function est_auteur_match($pseudo,$codeMatch) {
			$query = $this->db->query("SELECT * FROM matchjeu WHERE cpt_pseudo = '".$pseudo."' AND match_code = '".$codeMatch."';");
	        if($query->num_rows() > 0)
            {
                return true;
            }
            else
            {
               return false;
            }
		}/*
		public function compte_actif($username){
			$query = $this->db->query("SELECT * FROM compte WHERE cpt_pseudo = '".$username."' AND cpt_actif= 1;");
			if($query->num_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
		}*/
		//////////////////////////////////////////////////////////////////////////////
		public function nombre_de_formateur(){
			$query = $this->db->query("SELECT NOMBRE_DE_FORMATEUR() AS nombre;");
			return $query->result_array();
		}
		/////////////////////////////////////////////////////////////////////////
		public function compte_actif($username){
			$query = $this->db->query("SELECT COMPTE_ACTIF('".$username."') AS valeur;");
			$resultat =  $query->result_array();
			$retour = 0;
			foreach ($resultat as $value) {
				$retour = $value["valeur"];
			}
			if($retour == 1) {
				return true;
			}
			else {
				return false;
			}
		}
		/////////////////////////////////////////////////////////////////////////
		public function raz_le_match($codeMatch,$laSituation,$leDebut,$laFin) {
            $query = $this->db->query("CALL RAZMATCH('".$codeMatch."','".$laSituation."','".$leDebut."','".$laFin."');");
            if($query)
                return true;
            else
               return false;
		}
        /////////////////////////////////////////////////////////////////////////
        public function des_questions($quiz){
	        $query = $this->db->query("SELECT * FROM question WHERE quiz_id = '".$quiz."';");
	        if($query->num_rows() > 4) {
				return true;
			}
			else {
				return false;
			}
        }
        /////////////////////////////////////////////////////////////////////////
        public function des_reponses($qst){
	        $query = $this->db->query("SELECT * FROM reponse WHERE qst_id = '".$qst."';");
	        if($query->num_rows() > 1) {
				return true;
			}
			else {
				return false;
			}
        }
        /////////////////////////////////////////////////////////////////////////
        public function get_all_question_quiz($quiz){
	        $query = $this->db->query("SELECT * FROM question WHERE quiz_id = '".$quiz."';");
	        return $query->result_array();         
        }
        /////////////////////////////////////////////////////////////////////////
        public function quiz_complet($quiz){
        	if($this->des_questions($quiz)) {
		        $questions = $this->get_all_question_quiz($quiz);
		    	foreach ($questions as $question) {
		    		if (!($this->des_reponses($question["qst_id"])))
		    			return false;
		    	}
		    	return true;
			}
			return false;
        }
        /////////////////////////////////////////////////////////////////////////
        function genererChaineAleatoire($longueur)
		{
			 $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			 $longueurMax = strlen($caracteres);
			 $chaineAleatoire = '';
			 for ($i = 0; $i < $longueur; $i++)
			 {
			 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
			 }
			 return $chaineAleatoire;
		}
        /////////////////////////////////////////////////////////////////////////
        public function get_quiz_match_actif() {
			$query = $this->db->query("SELECT quiz.quiz_id, quiz_intitule, quiz_description, quiz.cpt_pseudo AS auteur_quiz, match_code, match_intutile, matchjeu.cpt_pseudo AS auteur_match
				FROM quiz
				LEFT JOIN matchjeu ON quiz.quiz_id = matchjeu.quiz_id WHERE quiz_Situation = 'A';");
			return $query->result_array();
		}
        /////////////////////////////////////////////////////////////////////////
        public function get_all_question($codeMatch){
	        $query = $this->db->query("SELECT * FROM question INNER JOIN quiz ON question.quiz_id = quiz.quiz_id INNER JOIN matchjeu ON quiz.quiz_id = matchjeu.quiz_id WHERE match_code = '".$codeMatch."';");
	        return $query->result_array();         
        }
        ////////////////////////////////////////////////////////////////////////
        public function get_rep_info($reponse) {
        	$query = $this->db->query("SELECT * FROM reponse WHERE rep_id = '".$reponse."';");
			return $query->result_array();
        }
        ///////////////////////////////////////////////////////////////////////
        public function get_les_bonnes_reponses($id_qst) {
        	$query = $this->db->query("SELECT rep_id FROM reponse WHERE qst_id = '".$id_qst."' AND rep_valeur=1;");
			$reustats = $query->result_array();
			$retour = 0;
			foreach ($reustats as $reustat) {
				$retour++;
			}
			return $retour;
        }
        ///////////////////////////////////////////////////////////////////////
        public function get_les_codes_match() {
        	$query = $this->db->query("SELECT * FROM matchjeu;");
			return $query->result_array();
        }
        //////////////////////////////////////////////////////////////////////
        public function set_score($resutat_final, $joueur, $codeMatch) {
			$query = $this->db->query("UPDATE joueur SET jou_score = ".$resutat_final." WHERE jou_pseudo = '".$joueur."' AND match_id IN (SELECT match_id FROM matchjeu WHERE match_code = '".$codeMatch."');");
            if($query)
            {
                return true;
            }
            else
            {
               return false;
            }
		}
        //////////////////////////////////////////////////////////////////////
        public function get_score_joueur($codeMatch, $joueur)
		{
			$query = $this->db->query("SELECT jou_score FROM joueur WHERE
			jou_pseudo = '".$joueur."' AND match_id IN (SELECT match_id FROM matchjeu WHERE match_code = '".$codeMatch."');");
			return $query->row();
		}
        //////////////////////////////////////////////////////////////////////
        public function est_match($codeMatch){
	        $query = $this->db->query("SELECT * FROM matchjeu WHERE match_code = '".$codeMatch."';");
	        if($query->num_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
        }
        public function est_match_actif($codeMatch){
	        $query = $this->db->query("SELECT * FROM matchjeu WHERE match_code = '".$codeMatch."' AND match_situation='A';");
	        if($query->num_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
        }
        public function get_le_match($codeMatch){
	        $query = $this->db->query("SELECT match_code,match_intutile,question.qst_id,qst_libelle, rep_id, rep_libelle, rep_valeur, qst_ordre FROM reponse INNER JOIN question ON reponse.qst_id = question.qst_id INNER JOIN quiz ON quiz.quiz_id = question.quiz_id INNER JOIN matchjeu ON matchjeu.quiz_id = quiz.quiz_id WHERE match_code = '".$codeMatch."';");
	        return $query->result_array();         
        }
        public function get_tout_du_match($codeMatch){
	        $query = $this->db->query("SELECT * FROM matchjeu WHERE match_code = '".$codeMatch."';");
	        return $query->result_array();         
        }
        public function get_joueurs_du_match($codeMatch){
	        $query = $this->db->query("SELECT * FROM joueur WHERE match_id IN (SELECT match_id FROM matchjeu WHERE match_code = '".$codeMatch."');");
	        return $query->result_array();         
        }
        public function score_match($codeMatch){
        	$query = $this->db->query("SELECT jou_score FROM joueur INNER JOIN matchjeu ON matchjeu.match_id = joueur.match_id WHERE match_code = '".$codeMatch."';");
			return $query->result_array();
        }
        public function get_actualite($numero)
		{
			$query = $this->db->query("SELECT act_id, act_description FROM actualite WHERE
			act_id=".$numero.";");
			return $query->row();
		}
		public function get_les_nums_ordre($codeMatch){
        	$query = $this->db->query("SELECT qst_ordre FROM question INNER JOIN quiz ON quiz.quiz_id = question.quiz_id INNER JOIN matchjeu ON matchjeu.quiz_id = quiz.quiz_id WHERE match_code = '".$codeMatch."';");
			return $query->result_array();
        }
		public function est_formateur($username){
			$query = $this->db->query("SELECT * FROM compte WHERE cpt_pseudo ='".$username."' AND cpt_type='F';");
			if($query->num_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
		}
		public function est_pas_pseudo($pseudo, $codeMatch){
			$query = $this->db->query("SELECT * FROM joueur INNER JOIN matchjeu ON matchjeu.match_id = joueur.match_id WHERE jou_pseudo ='".$pseudo."' AND match_code='".$codeMatch."';");
			if($query->num_rows() > 0) {
				return false;
			}
			else {
				return true;
			}
		}
		public function est_administrateur($username){
			$query = $this->db->query("SELECT * FROM compte WHERE cpt_pseudo = '".$username."' AND cpt_type='A';");
			if($query->num_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
		}
		
		public function get_profil_formateur($username) {
			$query = $this->db->query("SELECT * FROM compte WHERE cpt_pseudo = '".$username."' AND cpt_type='F';");
			return $query->result_array();
		}
		public function get_profil_administrateur($username) {
			$query = $this->db->query("SELECT * FROM compte WHERE cpt_pseudo = '".$username."' AND cpt_type='A';");
			return $query->result_array();
		}
		public function connect_compte($username, $password) {
			$salt = "PourNotreMot2018De@_-()''&&PasseQuelQuesPinCeesDeSel^^^ùù%%";
			$lePassword = hash('sha256', $salt.$password);
			$this->db->where('cpt_pseudo', $username);
			$this->db->where('cpt_mdp', $lePassword);
			$query = $this->db->get('compte');
			if($query->num_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
		}
		public function update_pwd($username,$newPwd){
			//$this->db->where('cpt_pseudo', $username);
			//$this->db->update('cpt_mdp', $newPwd);
			$salt = "PourNotreMot2018De@_-()''&&PasseQuelQuesPinCeesDeSel^^^ùù%%";
			$password = hash('sha256', $salt.$newPwd);
			$this->db->set('cpt_mdp', $password);
            $this->db->where('cpt_pseudo',$username);
            $update = $this->db->update('compte');
            if($update)
            {
                return true;
            }
            else
            {
               return false;
            }
		}
		public function update_profil($username, $prenom, $nom){
			
			$this->db->set('cpt_prenom', $prenom);
			$this->db->set('cpt_nom', $nom);
            $this->db->where('cpt_pseudo',$username);
            $update = $this->db->update('compte');
            if($update)
            {
                return true;
            }
            else
            {
               return false;
            }
		}
		public function inserer_pseudo_joueur($pseudo, $codeMatch) {
            $query = $this->db->query("INSERT INTO joueur(jou_id, jou_pseudo, jou_score, match_id) VALUES (NULL, '".$pseudo."', 0, (SELECT match_id FROM matchjeu WHERE match_code = '".$codeMatch."'));");
            if($query)
            {
                return true;
            }
            else
            {
               return false;
            }
		}

		public function create_match($codeMatch,$intitule,$quiz,$situation,$debut,$fin,$pseudo) {
            $query = $this->db->query("INSERT INTO matchjeu (match_code, match_intutile, match_situation, match_date_debut, match_date_fin, cpt_pseudo, quiz_id) VALUES ('".$codeMatch."','".$intitule."', '".$situation."', '".$debut."', '".$fin."', '".$pseudo."', ".$quiz.");");
            if($query)
            {
                return true;
            }
            else
            {
               return false;
            }
		}

		public function update_du_match($codeMatch,$intitule,$situation,$debut,$fin) {
			$this->db->set('match_intutile', $intitule);
			$this->db->set('match_situation', $situation);
			$this->db->set('match_date_debut', $debut);
			$this->db->set('match_date_fin', $fin);
            $this->db->where('match_code',$codeMatch);
            $update = $this->db->update('matchjeu');
            if($update)
            {
                return true;
            }
            else
            {
               return false;
            }
		}
		public function update_desactivation_du_match($codeMatch) {
			$this->db->set('match_situation', 'D');
            $this->db->where('match_code',$codeMatch);
            $update = $this->db->update('matchjeu');
            if($update)
            {
                return true;
            }
            else
            {
               return false;
            }
		}
		public function supprimer_match($codeMatch) {
            $query = $this->db->query("CALL SUPPRIMEMATCH('".$codeMatch."');");
            if($query)
                return true;
            else
               return false;
		}
		

	}
?>