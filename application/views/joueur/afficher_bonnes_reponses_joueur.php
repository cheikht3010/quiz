<div class="text-center">
    <h2>Les bonnes réponses du match <?php echo $matchs[0]['match_code'] ?> intitulé <?php echo $matchs[0]['match_intutile'] ?> sont affichées en bleu</h2>
    <br><br>
<br>
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
            if($matchs_la["rep_valeur"]==1) {
                echo '<b>';
                echo '<p style="color:#0000FF;">';
                 echo $matchs_la["rep_libelle"];
                echo '</p>';
                echo '</b>';
            }
            else {
                echo "<p>";
                echo $matchs_la["rep_libelle"];
                echo "<p>";
            }
            
        }
        else {
            $affiche=0;
            echo "<br/>";
        }
    }
?>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Retour" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>')">
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>