<html>
<body>
<?php

$name=$_POST["name"]; 
$email=$_POST["email"]; 
$course=$_POST["course"]; 
$passwords=$_POST["passwords"];

// Server name must be localhost
$servername = "localhost";

// In my case, user name will be root
$username = "root";

// Password is empty
$password = "root";
$dbname = "php-project";

// Creating a connection
$conn = new mysqli($servername,
			$username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failure: "
		. $conn->connect_error);
}

// Creating a database named geekdata
$sql = "insert into Userdata(name,email,course,password)values('$name','$email','$course','$passwords');";
if ($conn->query($sql) === TRUE) 
{
    header("location:login.html");
} else 
{
	echo "Error: " . $conn->error;
}

// Closing connection
$conn->close();

?>
</body>
</head>