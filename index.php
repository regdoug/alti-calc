<?php require_once 'content/header.html.php'; ?>
	
	<section class="about">
	<h1>About this Calculator</h1>
	Read about the theory of this calculator <a href="theory.php">here.</a>
	
	<h2>Measurement Requirements</h2>
	You need three trackers with an Alti Trak each (or protractors w/ string)
	arranged in a straight line with equal distances between each.  See
	the schematic below:
	<div class="image center">
		<img alt="Arrangement of trackers" src="resources/img/trackers.png">
	</div>
	</section>
	
	<section class="main">
	<h1>Calculator</h1>
	<h2>Data Input</h2>
	<form action="calculate.php" method="post" id="alticalc-form">
		<table class="dataentry">
			<tr class="row-odd">
			<td><label for="in-distance"class="label-required">Distance Between Trackers</label></td>
			<td><input id="in-distance" name="distance" type="number" min="100" required></td>
			</tr>
			<tr class="row-even">
			<td><label for="in-ang-one"class="label-required">Angle 1</label></td>
			<td><input id="in-ang-one" name="angle-one" type="number" min="1" max="90" required></td>
			</tr>
			<tr class="row-odd">
			<td><label for="in-ang-two" class="label-required">Angle 2</label></td>
			<td><input id="in-ang-two" name="angle-two" type="number" min="1" max="90" required></td>
			</tr>
			<tr class="row-even">
			<td><label for="in-ang-three"class="label-required">Angle 3</label></td>
			<td><input id="in-ang-three" name="angle-three" type="number" min="1" max="90" required></td>
			</tr>
			<tr class="row-odd">
			<td><label for="guess-lo" class="label-opt">Low Guess</label></td>
			<td><input id="guess-lo" name="guess-lo" type="number" min="1"></td>
			</tr>
			<tr class="row-even">
			<td><label for="guess-hi" class="label-opt">High Guess</label></td>
			<td><input id="guess-hi" name="guess-hi" type="number" min="2"></td>
			</tr>
		</table>
		<input type="hidden" name="type" value="json">
		<input type="submit" class="submit">
		<div class="error entryerror">
			Please fill out all the fields with appropriate numbers.
		</div>
		<div class="error servererror">
			Sorry.  An error occurred and the result could not be fetched.
		</div>
		<div class="warning formwarning">
			Warning:
		</div>
	</form>
	<div class="results">
		<h2>Results</h2>
		<div class="answerbox">
			<span class="answer">-</span>&nbsp;ft
		</div>
		<canvas class="cones" width='500' height='300'></canvas>
	</div>
	</section>

<?php require_once 'content/footer.html.php'; ?>
