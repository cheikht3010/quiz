<div class="text-center">
    <h2>Fin du match <?php echo $codeMatch ?></h2>
</div>
    <br><br>
<div class="text-center">
    <h2><?php echo $pseudo ?> votre score pour ce match est de <?php foreach ($score as $s) {echo $s;} ?> point(s) soit un taux de réussite de <?php echo $pourcentage ?>%</h2>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <?php echo validation_errors();?>
            <?php echo form_open('match/afficher_bonnes_reponses'); ?>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <div class="row">
                    <div class="col-md-6">
                        <button value="validerCode" class="btn btn-primary btn-xl text-uppercase" type="submit">Voir les bonnes reponses</button>
                    </div>
                    <div class="col-md-6">
                        <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Retour à la page d'accueil" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>')">
                    </div>
                   </div> 
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>