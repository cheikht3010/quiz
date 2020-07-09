<div class="text-center">
<h2>Les matchs</h2>
</div>
<br><br>
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
    echo "<th scope=\"col\"> <center>  Auteur du match </center> </th>";
    echo "</tr>";
    foreach($matchs as $match){
        echo "<tr>";
        echo "<td> <center>"; echo $match["match_intutile"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_code"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_situation"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["quiz_id"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_date_debut"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_date_fin"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["cpt_pseudo"]; echo "</center> </td>";
        echo "</tr>";
        }
    echo "</table>";
    echo "</center>";
?>

<br><br>

<div class="text-center">
<h4>Veuillez saisir le code du match pour le remettre à zéro</h4>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <?php echo validation_errors();?>
            <?php echo form_open('matchs/zero_match'); ?>
                
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <center><label for="code">Code du match</label></center>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" pattern="[a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9]" placeholder="Code du match" name="code">
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <br>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <dir class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                      <button value="validerCode" class="btn btn-primary btn-xl text-uppercase" type="submit">Valider</button>
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