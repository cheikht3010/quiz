<div class="text-center">
	<h2><?php echo $titre ?></h2>
	<br><br>
</div>

<?php
	echo "<center>";
	echo "<table align = \"center\" class= \" table-bordered\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th scope=\"col\"> <center> Prénoms </center> </th>";
	echo "<th scope=\"col\"> <center>  Noms </center> </th>";
	echo "<th scope=\"col\"> <center> Types de compte </center> </th>";
	echo "<th scope=\"col\"> <center> Actifs / Inactifs </center> </th>";
	echo "<th scope=\"col\"> <center> Pseudos </center> </th>";
	echo "</tr>";
	foreach($comptes as $compte){
		echo "<tr>";
		echo "<td> <center>"; echo $compte["cpt_prenom"]; echo "</center> </td>";
		echo "<td> <center>"; echo $compte["cpt_nom"]; echo "</center> </td>";
		echo "<td> <center>"; echo $compte["cpt_type"]; echo "</center> </td>";
		echo "<td> <center>"; echo $compte["cpt_actif"]; echo "</center> </td>";
		echo "<td> <center>"; echo $compte["cpt_pseudo"]; echo "</center> </td>";
		echo "</tr>";
		}
	echo "</table>";
	echo "</center>";
?>
<br>
<div class="text-center">
<?php
	foreach ($nb_form as $nb) {
		echo "<h5>";
		echo "Le nombre de formareur pour l'application Quiz Histoire est ";
		echo $nb["nombre"];
		 echo ".";
		echo "</h5>";
	}
?>
</div>
<br><br>