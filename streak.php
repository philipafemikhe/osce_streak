<?php
session_start();
include('header.html');
if(isset($_SESSION['active_user'])){
	include('dbConnection.php');
	$sql = "SELECT * from daily_streak WHERE email='" . $_SESSION['active_user'] . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_date = $row['last_date'];
        $today = (string)date('Y-m-d');
        if($last_date != $today){
			$count = $row['streak_count'] + 1;
	        $today = (string)date('Y-m-d');
	        $sql = "UPDATE daily_streak SET streak_count=" . $count . ", last_date='" . $today . "' WHERE email='" . $_SESSION['active_user'] . "'";
	        $conn->query($sql);
	        echo 'Streak Updated <a href="index.php">Click to continue</a>';
        }else{
        	echo 'You cannot re-take streak today <a href="index.php">Click to continue</a>';
        }

        
    } else {
		$sql = "INSERT INTO daily_streak (email, first_name, last_date, streak_count) VALUES('" .  $_SESSION['active_user'] . "', '" . explode($_SESSION['active_user'],'@')[0] . "','" . date('Y-m-d') . "'," . 1 . " )";
		$result = $conn->query($sql);
		echo 'Sneak created <a href="index.php">Click to continue</a>';
    }
  $conn -> close();
}

include('footer.html');

?>