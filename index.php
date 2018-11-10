<?php 

if(!empty($_POST["details_user"]))
{

	$username = $_POST['username'];
	$age = $_POST['age'];

	include "connect.php";
   	$sql = "INSERT INTO autism_test ". "(name,age) ". "VALUES('$username','$age')";
   	$retval = mysqli_query($conn, $sql);

   	if(! $retval ) {
   		die('Could not get data: ' . mysqli_error($conn));
   	}

   	mysqli_close($conn);

   	if($age >= 0 && $age <= 3)
   	{
   		header("Location: autism_toddler.php?name=".$username."&age=".$age); //AUTISM TODDLER
   	}
   	else if($age >= 4 && $age <= 12)
   	{
   		header("Location: autism_child.php?name=".$username."&age=".$age); //AUTISM CHILD
   	}
   	else if($age >= 13)
   	{
   		header("Location: autism.php?name=".$username."&age=".$age); //AUTISM >= TEEN
   	}
   	else
   	{
   		//ERROR IN AGE
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
		<style type="text/css">
			#stats {
    			display: block;
    			margin-left: auto;
    			margin-right: auto;
				}
			#titletext {
				color: #ad220a;
				font-weight: bold;
				padding-left: 40px;
				padding-right: 40px;
			}
		</style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="logo"><img src="images/logo.png" width="50px" height="50px" />&nbsp;autis</a>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="content">
					<h1>Why fit in when YOU were born to stand out ?</h1>
					<p id="titletext">About <strong style="color: #f6755e;">1 in 59 children</strong> has been identified with autism spectrum disorder (ASD) according to estimates from CDC’s Autism and Developmental Disabilities Monitoring (ADDM) Network.</p>
					<form name="details" method="post" action="">
						<ul class="actions">
							<li><input type="text" name="username" id="username" value="" placeholder="User Name" required /></li>
							<li><input type="text" name="age" id="age" pattern="^([0-9]|[1-9][0-9]|100)$" title="Age from 0 to 100" value="" placeholder="Age (Put 0 if less than 1yr)" required /></li>
							<li><input type="submit" name="details_user" value="Take Test" /></li>
							<li><a href="#disclaimer">DISCLAIMER</a></li>
						</ul>
					</form>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner flex flex-3">
					<div class="flex-item left">
						<div>
							<h3>#Fact Prevalence</h3>
							<p>ASD is reported to occur in all racial, ethnic, and socioeconomic groups.</p>
						</div>
						<div>
							<h3>#Fact Gender Related</h3>
							<p>ASD is about 4 times more common among boys than among girls.</p>
						</div>
					</div>
					<div class="flex-item image fit round">
						<img src="images/autism_helpinghands.jpg" alt="" />
					</div>
					<div class="flex-item right">
						<div>
							<h3>#Fact Characteristic</h3>
							<p>Parents who have a child with ASD have a 2%–18% chance of having a second child who is also affected.</p>
						</div>
						<div>
							<h3>#Fact Diagnosis</h3>
							<p>Most children were still being diagnosed after age 4, though autism can be reliably diagnosed as early as age 2.</p>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<a target="_blank" href="https://en.wikipedia.org/wiki/Temple_Grandin"><h2>Dr. Temple Grandin</h2></a>
					<figure>
					    <blockquote>
					        "What would happen if the autism gene was eliminated from the gene pool? You would have a bunch of people standing around in a cave, chatting and socializing and not getting anything done."
					    </blockquote>
					    <blockquote>
					    	"Who do you think made the first stone spears? The Asperger guy. If you were to get rid of all the autism genetics, there would be no more Silicon Valley."
					    </blockquote>
					    <footer>
					       	<a target="_blank" href="https://en.wikipedia.org/wiki/Hug_machine"> <cite class="author">Dr. Temple Grandin - Inventor of the Hug Machine</cite></a>
					        <cite class="company">Notable Autism Spokesperson</cite>
					    </footer>
					</figure>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<div style="text-align:center;">
					<a target="_blank" href="https://www.autismspeaks.org/science-news/cdc-increases-estimate-autisms-prevalence-15-percent-1-59-children"><img id="stats" src="images/autism_stats_2018.jpg" alt="" /></a>
					</div>
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
					
					<h4 id="disclaimer" style="color: #ad220a; text-align:center; font-weight: bold;">DISCLAIMER</h4>

					<p>Autis does not approve or endorse any specific tools for screening purposes. We are not endorsed or associated with the <a target="_blank" href="https://en.wikipedia.org/wiki/Autism_Research_Centre">Autism Research Centre</a>. It's research goal is to understand the biomedical causes of autism spectrum conditions, and to develop new and validated methods for assessment and intervention. They clearly indicate that their tools are posted online for use in academic research purposes. None of them are diagnostic: “No single score on any of these tests or questionnaires indicates that an individual has an Autism Spectrum Condition (ASC).”</p>
		
					<p style="color: #ad220a; font-style: italic;">Autis is an online tool to screen for ASD conditions based on Social and Communication Development Questionnaire, in a non-clinical setting.</p>

					<a href="#top">Back to Top</a>
					
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