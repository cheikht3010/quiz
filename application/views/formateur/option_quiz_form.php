<br>
<div class="text-center">
<h2>LES QUIZ</h2>
</div>
<br>
        <?php
          echo "<table class= \"table-responsive table-bordered\">";
          echo "<thead>";
          echo "<tr>";
          echo "<th scope=\"col\"> <center> Identifiant quiz</center> </th>";
          echo "<th scope=\"col\"> <center> Intitulé du quiz </center> </th>";
          echo "<th scope=\"col\"> <center> Description du quiz </center> </th>";
          echo "<th scope=\"col\"> <center> Auteur du quiz </center> </th>";
          echo "</tr>";
          foreach($quiz_s as $quiz){
            echo "<tr>";
            echo "<td> <center>"; echo $quiz["quiz_id"]; echo "</center> </td>";
            echo "<td> <center>"; echo $quiz["quiz_intitule"]; echo "</center> </td>";
            echo "<td> <center>"; echo $quiz["quiz_description"]; echo "</center> </td>";
            echo "<td> <center>"; echo $quiz["cpt_pseudo"]; echo "</center> </td>";
            echo "</tr>";
          }
          echo "</table>";
        ?>
<br><br>
<!--div class="text-center">
<h2>Veuillez choisir une option pour gerer les quiz !</h2>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php //echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_formateur">Cliquez ici pour visuliser les données d'un quiz</a>
    </h3>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php //echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_creer_formateur">Cliquez ici pour créer un quiz</a>
    </h3>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php //echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_modifier_formateur">Cliquez ici pour modifier les données d'un quiz</a>
    </h3>
</div>
<br>
<div class="text-center">
    <h3>
    <a href="<?php //echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_supprimer_formateur">Cliquez ici pour supprimer un quiz</a>
    </h3>
</div-->
<br>