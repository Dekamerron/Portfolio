<?php

include "header.html";
require_once('database.php');

$database = new db();
$result   = $database->selectArticles();

while($article = $database->fetchArray($result))
{
	$id[]    = $article['id'];
	$title[] = $article['title'];
	$body[]  = $article['body'];
}

?>

<nav>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="add_article.php">Create Article</a></li>
		<li><a href="delete_article.php" class="selected">Delete Article</a></li>
		<li><a href="edit_article.php">Edit Article</a></li>
		<li><a href="read_section.php">Read Section</a></li>
	</ul>
</nav>
	
</header>
	<div class="main clearfix">
		<div class="grid_24 work">
			<img src="images/delete2.jpg">
			<?php 
			for ($i = 0; $i < count($title); $i++)
				{
					echo "<h4><a href='delete_single_view.php?id=".$id[$i]."'>".$title[$i]."</a></h4>";
				}
			?>	
		</div>
	</div>

<?php
include "footer.html";
?>