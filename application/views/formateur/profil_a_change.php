<div class="text-center">
<h2><?php echo $_SESSION['username']; ?>, votre profil a été modifié avec succés !</h2>
</div>
<br><br>

<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			<form class="justify-content-center">
				<div class="row">
                	<div class="col-md-3">
                		<label for="pseudo">Votre pseudo</label>
                	</div>
                	<div class="col-md-9">
                		<input readonly="readonly" type="text" class="form-control" id="pseudo" value="<?php echo $_SESSION['username'];?>">
                	</div>
                </div>
                <br><br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="prenom">Votre prénom</label>
                	</div>
                	<div class="col-md-9">
                		<input readonly="readonly" type="text" class="form-control" id="prenom" value="<?php echo $prenom;?>">
                	</div>
                </div>
                <br><br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="nom">Votre nom</label>
                	</div>
                	<div class="col-md-9">
                		<input readonly="readonly" type="text" class="form-control" id="nom" value="<?php echo $nom;?>">
                	</div>
                </div>
            </form>
        </div>
    </div>
</div>

<br><br>