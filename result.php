<?php 

$username = $_GET['name'];
$age = $_GET['age'];
$print_help = 0;

include "connect.php";
$sql = "SELECT gender, prevautism, score, result FROM autism_test WHERE name='$username' AND age='$age'";
$retval = mysqli_query($conn, $sql);

if(! $retval ) {
	die('Could not get data: ' . mysqli_error($conn));
}

while($row = mysqli_fetch_assoc($retval))
{
	$totalscore = $row['score'];
	$result = $row['result'];
	$gender = $row['gender'];
	$prevautism = $row['prevautism'];
}

mysqli_close($conn);

$fage = fopen('demoage.txt', 'a');
fwrite($fage, $age."\r\n");
fclose($fage);

$fscore = fopen('demoscore.txt', 'a');
fwrite($fscore, $totalscore."\r\n");
fclose($fscore);

$fgen = fopen('demogen.txt', 'a');
if($gender == 'f')
{
	$gen = 0;
	
}
else
{
	$gen = 1;	
}
fwrite($fgen, $gen."\r\n");
fclose($fgen);

$fpre = fopen('demopre.txt', 'a');
if($prevautism == 'no')
{
	$prev = 0;
}
else
{
	$prev = 1;	
}
fwrite($fpre, $prev."\r\n");
fclose($fpre);

$fres = fopen('demores.txt', 'a');
if($result == 'No Autism')
{
	$res = 0;
}
else
{
	$res = 1;	
}
fwrite($fres, $res."\r\n");
fclose($fres);



if($age >= 0 && $age <= 3)
{
	//AUTISM TODDLER SCORE
	$maxscore = 20;
	$pscore = ($totalscore/$maxscore)*100;
	$nscore = 100 - $pscore;

	if($result == "No Autism")
	{
		$message = "Result of Autism Test - Negative.";
		$detail_message = "Your child probably does not have autism according to your given answers. Since autism has various types and levels, it can be more complex and an online questionnaire or screening tool in a non-clinical setting might be insufficient to evaluate whether your child might be having autism or not. Although the results of this online test are negative, we RECOMMEND you to consult your child to your family physician or a registered doctor to test for autism in a clinical setting. Please Note: If your child is younger than 24 months, we suggest you to screen again after second birthday.";
	}
	else if($result == "Yes Autism")
	{
		$message = "Result of Autism Test - Positive.";
		$detail_message = "Your child probably might have autism according to your given answers. Since autism has various types and levels, it can be more complex and this complexity of the disorder cannot be evaluated from an online questionnaire or screening tool in a non-clinical setting. Thus, we RECOMMEND you to consult your child to your family physician or a registered doctor to test for autism in a clinical setting and understand about its level and complexity in a better way.";
		$print_help = 1;
	}
}
else if($age >= 4 && $age <= 12)
{
	//AUTISM CHILD SCORE
	$maxscore = 31;
	$pscore = ($totalscore/$maxscore)*100;
	$nscore = 100 - $pscore;

	if($result == "No Autism")
	{
		$message = "Result of Autism Test - Negative.";
		$detail_message = "Your child probably does not have autism according to your given answers. Since autism has various types and levels, it can be more complex and an online questionnaire or screening tool in a non-clinical setting might be insufficient to evaluate whether your child might be having autism or not. Although the results of this online test are negative, we RECOMMEND you to consult your child to your family physician or a registered doctor to test for autism in a clinical setting.";
	}
	else if($result == "Yes Autism")
	{
		$message = "Result of Autism Test - Positive.";
		$detail_message = "Your child probably might have autism according to your given answers. Since autism has various types and levels, it can be more complex and this complexity of the disorder cannot be evaluated from an online questionnaire or screening tool in a non-clinical setting. Thus, we RECOMMEND you to consult your child to your family physician or a registered doctor to test for autism in a clinical setting and understand about its level and complexity in a better way.";
		$print_help = 1;
	}
}
else if($age >= 12)
{

	//EXEC PY SCRIPT
	exec("python naivebayesdata.py");
	
	//AUTISM SCORE
	$maxscore = 10;
	$pscore = ($totalscore/$maxscore)*100;
	$nscore = 100 - $pscore;

	if($result == "No Autism")
	{
		$message = "Result of Autism Test - Negative.";
		$detail_message = "You probably do not have autism according to your given answers. Since autism has various types and levels, it can be more complex and an online questionnaire or screening tool in a non-clinical setting might be insufficient to evaluate whether you have autism or not. Although the results of this online test are negative, we RECOMMEND you to consult your family physician or a registered doctor to test for autism in a clinical setting.";
	}
	else if($result == "Yes Autism")
	{
		$message = "Result of Autism Test - Positive.";
		$detail_message = "You probably might have autism according to your given answers. Since autism has various types and levels, it can be more complex and this complexity of the disorder cannot be evaluated from an online questionnaire or screening tool in a non-clinical setting. Thus, we RECOMMEND you to consult your family physician or a registered doctor to test for autism in a clinical setting and understand about its level and complexity in a better way.";
		$print_help = 1;
	}
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

		<!-- Plotly.js -->
		  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
		 <!-- Numeric JS -->
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.min.js"></script>
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
						<h1>Autism Result</h1>
						<p>Let's see what scores have you got!</p>
					</header>
					<div class="image fit">
						<img src="images/result.jpg" alt="" />
					</div>

					<h2>Hey <?php echo $username; ?>,</h2>
					<h2>You have scored <?php echo $totalscore;?>.</h2>
					<br>
					<h3 style="color: #f6755e; text-align: center;"><?php echo $message; ?></h3>

					<div class="12u 12u$(xsmall)">
						<div style="overflow: hidden;">
							<div id="resultchart" style="margin-top: -50px;"></div>
						</div>
					</div>
					<h4><?php echo $detail_message; ?></h4>
					<div id="printhelp"></div>
				</div>

				<div>
					<ul class="actions" style="text-align: center;">
						<li><a href="statistics.php" class="button special big">Show Statistics</a></li>
					</ul>
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

			<script type="text/javascript">
				var p1 = <?php echo json_decode($pscore); ?>;
				var n1 = <?php echo json_decode($nscore); ?>;
				var help = <?php echo json_decode($print_help); ?>;

				var resdata = [{
					values: [p1, n1],
					labels: ['Autism Positive','Autism Negative'],
					type: 'pie'
				}];

				Plotly.newPlot('resultchart', resdata);

				if(help == 1)
				{
					document.getElementById('printhelp').innerHTML += "<br><h4>Here are some Autism Organizations links which might help you : </h4><br><a target='_blank' href='https://www.autismspeaks.ca/about-us/contact-us/'><h4>AutismSpeaks Canada</h4></a><br><a target='_blank' href='https://autismcanada.org/about-us/contact-us/'><h4>Autism Canada</h4></a><br><a target='_blank' href='http://www.autismontario.com/client/aso/ao.nsf/web/Contact+Us?OpenDocument'><h4>Autism Ontario</h4></a><br><a target='_blank' href='https://www.autism.net/about-us/contact-us.html'><h4>Geneva Center for Autism</h4></a>";
				}
			</script>

	</body>
</html>