<?php 

exec("python statsplot.py");

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
						<h1>Autism Statistics</h1>
						<p>Autism Screening Online Test Stats!</p>
					</header>
					<div class="image fit">
						<img src="images/stats.jpg" alt="" />
					</div>

					<div id="ttagraph" style="width: 100%; height: 700px;">
						<iframe src="demopyplot1.html" target="_self" frameborder="0" border="0" cellspacing="0"
						        style="border-style: none;width: 100%; height: 768px; margin-top: -100px; align: center;"></iframe>
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

				Plotly.newPlot('chart1', resdata);

			</script>

	</body>
</html>