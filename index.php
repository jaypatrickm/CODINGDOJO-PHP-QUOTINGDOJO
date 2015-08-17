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
	<title>Quoting Dojo - Add your quote!</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<ul>
		<?php
			if(isset($_SESSION['errors']))
			{ 
				echo $_SESSION['error_log'];
			} 
			else if(isset($_SESSION['OK']))
			{
				echo $_SESSION['OK_log'];
				echo $_SESSION['message'];
				unset($_SESSION['name']);
				unset($_SESSION['quote']);
				unset($_SESSION['name_flag']);
				unset($_SESSION['quote_flag']);
			}
		?>
	</ul>
	<h1>Welcome to QuotingDojo</h1>
	<form action="process.php" method="post">
		<div <?php if(isset($_SESSION['name_flag'] )) { echo "class='" . $_SESSION['name_flag'] . "'"; }?>>
			<label for="name">Your name: </label>
			<input type="text" name="name" id="name" maxlength="45" placeholder="Speros" value="<?php if (isset($_SESSION['name'])) { echo $_SESSION['name'];}?>">
		</div>
		<div <?php if(isset($_SESSION['quote_flag'] )) { echo "class='" . $_SESSION['quote_flag'] . "'"; }?>>
			<label for="quote">Your quote: </label>
			<textarea name="quote" id="quote" cols="50" rows="6" maxlength="255" placeholder="I make lame jokes."><?php if (isset($_SESSION['quote'])) { echo $_SESSION['quote'];}?></textarea>
		</div>
		<div id="button-quote" class="button">
			<button type="submit" name="add_quote" value="add_quote">Add my quote!</button>
		</div>
		<div class="button">
			<button type="submit" name="see_quotes" value="see_quotes">Skip to quotes!</button>
		</div>
	</form>
	<form id="start-over" action="process.php" method="post">
		<input type="hidden" name="unset" value="unset">
		<button type="submit" value="start_over">Start Over</button>
	</form>
</body>
</html>