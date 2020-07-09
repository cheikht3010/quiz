<div class="text-center">
<br>
<h2>Tous les quiz et leur(s) match(s) associés</h2>
</div>
<br>
<?php
	echo "<center>";
    echo "<table align = \"center\" class= \" table-bordered\">";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope=\"col\"> <center>  Identifiant quiz </center> </th>";
    echo "<th scope=\"col\"> <center>  Intitulé du quiz </center> </th>";
    echo "<th scope=\"col\"> <center>  Description du quiz </center> </th>";
    echo "<th scope=\"col\"> <center>  Code du match </center> </th>";
    echo "<th scope=\"col\"> <center>  Intitulé du match </center> </th>";
    echo "</tr>";
    foreach($quiz_matchs as $quiz_match){
        echo "<tr>";
        echo "<td> <center>"; echo $quiz_match["quiz_id"]; echo "</center> </td>";
        echo "<td> <center>"; echo $quiz_match["quiz_intitule"]; echo "</center> </td>";
        echo "<td> <center>"; echo $quiz_match["quiz_description"]; echo "</center> </td>";
        echo "<td> <center>"; echo $quiz_match["match_code"]; echo "</center> </td>";
        echo "<td> <center>"; echo $quiz_match["match_intutile"]; echo "</center> </td>";
        echo "</tr>";
        }
    echo "</table>";
    echo "</center>";
?>
<br><br>
<div class="text-center">
<h2>Vous pouvez rentrer les informations du match à créer</h2>
</div>
<br><br>
<div class="text-center">
<h4>Quiz incomplet, à finir !</h4>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			<?php echo validation_errors();?>
            <?php echo form_open('matchs/creer_match'); ?>
                <div class="row">
                	<div class="col-md-3">
                		<label for="intitule">Intitulé du match</label>
                	</div>
                	<div class="col-md-9">
                		<input type="text" class="form-control" id="intitule" name="intitule" required="required" placeholder="Saisir l'intitulé du match">
                	</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="quiz">Quiz du match</label>
                    </div>
                    <div class="col-md-9">

                        <select id="quiz" name="quiz" required="required">
                            <?php foreach ($quiz_s as $quiz) {
                                echo "<option value=\" ".$quiz["quiz_id"]." \">";
                                echo $quiz["quiz_id"]." - ".$quiz["quiz_intitule"];
                                echo "</option>";
                            } ?>
                            
                            <!--option value="A">Activer</option-->
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="situation">Situation du match</label>
                	</div>
                	<div class="col-md-9">
                        <select id="situation" name="situation" required="required">
                            <option value="D">Désactiver</option>
                            <option value="A">Activer</option>
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
                        <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Annuler" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/matchs/option_match_pour_formateur')">
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


