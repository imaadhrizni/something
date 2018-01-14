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
				<li><a href="admin-articles.php">Articles</a></li>
				<li><a href="admin-create.php">Create Admin</a></li>
				<li><a href="admin-comments.php">Comment Approval</a></li>
				<li><a href="admin-category.php">Category</a></li>
			</ul>
			</nav>

			<article>


				<!-- Articles -->
				<?php

				if(isset($_POST['save'])){

					$name = $_POST['name'];

					$sql = "INSERT INTO category (category_name) VALUES ('".$name."')";

					if ($conn->query($sql) === TRUE) {
						echo "New category created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

				}


				if(isset($_POST['delete'])){

					$deleteid = $_POST['deleteid'];

					$sqlDelete = "DELETE FROM category WHERE category_id = ".$deleteid;

					if ($conn->query($sqlDelete) === TRUE) {
						echo "category deleted";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

				}

				?>

				<form method="post"> 
					<label id="name">Category Name:</label><br/>
					<input type="text" name="name"><br/>

					<button type="submit" name="save">save</button>
				</form>


				<div style="margin-top: 50px;">

					<?php

					$sqlCategory = "SELECT * FROM category";
					$result_category = $conn->query($sqlCategory);

					while($row = $result_category->fetch_assoc()) {

						echo '<div>';

						echo '<form method="post">';

						echo "<li class='article-list-item'>". $row["category_name"];

						//echo "<a href='#' class='read-more-button'>Read More</a>";

						$deleteid = $row["category_id"];

						echo '<input type="hidden" name="deleteid" value='.$deleteid.'>';

						echo '<button type="submit" name="delete">Delete</button>';

						echo "</li>";

						echo '</form>';

						echo '</div>';

					}

					?>
					
				</div>



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
