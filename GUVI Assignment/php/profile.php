

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$email = $_POST['email'];
$pass = $_POST['password'];



$sql = "SELECT email, pass FROM tb_user_data WHERE email = '$email' and pass = '$pass'";

$d = mysqli_query($conn, $sql);


$num = mysqli_num_rows($d);

if ($num>0) 
{
    header("Location:http://localhost/GUVI%20assisment/profile.html");
}    
else 
{
    echo '<script> alert("User not exists or invalid password"); window.location.href="http://localhost/GUVI%20assisment/login.html";</script>';
    
}

mysqli_close($conn);
?>