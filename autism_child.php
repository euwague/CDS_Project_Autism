<?php 

$username = $_GET['name'];
$age = $_GET['age'];

if(!empty($_POST["test_submit"]))
{

	$totalscore = 0;

	for ($i = 1; $i <= 37; $i++)
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

	if($totalscore >=0 && $totalscore <=14)
	{
		$result = "No Autism";
	}
	else if($totalscore >=15)
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
						<p>Please answer these 37 screening questions sincerely.</p>
					</header>
					<div class="image fit">
						<img src="images/autism.png" alt="" />
					</div>

					<h2>Welcome, <?php echo $username; ?>!</h2>
					<p style="color: #f6755e;">Below are a list of statements. Please read each statement very carefully and select the appropriate answer.</p>
					<form name="autism_test" method="post" action="#">
						<div class="row uniform">
							
							<div class="12u 12u$(xsmall)">
								<p>Q1. Does s/he join in playing games with other children easily?</p> 
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
								<p>Q2. Does s/he come up to you spontaneously for a chat?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q2y" name="q2" value="0" required> 
								<label for="q2y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q2n" name="q2" value="1"> 
								<label for="q2n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q3. Was s/he speaking by 2 years old?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q3y" name="q3" value="0" required> 
								<label for="q3y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q3n" name="q3" value="0"> 
								<label for="q3n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q4. Does s/he enjoy sports?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q4y" name="q4" value="0" required> 
								<label for="q4y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q4n" name="q4" value="0"> 
								<label for="q4n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q5. Is it important to him/her to fit in with the peer group?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q5y" name="q5" value="0" required> 
								<label for="q5y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q5n" name="q5" value="1"> 
								<label for="q5n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q6. Does s/he appear to notice unusual details that others miss?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q6y" name="q6" value="1" required> 
								<label for="q6y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q6n" name="q6" value="0"> 
								<label for="q6n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q7. Does s/he tend to take things literally?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q7y" name="q7" value="1" required> 
								<label for="q7y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q7n" name="q7" value="0"> 
								<label for="q7n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q8. When s/he was 3 years old, did s/he spend a lot of time pretending (e.g., play-acting being a superhero, or holding teddy’s tea parties)?</p> 
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
								<p>Q9. Does s/he like to do things over and over again,in the same way all the time?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q9y" name="q9" value="1" required> 
								<label for="q9y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q9n" name="q9" value="0"> 
								<label for="q9n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q10. Does s/he find it easy to interact with other children?</p> 
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
								<p>Q11. Can s/he keep a two-way conversation going?</p> 
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
								<p>Q12. Can s/he read appropriately for his/her age?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q12y" name="q12" value="0" required> 
								<label for="q12y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q12n" name="q12" value="0"> 
								<label for="q12n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q13. Does s/he mostly have the same interests as his/her peers?</p> 
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
								<p>Q14. Does s/he have an interest which takes up so much time that s/he does little else?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q14y" name="q14" value="1" required> 
								<label for="q14y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q14n" name="q14" value="0"> 
								<label for="q14n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q15. Does s/he have friends, rather than just acquaintances?</p> 
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
								<p>Q16. Does s/he often bring you things s/he is interested in to show you?</p> 
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
								<p>Q17. Does s/he enjoy joking around?</p> 
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
								<p>Q18. Does s/he have difficulty understanding the rules for polite behaviour?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q18y" name="q18" value="1" required> 
								<label for="q18y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q18n" name="q18" value="0"> 
								<label for="q18n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q19. Does s/he appear to have an unusual memory for details?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q19y" name="q19" value="1" required> 
								<label for="q19y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q19n" name="q19" value="0"> 
								<label for="q19n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q20. Is his/her voice unusual (e.g., overly adult, flat, or very monotonous)?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q20y" name="q20" value="1" required> 
								<label for="q20y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q20n" name="q20" value="0"> 
								<label for="q20n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q21. Are people important to him/her?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q21y" name="q21" value="0" required> 
								<label for="q21y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q21n" name="q21" value="1"> 
								<label for="q21n">No</label>
							</div>

							<div class="12u 12u$(xsmall)">
								<p>Q22. Can s/he dress him/herself?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q22y" name="q22" value="0" required> 
								<label for="q22y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q22n" name="q22" value="0"> 
								<label for="q22n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q23. Is s/he good at turn-taking in conversation?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q23y" name="q23" value="0" required> 
								<label for="q23y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q23n" name="q23" value="1"> 
								<label for="q23n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q24. Does s/he play imaginatively with other children, and engage in role-play?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q24y" name="q24" value="0" required> 
								<label for="q24y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q24n" name="q24" value="1"> 
								<label for="q24n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q25. Does s/he often do or say things that are tactless or socially inappropriate?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q25y" name="q25" value="1" required> 
								<label for="q25y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q25n" name="q25" value="0"> 
								<label for="q25n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q26. Can s/he count to 50 without leaving out any numbers?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q26y" name="q26" value="0" required> 
								<label for="q26y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q26n" name="q26" value="0"> 
								<label for="q26n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q27. Does s/he make normal eye-contact?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q27y" name="q27" value="0" required> 
								<label for="q27y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q27n" name="q27" value="1"> 
								<label for="q27n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q28. Does s/he have any unusual and repetitive movements?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q28y" name="q28" value="1" required> 
								<label for="q28y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q28n" name="q28" value="0"> 
								<label for="q28n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q29. Is his/her social behaviour very one-sided and always on his/her own terms?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q29y" name="q29" value="1" required> 
								<label for="q29y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q29n" name="q29" value="0"> 
								<label for="q29n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q30. Does s/he sometimes say “you” or “s/he” when s/he means “I”?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q30y" name="q30" value="1" required> 
								<label for="q30y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q30n" name="q30" value="0"> 
								<label for="q30n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q31. Does s/he prefer imaginative activities such as play-acting or story-telling, rather than numbers or lists of facts?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q31y" name="q31" value="0" required> 
								<label for="q31y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q31n" name="q31" value="1"> 
								<label for="q31n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q32. Does s/he sometimes lose the listener because of not explaining what s/he is talking about?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q32y" name="q32" value="1" required> 
								<label for="q32y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q32n" name="q32" value="0"> 
								<label for="q32n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q33. Can s/he ride a bicycle (even if with stabilisers)?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q33y" name="q33" value="0" required> 
								<label for="q33y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q33n" name="q33" value="0"> 
								<label for="q33n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q34. Does s/he try to impose routines on him/herself, or on others, in such a way that it causes problems?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q34y" name="q34" value="1" required> 
								<label for="q34y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q34n" name="q34" value="0"> 
								<label for="q34n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q35. Does s/he care how s/he is perceived by the rest of the group?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q35y" name="q35" value="0" required> 
								<label for="q35y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q35n" name="q35" value="1"> 
								<label for="q35n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q36. Does s/he often turn conversations to his/her favourite subject rather than following what the other person wants to talk about?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q36y" name="q36" value="1" required> 
								<label for="q36y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q36n" name="q36" value="0"> 
								<label for="q36n">No</label>
							</div>


							<div class="12u 12u$(xsmall)">
								<p>Q37. Does s/he have odd or unusual phrases?</p> 
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q37y" name="q37" value="1" required> 
								<label for="q37y">Yes</label>
							</div>
							<div class="6u 12u$(small)">
								<input type="radio" id="q37n" name="q37" value="0"> 
								<label for="q37n">No</label>
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