<?php
session_start();

$servername = "localhost";

// In my case, user name will be root
$usernamee = "root";

// Password is empty
$password = "root";
$dbname = "php-project";
$conn = new mysqli($servername,$usernamee, $password,$dbname);
// if($conn){
//     echo "connected successfully";die;
// }
$selectQuery = "SELECT * FROM Userdata WHERE email='"
. $_POST["username"] . "' AND
password='" . $_POST["userpassword"] . "'    ";
// $sql = mysqli_query($conn,$selectQuery);
// die("swljl ");
// var_dump($conn->query($selectQuery));die;

if (($conn->query($selectQuery) != null))
{
    // die("adsf");
    $_SESSION["username"] = $_POST["username"];
    header("Location:dashboard.php");
}
else
{
    header("Location:Signup.html");
}

?>