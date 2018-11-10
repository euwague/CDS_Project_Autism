<?php 

$username = $_GET['name'];
$age = $_GET['age'];

if(!empty($_POST["test_submit"]))
{

	$totalscore = 0;

	for ($i = 1; $i <= 20; $i++)
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

	if($totalscore >=0 && $totalscore <=7)
	{
		$result = "No Autism";
	}
	else if($totalscore >=8)
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
						<p>Please answer these 20 screening questions sincerely.</p>
					</header>
					<div class="image fit">
						<img src="images/autism.png" alt="" />
					</div>

					<h2>Welcome, <?php echo $username; ?>!</h2>
					<p style="color: #f6755e;">Below are a list of statements. Please answer these questions about your child. Keep in mind how your child usually behaves. If you have seen your child do the behavior a few times, but he or she does not usually do it, then please answer <strong>No</strong></p>
					<form name="autism_test" method="post" action="#">
						<div class="row uniform">
							<div class="12u 12u$(xsmall)">
								<p>Q1. If you point at something across the room, does your child look at it? (For example, if you point at a toy or an animal, does your child look at the toy or animal?)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q1y" name="q1" value="0" required>
								<label for="q1y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q1n" name="q1" value="1">
								<label for="q1n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q2. Have you ever wondered if your child might be deaf?</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q2y" name="q2" value="1" required>
								<label for="q2y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q2n" name="q2" value="0">
								<label for="q2n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q3. Does your child play pretend or make-believe?(For example, pretend to drink from an empty cup, pretend to talk on a phone, or pretend to feed a doll or stuffed animal)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q3y" name="q3" value="0" required>
								<label for="q3y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q3n" name="q3" value="1">
								<label for="q3n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q4. Does your child like climbing on things?(For example, furniture, playground equipment, or stairs)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q4y" name="q4" value="0" required>
								<label for="q4y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q4n" name="q4" value="1">
								<label for="q4n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q5. Does your child make unusual finger movements near his or her eyes?(For example, does your child wiggle his or her fingers close to his or her eyes?)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q5y" name="q5" value="1" required>
								<label for="q5y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q5n" name="q5" value="0">
								<label for="q5n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q6. Does your child point with one finger to ask for something or to get help? (For example, pointing to a snack or toy that is out of reach?)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q6y" name="q6" value="0" required>
								<label for="q6y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q6n" name="q6" value="1">
								<label for="q6n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q7. 	Does your child point with one finger to show you something interesting? (For example, pointing to an airplane in the sky or a big truck in the road)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q7y" name="q7" value="0" required>
								<label for="q7y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q7n" name="q7" value="1">
								<label for="q7n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q8. Is your child interested in other children? (For example, does your child watch other children, smile at them, or go to them?)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q8y" name="q8" value="0" required>
								<label for="q8y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q8n" name="q8" value="1">
								<label for="q8n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q9. Does your child show you things by bringing them to you or holding them up for you to see – not to get help, but just to share?(For example, showing you a flower, a stuffed animal, or a toy truck)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q9y" name="q9" value="0" required>
								<label for="q9y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q9n" name="q9" value="1">
								<label for="q9n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q10. Does your child respond when you call his or her name?(For example, does he or she look up, talk or babble, or stop what he or she is doing when you call his or her name?)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q10y" name="q10" value="0" required>
								<label for="q10y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q10n" name="q10" value="1">
								<label for="q10n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q11. When you smile at your child, does he or she smile back at you?	</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q11y" name="q11" value="0" required>
								<label for="q11y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q11n" name="q11" value="1">
								<label for="q11n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q12. Does your child get upset by everyday noises? (For example, a vacuum cleaner or loud music)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q12y" name="q12" value="1" required>
								<label for="q12y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q12n" name="q12" value="0">
								<label for="q12n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q13. Does your child walk?</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q13y" name="q13" value="0" required>
								<label for="q13y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q13n" name="q13" value="1">
								<label for="q13n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q14. Does your child look you in the eye when you are talking to him or her, playing with him or her, or dressing him or her?</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q14y" name="q14" value="0" required>
								<label for="q14y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q14n" name="q14" value="1">
								<label for="q14n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q15. Does your child try to copy what you do?(For example, wave bye-bye, clap, or make a funny noise when you do)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q15y" name="q15" value="0" required>
								<label for="q15y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q15n" name="q15" value="1">
								<label for="q15n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q16. If you turn your head to look at something, does your child look around to see what you are looking at?</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q16y" name="q16" value="0" required>
								<label for="q16y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q16n" name="q16" value="1">
								<label for="q16n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q17. Does your child try to get you to watch him or her? (For example, does your child look at you for praise, or say “look” or “watch me”)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q17y" name="q17" value="0" required>
								<label for="q17y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q17n" name="q17" value="1">
								<label for="q17n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q18. Does your child understand when you tell him or her to do something? (For example, if you don’t point, can your child understand “put the book on the chair” or “bring me the blanket”?)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q18y" name="q18" value="0" required>
								<label for="q18y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q18n" name="q18" value="1">
								<label for="q18n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q19. If something new happens, does your child look at your face to see how you feel about it? (For example, if he or she hears a strange or funny noise, or sees a new toy, will he or she look at your face?)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q19y" name="q19" value="0" required>
								<label for="q19y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q19n" name="q19" value="1">
								<label for="q19n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q20. Does your child like movement activities?(For example, being swung or bounced on your knee)</p>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q20y" name="q20" value="0" required>
								<label for="q20y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q20n" name="q20" value="1">
								<label for="q20n">No</label>
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