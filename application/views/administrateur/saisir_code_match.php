<div class="text-center">
<h2>Veuillez saisir le code du match !</h2>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">

    		<?php echo validation_errors();?>
            <?php echo form_open('matchs/afficher_match'); ?>
            	
				<div class="row">
					<div class="col-md-3"></div>
                	<div class="col-md-3">
                		<center><label for="code">Code du match</label></center>
                	</div>
                	<div class="col-md-3">
                		<input type="text" class="form-control" placeholder="Code du match" name="code">
                	</div>
                	<div class="col-md-3"></div>
                </div>
                <br>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button value="validerCode" class="btn btn-primary btn-xl text-uppercase" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>