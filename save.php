<?php
$name = $_REQUEST['name'];
$photo = $_REQUEST['photo'];
$class = $_REQUEST['class'];
$mathematics = $_REQUEST['mathematics'];
$english = $_REQUEST['english'];
$biology = $_REQUEST['biology'];
$int_science = $_REQUEST['int_science'];
$social_studies = $_REQUEST['social_studies'];


$host = 'localhost';
$port = 3306;
$username = 'root';
$password = '';
$database = 'resuitdb';

// Connection 
$conn = new mysqli($host, 
           $username, $password, $database);
 
// For checking if connection is
// successful or not
if ($conn->connect_error) {
  die("Connection failed: "
      . $conn->connect_error);
}
    $sql = "INSERT INTO user (name, photo, class, mathematics, english, biology, int_science, social_studies) VALUES('" . $name . "','" . $photo . "','". $class . "','" . $mathematics . "','" . $english . "', '" . $biology . "', '" . $int_science . "','" . $social_studies . "')";
    // $result -> free_result();
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
  $conn -> close();
  header('Location', '/create_student.php');

?>

<a href="create_student.php">continue</a>