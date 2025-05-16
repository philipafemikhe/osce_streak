<?php
session_start();
include('header.html');
if(isset($_REQUEST['email'])){
	include('dbConnection.php');
	$sql = "INSERT INTO users (email, password) VALUES('". $_REQUEST['email'] . "', '" . password_hash($_REQUEST['password'], PASSWORD_DEFAULT) . "')";
  $conn -> close();
  $_SESSION["active_user"] = $_REQUEST['email'];
  echo('User created <a href="index.php"> Click to continue</a>');

}else{
	?>
	<div class="container">
	<form action="signup.php" method="post">
		<div class="row">
			Email<br>
			<input type="text" name="email" placeholder="Your Email">
		</div>

		<div class="row">
			Password<br>
			<input type="password" name="password">
		</div>

		<div class="row">
			<input type="submit" value="Create">
		</div>
	</form>

</div>
<?php
}

include('footer.html');

?>