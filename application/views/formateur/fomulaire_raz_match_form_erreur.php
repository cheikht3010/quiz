<?php
    foreach($matchs as $match){
        $leCode = $match["match_code"];
        $laSituation = $match["match_situation"];
    }
?>
<div class="text-center">
<h2>Les données du match <?php echo $leCode; ?></h2>
</div>
<br>
<?php
    echo "<center>";
    echo "<table align = \"center\" class= \" table-bordered\">";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope=\"col\"> <center> Intitulé du match </center> </th>";
    echo "<th scope=\"col\"> <center>  Code du match </center> </th>";
    echo "<th scope=\"col\"> <center>  Situation du match </center> </th>";
    echo "<th scope=\"col\"> <center>  Identifiant quiz </center> </th>";
    echo "<th scope=\"col\"> <center>  Date de début </center> </th>";
    echo "<th scope=\"col\"> <center>  Date de fin </center> </th>";
    echo "</tr>";
    foreach($matchs as $match){
        echo "<tr>";
        echo "<td> <center>"; echo $match["match_intutile"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_code"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_situation"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["quiz_id"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_date_debut"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_date_fin"]; echo "</center> </td>";
        echo "</tr>";
        }
    echo "</table>";
    echo "</center>";
?>
<br><br>

<div class="text-center">
<h2>Les joueurs du match <?php echo $leCode; ?></h2>
</div>
<br>
<?php
    echo "<center>";
    echo "<table align = \"center\" class= \" table-bordered\">";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope=\"col\"> <center> Identifiants des joueurs </center> </th>";
    echo "<th scope=\"col\"> <center>  Pseudos des joueurs </center> </th>";
    echo "<th scope=\"col\"> <center>  Scores </center> </th>";
    echo "<th scope=\"col\"> <center>  Identifiant du match </center> </th>";
    echo "</tr>";
    foreach($joueurs as $joueur){
        echo "<tr>";
        echo "<td> <center>"; echo $joueur["jou_id"]; echo "</center> </td>";
        echo "<td> <center>"; echo $joueur["jou_pseudo"]; echo "</center> </td>";
        echo "<td> <center>"; echo $joueur["jou_score"]; echo "</center> </td>";
        echo "<td> <center>"; echo $joueur["match_id"]; echo "</center> </td>";
        echo "</tr>";
        }
    echo "</table>";
    echo "</center>";
?>
<br><br>

<div class="text-center">
<h4>Veuillez modifier les dates de debut et de fin avant de remettre à zéro</h4>
</div>
<br><br>
<div class="text-center">
<h4> <?php echo $erreur; ?> </h4>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			<?php echo validation_errors();?>
            <?php echo form_open('matchs/raz_match'); ?>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="situation">Situation du match <?php if(($laSituation != "A")&&($laSituation != "D")) echo " (Désactivé par Administrateur)"; ?></label>
                    </div>
                    <div class="col-md-9">
                        
                        <select id="situation" name="situation" required="required">
                            <?php
                                if($laSituation == "A"){
                                    echo "<option value=\"A\">";
                                        echo "Activer";
                                    echo "</option>";
                                    echo "<option value=\"D\">";
                                        echo "Désactiver";
                                    echo "</option>";
                                }
                                else if ($laSituation == "D"){
                                    echo "<option value=\"D\">";
                                        echo "Désactiver";
                                    echo "</option>";
                                    echo "<option value=\"A\">";
                                        echo "Activer";
                                    echo "</option>";
                                }
                                else {
                                    echo "<option value=\"X\">";
                                        echo "Désactiver";
                                    echo "</option>";
                                }
                                    
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="debut">Début du match</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="debut" name="debut" required="required" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="fin">Fin du match</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="fin" name="fin" required="required" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <dir class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                      <button value="validerModifMatch" class="btn btn-primary btn-xl text-uppercase" type="submit">Valider</button>
                    </div>
                    <div class="col-md-3">
                        <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Annuler" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_raz_formateur')">
                    </div>
                    <div class="col-md-3"></div>
                  </dir>
                </div>

            </form>
        </div>
    </div>
</div>

<br><br>

<br>

 <?php
 /*   
  value="<?php echo($result->NomFichierSource) ;?>"
  A mettre dans input du debut
*/
?>


