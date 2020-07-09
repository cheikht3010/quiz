<div class="text-center">
<h2>Veuillez saisir un pseudo de joueur !</h2>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">

    		<?php echo validation_errors();?>
            <?php echo form_open('match/afficher_match_joueur'); ?>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <center><label for="pseudo" >Pseudo du joueur</label></center>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" pattern="[a-zA-Z0-9]+" placeholder="Pseudo du joueur" required="required" name="pseudo" data-validation-required-message="Veuillez entrer un pseudo de joueur.">
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <br>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <button value="validerPseudo" class="btn btn-primary btn-xl text-uppercase" type="submit">Valider</button>
                    </div>
                    <div class="col-md-3">
                        <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Annuler" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>')">
                    </div>
                    <div class="col-md-3"></div>
                   </div> 
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>