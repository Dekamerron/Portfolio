<?php

include "header.html";
require_once('database.php');

$database = new db();
$id       = $_GET['id'];
$results  = $database->selectOne($id);

if($database->affectedRows())
{
	$article = $database->fetchAssoc($results);
	$title   = $article['title'];
	$body    = $article['body'];
}

if(!$article['id'])
{
	header("Location: read_section.php");
}

if(isset($_POST['go_back']))
{
	header("Location: read_section.php");
}

?>

<nav>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="add_article.php">Create Article</a></li>
		<li><a href="delete_article.php">Delete Article</a></li>
		<li><a href="edit_article.php">Edit Article</a></li>
		<li><a href="read_section.php" class="selected">Read Section</a></li>
	</ul>
</nav>
</header>
	<div class="main clearfix">
		<div class="grid_24 work">
			<img src="images/read.jpg">
			<?php
				echo "<h4>".$title."</h4>";
				echo "<p class ='first'>";	
				echo $body;
				echo "</p>";
				echo "<h4></h4>";
			?>
			<form action="read_section.php" method="POST">
				<input type="submit" class='button' name="go_back" value="Go back">
			</form>
		</div>
	</div>
</div>
</body>
</html>
