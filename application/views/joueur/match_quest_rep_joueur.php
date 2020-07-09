<div class="text-center">
	<h2>Bonjour <?php echo $pseudo ?> vous pouvez maintenant participer au match <?php echo $matchs[0]['match_code'] ?> intitulé <?php echo $matchs[0]['match_intutile'] ?></h2>
	<br><br>
<br>
<?php echo validation_errors();?>
<?php echo form_open('match/valider_match_joueur'); ?>
<?php
    $cmp = 0;
    $affiche_code =0;
    $affiche=0;
    $id_ordre = 0;
    foreach($matchs as $matchs_la) {

        if($matchs_la["qst_ordre"] != $id_ordre)
        {
            $affiche=0;
        }

        if (!$affiche) {
            echo "<h3>Question ";
            echo $matchs_la["qst_ordre"];
            echo " : ";
            echo $matchs_la["qst_libelle"];
            echo "</h3>";
            $id_ordre= $matchs_la["qst_ordre"];
            $affiche=1; 
        }

        if ($matchs_la["qst_ordre"] == $id_ordre) {
            echo "<p>";
            $valeur=$matchs_la["rep_id"];
            echo '<input type="checkbox" name="rep[]" value="'.$valeur.'">';
            echo "<label>";
            echo $matchs_la["rep_libelle"];
            echo "</label>";
            echo "<p>";
        }
        else {
            $affiche=0;
            echo "<br/>";
        }
    }
?>
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
<br><br>