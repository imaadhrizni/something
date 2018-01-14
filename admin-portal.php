<?php

include('dbconnection.php');

// Start the session
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css"/>
	<title>Northampton News - Home</title>

	<style type="text/css">
	.read-more-button{

		float: right;
		text-decoration: none;

	}

	.article-list-item{

		background: #fff;
		padding: 10px;
		list-style: none;

	}
</style>
</head>
<body>
	<header>
		<section>
			<h1>Northampton News</h1>
		</section>
	</header>
	<?php
	include ('menu.php');
	?>
	<img src="images/banners/randombanner.php" />
	<main>
		<!-- Delete the <nav> element if the sidebar is not required -->
			<nav>
				<ul>
					<li><a href="#">Articles</a></li>
					<li><a href="#">Create Admin</a></li>
					<li><a href="#">Comment</a></li>
					<li><a href="#">Category</a></li>
				</ul>
			</nav>

			<article>

				
				
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
	</html>

	<?php
	$conn->close();
	?>
