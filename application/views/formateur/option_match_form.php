<br><br>
<div class="text-center">
<h2>Liste des quiz actifs et leur(s) match(s) associé(s)</h2>
</div>
<br>
<?php
    echo "<center>";
    echo "<table align = \"center\" class= \" table-bordered\">";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope=\"col\"> <center> Identifiant quiz </center> </th>";
    echo "<th scope=\"col\"> <center> Intitulé du quiz </center> </th>";
    echo "<th scope=\"col\"> <center> Auteur du quiz </center> </th>";
    echo "<th scope=\"col\"> <center>  Code du match </center> </th>";
    echo "<th scope=\"col\"> <center> Intitulé du match </center> </th>";
    echo "<th scope=\"col\"> <center> Auteur du match </center> </th>";
    echo "</tr>";
    foreach($matchs as $match){
        echo "<tr>";
        echo "<td> <center>"; echo $match["quiz_id"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["quiz_intitule"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["auteur_quiz"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_code"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["match_intutile"]; echo "</center> </td>";
        echo "<td> <center>"; echo $match["auteur_match"]; echo "</center> </td>";
        echo "</tr>";
        }
    echo "</table>";
    echo "</center>";
?>
<br><br>
<div class="text-center">
<h2>Veuillez choisir une option !</h2>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_formateur">Cliquez ici pour visuliser les données d'un match</a>
    </h3>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_creer_formateur">Cliquez ici pour créer un match</a>
    </h3>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_modifier_formateur">Cliquez ici pour modifier les données d'un match</a>
    </h3>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_raz_formateur">Cliquez ici pour remettre à zéro un match</a>
    </h3>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_supprimer_formateur">Cliquez ici pour supprimer un match</a>
    </h3>
</div>
<br>