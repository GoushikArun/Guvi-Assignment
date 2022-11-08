
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</script>
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

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$repass = $_POST['repassword'];



$sql = "INSERT INTO tb_user_data (name, email, pass, repass)
VALUES ('$name','$email','$pass','$repass')";



if (mysqli_query($conn, $sql)) {
    echo '<script> alert("Successfully created LOGIN"); window.location.href="http://localhost/GUVI%20assisment/login.html";</script>';
} else {
    $er =  "Duplicate entry '". $email .  "' for key 'PRIMARY'";     
    if($er== mysqli_error($conn))
    {        
        echo '<script> alert("User already exists please login"); window.location.href="http://localhost/GUVI%20assisment/login.html";</script>';        
    }
  else
  {
    echo mysqli_error($conn);
  }
}

mysqli_close($conn);
?>