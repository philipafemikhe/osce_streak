<?php
session_start();
include('header.html');
if(isset($_REQUEST['email'])){
	include('dbConnection.php');
	$sql = "SELECT * FROM users WHERE email='" . $_REQUEST['email'] . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       if(password_verify($_REQUEST['password'], $row['password'])){
       		$_SESSION["active_user"] = $_REQUEST['email'];
       		echo('Logged in successfully <a href="index.php"> Click to continue</a>');
       		$conn -> close();
       		exit();
       }else{
    	echo "Wrong login credentials";
       }
    }else{
    	echo "Wrong login credentials";
    }
  $conn -> close();
}
?>
	<div class="container">
	<form action="login.php" method="post">
		<div class="row">
			Email<br>
			<input type="text" name="email" placeholder="Your Email">
		</div>

		<div class="row">
			Password<br>
			<input type="password" name="password">
		</div>

		<div class="row">
			<input type="submit" value="Login">
		</div>
	</form>

</div>
<?php
include('footer.html');

?>