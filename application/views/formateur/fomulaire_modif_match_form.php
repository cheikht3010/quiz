
<?php
	foreach($matchs as $match){
		$leCode = $match["match_code"];
		$lIntitule = $match["match_intutile"];
		$laSituation = $match["match_situation"];
        $leDebut = $match["match_date_debut"];
        $laFin = $match["match_date_fin"];
	}
?>
<div class="text-center">
<h2>Vous pouvez modifier les informations du match dans les champs ci-dessous</h2>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			<?php echo validation_errors();?>
            <?php echo form_open('matchs/update_match'); ?>
				<div class="row">
                	<div class="col-md-3">
                		<label for="code">Code du match</label>
                	</div>
                	<div class="col-md-9">
                		<input  readonly="readonly" type="text" class="form-control" id="code" name="code" value="<?php echo $leCode;?>">
                	</div>
                </div>
                <br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="intitule">Intitulé du match</label>
                	</div>
                	<div class="col-md-9">
                		<input type="text" class="form-control" id="intitule" name="intitule" required="required" value="<?php echo $lIntitule;?>">
                	</div>
                </div>
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
                        <input type="date" class="form-control" id="debut" name="debut" required="required"  value="<?php echo $leDebut;?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="fin">Fin du match</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="fin" name="fin" required="required" value="<?php echo $laFin;?>" min="<?php echo date('Y-m-d'); ?>">
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
                        <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Annuler" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_modifier_formateur')">
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


