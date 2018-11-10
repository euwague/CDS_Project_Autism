<?php 

$username = $_GET['name'];
$age = $_GET['age'];

if(!empty($_POST["test_submit"]))
{

	$totalscore = 0;

	for ($i = 1; $i <= 10; $i++)
	{
   		$temp = "q".$i;
   		if(!isset($_POST[$temp]))
   		{
   			//$totalscore = $totalscore + 0;
   		}
   		else
   		{
   			$totalscore = $totalscore + $_POST[$temp];
   		}
	}

	if($totalscore >=0 && $totalscore <=5)
	{
		$result = "No Autism";
	}
	else if($totalscore >=6)
	{
		$result = "Yes Autism";
	}
	
	include "connect.php";
   	$sql = "UPDATE autism_test SET score='$totalscore', result='$result' WHERE name='$username' AND age='$age'";
   	$retval = mysqli_query($conn, $sql);

   	if(! $retval ) {
   		die('Could not get data: ' . mysqli_error($conn));
   	}

   	mysqli_close($conn);

   	header("Location: result.php?name=".$username."&age=".$age);
}
?>
<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Autis</title>
		<link rel="icon" href="images/logo.png" type="image/png">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="logo"><img src="images/logo.png" width="50px" height="50px" />&nbsp;autis</a>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Autism Test</h1>
						<p>Please answer these 10 screening questions sincerely.</p>
					</header>
					<div class="image fit">
						<img src="images/autism.png" alt="" />
					</div>

					<h2>Welcome, <?php echo $username; ?>!</h2>
					<p style="color: #f6755e;">Below are a list of statements. Please read each statement very carefully and rate how strongly you agree or disagree.</p>
					<form name="autism_test" method="post" action="#">
						<div class="row uniform">
							<div class="12u 12u$(xsmall)">
								<p>Q1. I often notice small sounds when others do not.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q1sa" name="q1" value="1" required>
								<label for="q1sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q1a" name="q1" value="1">
								<label for="q1a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q1d" name="q1" value="0">
								<label for="q1d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q1sd" name="q1" value="0">
								<label for="q1sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q2. I usually concentrate more on the whole picture, rather than the small details.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q2sa" name="q2" value="0" required>
								<label for="q2sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q2a" name="q2" value="0">
								<label for="q2a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q2d" name="q2" value="1">
								<label for="q2d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q2sd" name="q2" value="1">
								<label for="q2sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q3. I find it easy to do more than one thing at once.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q3sa" name="q3" value="0" required>
								<label for="q3sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q3a" name="q3" value="0">
								<label for="q3a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q3d" name="q3" value="1">
								<label for="q3d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q3sd" name="q3" value="1">
								<label for="q3sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q4. If there is an interruption, I can switch back to what I was doing very quickly.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q4sa" name="q4" value="0" required>
								<label for="q4sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q4a" name="q4" value="0">
								<label for="q4a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q4d" name="q4" value="1">
								<label for="q4d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q4sd" name="q4" value="1">
								<label for="q4sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q5. I find it easy to ‘read between the lines’ when someone is talking to me.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q5sa" name="q5" value="0" required>
								<label for="q5sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q5a" name="q5" value="0">
								<label for="q5a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q5d" name="q5" value="1">
								<label for="q5d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q5sd" name="q5" value="1">
								<label for="q5sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q6. I know how to tell if someone listening to me is getting bored.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q6sa" name="q6" value="0" required>
								<label for="q6sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q6a" name="q6" value="0">
								<label for="q6a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q6d" name="q6" value="1">
								<label for="q6d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q6sd" name="q6" value="1">
								<label for="q6sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q7. When I’m reading a story, I find it difficult to work out the characters’ intentions.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q7sa" name="q7" value="1" required>
								<label for="q7sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q7a" name="q7" value="1">
								<label for="q7a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q7d" name="q7" value="0">
								<label for="q7d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q7sd" name="q7" value="0">
								<label for="q7sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q8. I like to collect information about categories of things (e.g. types of car, types of bird, types of train, types of plant, etc).</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q8sa" name="q8" value="1" required>
								<label for="q8sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q8a" name="q8" value="1">
								<label for="q8a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q8d" name="q8" value="0">
								<label for="q8d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q8sd" name="q8" value="0">
								<label for="q8sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q9. I find it easy to work out what someone is thinking or feeling just by looking at their face.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q9sa" name="q9" value="0" required>
								<label for="q9sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q9a" name="q9" value="0">
								<label for="q9a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q9d" name="q9" value="1">
								<label for="q9d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q9sd" name="q9" value="1">
								<label for="q9sd">Strongly Disagree</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q10. I find it difficult to work out people’s intentions.</p>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q10sa" name="q10" value="1" required>
								<label for="q10sa">Strongly Agree</label>
							</div>
							<div class="3u 12u$(small)">
								<input type="radio" id="q10a" name="q10" value="1">
								<label for="q10a">Agree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q10d" name="q10" value="0">
								<label for="q10d">Disagree</label>
							</div>
							<div class="3u$ 12u$(small)">
								<input type="radio" id="q10sd" name="q10" value="0">
								<label for="q10sd">Strongly Disagree</label>
							</div>

							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" name="test_submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
							</div>

						</div>
					</form>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h2>Get In Touch with YOUR organizations</h2>
					<ul class="actions">
						<li><span class="icon fa-external-link"></span> <a target="_blank" href="https://autismcanada.org/">Autism Society Canada</a></li>
						<li><span class="icon fa-external-link"></span> <a target="_blank" href="https://www.autismspeaks.ca/">AutismSpeaks Canada</a></li>
						<li><span class="icon fa-external-link"></span> <a target="_blank" href="https://www.cdc.gov/ncbddd/autism/index.html">CDC Autism</a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Autis - Autism Test System 2018.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>