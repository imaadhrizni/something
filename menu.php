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