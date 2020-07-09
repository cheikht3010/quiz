<div class="text-center">
<h2>Veuillez saisir le code du match !</h2>
</div>
<br><br>
<div class="text-center">
<h6>Saisir un code de match de 8 caractères alphanumériques</h6>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">

    		<?php echo validation_errors();?>
            <?php echo form_open('match/afficher_saisir_pseudo_joueur'); ?>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <center><label for="code" >Code du match</label></center>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" pattern="[a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9]" placeholder="Code  du match" required="required" name="code" data-validation-required-message="Veuillez entrer un code de match.">
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
                        <button value="validerCode" class="btn btn-primary btn-xl text-uppercase" type="submit">Valider</button>
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