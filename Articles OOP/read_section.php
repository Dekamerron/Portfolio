<?php

include "header.html";
require_once('database.php');

$database = new db();
$results  = $database->selectArticles();

while($row = $database->fetchArray($results))
{
	$id[]    = $row['id'];
	$title[] = $row['title'];
	$body[]  = $row['body'];
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
			for ($i = 0; $i < count($title); $i++)
				{
					echo "<h4><a href='read_single_view.php?id=".$id[$i]."'>".$title[$i]."</a></h4>";
				}
			?>	
		</div>
	</div>

<?php
include "footer.html";
?>