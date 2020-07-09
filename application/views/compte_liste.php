<h1><?php echo $titre;?></h1>
<br />
<?php
	foreach($pseudos as $login){
		echo "<br />";
		echo " -- ";
		echo $login["cpt_pseudo"];
		echo " -- ";
		echo "<br />";
	}
?>