<?php
session_start();
if (!empty($_SESSION)) {
echo 'VAR DUMP for troubleshooting: ';
var_dump($_SESSION);	
} else {
echo 'We have an empty session!';
var_dump($_SESSION);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quoting Dojo - Quotes</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Here are the awesome quotes!</h1>
	<?php
		// index.php
		// include connection page
		require_once('connection.php');
		// get a single record from the table interests joining musics
		$query = "SELECT * 
		          FROM quotes
		          ORDER BY quotes.created_at DESC";
		// since we've included the connection page, we can use the $connection variable
		$results = fetch_all($query);
		foreach($results as $row)
		{
	?>
    <div>
    	<ul>
    		<li>
    		<?php
    			echo "<p>'" . stripslashes ($row['quote']) . "'</p>";
 				$time = strtotime($row['created_at']);
				$created_at= date("g:ia F j Y", $time);
    			
    			echo "<h3>- " . $row['name'] . " at " . $created_at . "</h3>"; 
    		?>
    		</li>
      	</ul>
    </div>
    <?php
    	}
    ?>
    <form action="index.php" method="post">
		<button type="submit" value="add_quote">I want to add a quote</button>
	</form>
</body>
</html>