<?php
$host = 'localhost';
$port = 3306;
$username = 'root';
$password = '';
$database = 'osce_streak';

$conn = new mysqli($host,$username, $password, $database);
if ($conn->connect_error) {
  echo('<p>There was a connection error <br> <a href="create_student.html">Continue</a></p>');
  die("Connection failed: "
      . $conn->connect_error);
}