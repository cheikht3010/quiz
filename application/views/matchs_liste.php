<h1><?php echo $titre;?></h1>
<br />
<?php
	foreach($matchs as $match){
		echo "<br />";
		echo " -- ";
		echo $match["match_code"];
		echo " - ";
		echo $match["match_intutile"];
		echo " - ";
		echo $match["qst_id"];
		echo " - ";
		echo $match["qst_libelle"];
		echo " - ";
		echo $match["rep_id"];
		echo " - ";
		echo $match["rep_libelle"];
		echo " -- ";
		echo "<br />";
	}
?>