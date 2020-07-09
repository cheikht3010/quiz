<?php
    foreach($matchs as $match){
        $leCode = $match["match_code"];
    }
?>
<br>
<div class="text-center">
<h2>Le match <?php echo $leCode; ?> a bien été remis à zéro !</h2>
</div>
<br><br>
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

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Retour" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_raz_formateur')">
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


