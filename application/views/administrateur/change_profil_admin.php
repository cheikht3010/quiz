<div class="text-center">
<h2>Bonjour <?php echo $_SESSION['username']; ?>, vous souhaitez modifier votre profil. Veuillez remplir les champs ci-dessous puis validez !</h2>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			
                <?php echo validation_errors();?>
                <?php echo form_open('profil/changer_profil_administrateur'); ?>
				<div class="row">
                	<div class="col-md-3">
                		<label for="prenom">Prénom</label>
                	</div>
                	<div class="col-md-9">
                		<input type="text" class="form-control" required="required" name="prenom" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-']+" placeholder="Tapez votre prénom">
                	</div>
                </div>
                <br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="nom">Nom</label>
                	</div>
                	<div class="col-md-9">
                		<input type="text" class="form-control" required="required" name="nom" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-']+" placeholder="Tapez votre nom">
                	</div>
                </div>
                <br>
                <br>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <button value="updateProfilButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Modifier</button>
                        </div>
                        <div class="col-md-3">
                            <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Annuler" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/profil/lister_administrateur')">
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<br><br>