<br><br>
<div class="text-center">
	<h4>Le score global pour le match <?php echo $codeMatch; ?> est de 
	<?php 
		$leScore =0;
		$score_total_max = 0;
		foreach($score as $unScore){
			$leScore+=$unScore["jou_score"];
			$score_total_max += $score_max;
		}
		if ($score_max == 0) {
			$score_max = 1;
		}
		if ($score_total_max == 0) {
			$score_total_max = $score_max;
		}
	echo $leScore; ?> point(s) avec un pourcentae de reussite de 
	<?php
		$pourcentage = ($leScore/$score_total_max)*100;
		echo number_format($pourcentage,2);
	?>%
</h4>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input type="button" class="btn btn-primary btn-xl text-uppercase" value="Retour" onclick="window.location.replace('<?php echo $this->config->base_url(); ?>index.php/matchs/code_match_pour_formateur')">
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>