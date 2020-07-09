<div class="text-center">
<h2>Suppression du match <?php echo $leMatch; ?> s'est réalisée avec succés !</h2>
</div>
<br><br>

<div class="text-center">
<h4>Les matchs</h4>
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
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Retour" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_supprimer_formateur')">
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>