<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
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

		<?php
			if(isset($_SESSION["username"])){
				echo '<li><a href="logout.php">Log Out</a></li>';
				if(isset($_SESSION["username"])){
					if($_SESSION["username"] == "admin"){
						echo '<li><a href="admin-portal.php">Admin Portal</a></li>';
					}
				}
			}else{
				echo '<li><a href="login.php">Login</a></li>';
				echo '<li><a href="signup.php">Sign Up</a></li>';
			}
		?>
	</ul>
</nav>