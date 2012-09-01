<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>HTML5 boilerplate—all you really need…</title>
	<link rel="stylesheet" type="text/css" href="resources/styles/boilerplate.css" />
	<link rel="stylesheet" type="text/css" href="resources/styles/style.css" />
	<script src="resources/js/AltiCalcDraw.js"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body id="home">
<section class="toplevel" id="alt-calc">
	<hgroup class="title">
		<h1>Rocket Altitude Calculator</h1>
		<h2>A quick and dirty altitude calculator for three Alti Traks</h2>
	</hgroup>
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
	<div style="clear:both"></div>
</section>
</body>
</html>
