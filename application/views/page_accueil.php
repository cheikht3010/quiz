    <section id="actualites">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Liste des actualités</h2>
          </div>
        </div>
        <br><br>
        <?php
          echo "<table class= \"table-responsive table-bordered\">";
          echo "<thead>";
          echo "<tr>";
          echo "<th scope=\"col\"> <center> Intitulé </center> </th>";
          echo "<th scope=\"col\"> <center> Détail de l'actualité </center> </th>";
          echo "<th scope=\"col\"> <center> Date début </center> </th>";
          echo "<th scope=\"col\"> <center> Date de fin </center> </th>";
          echo "<th scope=\"col\"> <center> Auteur </center> </th>";
          echo "</tr>";
          foreach($actus as $news){
            echo "<tr>";
            echo "<td> <center>"; echo $news["act_intitule"]; echo "</center> </td>";
            echo "<td> <center>"; echo $news["act_description"]; echo "</center> </td>";
            echo "<td> <center>"; echo $news["act_date_debut"]; echo "</center> </td>";
            echo "<td> <center>"; echo $news["act_date_fin"]; echo "</center> </td>";
            echo "<td> <center>"; echo $news["cpt_pseudo"]; echo "</center> </td>";
            echo "</tr>";
          }
          echo "</table>";
        ?>
      </div>
    </section>