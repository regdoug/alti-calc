<?php require_once 'content/header.html.php'; ?>

	<h2>Calculation Results</h2>
	<div class="answerbox">
		<span class="answer"><?php print round($solver->z_ft); ?></span>&nbsp;ft
	</div>
	
<?php if ($solver->ok()): ?>
	<canvas id="conecanvas" width='500' height='300'></canvas>
	<script>
		drawCones($('#conecanvas').get(0),<?php print "$solver->d,$solver->r1,$solver->r2,$solver->r3";?>);
	</script>
<?php else: ?>
	<p>Error: <?php print $solver->message; ?></p>
<?php endif; ?>

<?php require_once 'content/footer.html.php'; ?>
