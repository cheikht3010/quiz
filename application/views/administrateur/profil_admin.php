
<div class="text-center">
<h2>Bonjour <?php echo $_SESSION['username']; ?>, bienvenu(e) sur votre profil administrateur</h2>
</div>
<br><br>


<?php
	foreach($profil as $login){
		$lePseudo = $login["cpt_pseudo"];
		$lePrenom = $login["cpt_prenom"];
		$leNom = $login["cpt_nom"];
	}
?>

<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			<form class="justify-content-center">
				<div class="row">
                	<div class="col-md-3">
                		<label for="pseudo">Votre pseudo</label>
                	</div>
                	<div class="col-md-9">
                		<input readonly="readonly" type="text" class="form-control" id="pseudo" value="<?php echo $lePseudo;?>">
                	</div>
                </div>
                <br><br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="prenom">Votre prénom</label>
                	</div>
                	<div class="col-md-9">
                		<input readonly="readonly" type="text" class="form-control" id="prenom" value="<?php echo $lePrenom;?>">
                	</div>
                </div>
                <br><br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="nom">Votre nom</label>
                	</div>
                	<div class="col-md-9">
                		<input readonly="readonly" type="text" class="form-control" id="nom" value="<?php echo $leNom;?>">
                	</div>
                </div>
            </form>
        </div>
    </div>
</div>

<br><br>
<div class="text-center">
    <h3>
    <a href="<?php echo $this->config->base_url(); ?>index.php/profil/changer_profil_administrateur">Cliquez ici pour modifier votre profil</a>
    </h3>
</div>
<br><br>
<div class="text-center">
    <h3>
    <a href="<?php echo $this->config->base_url(); ?>index.php/profil/changer_mdp_administrateur">Cliquez ici pour modifier votre mot de passe</a>
    </h3>
</div>
<br>

 <?php
 /*   
  value="<?php echo($result->NomFichierSource) ;?>"
  A mettre dans input du debut
*/
?>


