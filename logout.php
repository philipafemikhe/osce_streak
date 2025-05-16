<?php
session_start();
unset($_SESSION['active_user']);
echo "You have logged out<a href='index.php'>Continue</a>";

?>