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
			<li><a href="/">Home</a></li>
			<li><a href="#">Latest Articles</a></li>
			<li><a href="#">Select Category</a>

				
				<ul>
					<?php

					$sql = "SELECT * FROM category";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

						while($row = $result->fetch_assoc()) {

							echo "<li><a href='#'>". $row["category_name"]. "</a></li>";

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

				<!-- <h2>A Page Heading</h2>
				<p>Text goes in paragraphs</p>

				<ul>
					<li>This is a list</li>
					<li>With multiple</li>
					<li>List items</li>
				</ul>


				<form>
					<p>Forms are styled like so:</p>

					<label>Field 1</label> <input type="text" />
					<label>Field 2</label> <input type="text" />
					<label>Textarea</label> <textarea></textarea>

					<input type="submit" name="submit" value="Submit" />
				</form> -->

				<?php

				$sql_article = "SELECT * FROM article";
				$result_article = $conn->query($sql_article);

				if ($result_article->num_rows > 0) {

					while($row = $result_article->fetch_assoc()) {

						echo '<div>';

						echo "<li class='article-list-item'>". $row["article_header"];

						echo "<a href='#' class='read-more-button'>Read More</a>";

						echo "</li>";

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
