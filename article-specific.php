<?php

include('dbconnection.php');

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
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="#">Latest Articles</a></li>
			<li><a href="#">Select Category</a>

				
				<ul>
					<!-- Categories -->
					<?php

					$sql = "SELECT * FROM category";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

						while($row = $result->fetch_assoc()) {

							$categoryid = $row["category_id"];

							$categoryname = $row["category_name"];

							echo "<li><a href='category-specific.php?val=".$categoryid."'>". $categoryname. "</a></li>";

						}

					}

					?>

				</ul>



			</li>
			<li><a href="login.php">Login</a></li>
			<li><a href="signup.php">Sign Up</a></li>				
			<li><a href="contact.php">Contact us</a></li>
		</ul>
	</nav>
	<img src="images/banners/randombanner.php" />
	<main>
		<!-- Delete the <nav> element if the sidebar is not required -->
			<nav>
				<ul>
					<li><a href="#">Sidebar</a></li>
					<li><a href="#">This can</a></li>
					<li><a href="#">Be removed</a></li>
					<li><a href="#">When not needed</a></li>
				</ul>
			</nav>

			<article>

				<?php

				$articleid = $_GET["val"];

				$sql_article = "SELECT * FROM article WHERE article_id=".$articleid;
				
				$result_article_text = $conn->query($sql_article);

				if ($result_article_text->num_rows > 0) {

					while($row = $result_article_text->fetch_assoc()) {

						echo '<div>';

						echo $row["article_text"];

						echo '</div>';

					}

				}

				?>



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
