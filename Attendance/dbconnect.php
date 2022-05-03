<?php
//phpinfo();

$servername = "a2nlmysql23plsk.secureserver.net";
$username = "kpraindia";
$password = "Edeepak@123";
$dbname = "hris";

// Create connection
 $conn = mysqli_connect($servername, $username, $password,$dbname);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
//echo "Connect successfully";
}