<div class="text-center">
<h2>Bonjour <?php echo $_SESSION['username']; ?>, vous souhaitez modifier votre mot de passe. Veuillez remplir les champs ci-dessous puis validez !</h2>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			
                <?php echo validation_errors();?>
                <?php echo form_open('profil/changer_mdp_administrateur'); ?>
				<div class="row">
                	<div class="col-md-3">
                		<label for="oldPwd">Ancien</label>
                	</div>
                	<div class="col-md-9">
                		<input type="password" class="form-control" required="required" name="oldPwd" placeholder="Tapez votre ancien mot de passe">
                	</div>
                </div>
                <br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="newPwd">Nouveau</label>
                	</div>
                	<div class="col-md-9">
                		<input type="password" class="form-control" required="required" name="newPwd" placeholder="Tapez votre nouveau mot de passe">
                	</div>
                </div>
                <br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="confPwd">Confiration</label>
                	</div>
                	<div class="col-md-9">
                		<input type="password" class="form-control" required="required" name="confPwd" placeholder="Confirmez votre nouveau mot de passe">
                	</div>
                </div>
                <br>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <button value="updatePasswordButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Modifier</button>
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