
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
<h2><?php echo $reussite ?></h2>
</div>
<br><br>
<div class="container">
	<div class="row">
    	<div class="col-lg-12">
			<form>
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
                		<input readonly="readonly" type="text" class="form-control" id="intitule" name="intitule" value="<?php echo $lIntitule;?>">
                	</div>
                </div>
                <br>
                <div class="row">
                	<div class="col-md-3">
                		<label for="situation">Situation du match</label>
                	</div>
                	<div class="col-md-9">
                        <input readonly="readonly" type="text" class="form-control" id="situation" name="situation" value = <?php if($laSituation == "A") echo "Actif"; else echo "Inactif";?> >
                	</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="debut">Début du match</label>
                    </div>
                    <div class="col-md-9">
                        <input readonly="readonly" type="date" class="form-control" id="debut" name="debut" value="<?php echo $leDebut;?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="fin">Fin du match</label>
                    </div>
                    <div class="col-md-9">
                        <input readonly="readonly" type="date" class="form-control" id="fin" name="fin" value="<?php echo $laFin;?>">
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Retour" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_modifier_formateur')">
                </div>
            </form>
        </div>
    </div>
</div>
<br>

 <?php
 /*   
  value="<?php echo($result->NomFichierSource) ;?>"
  A mettre dans input du debut
*/
?>


