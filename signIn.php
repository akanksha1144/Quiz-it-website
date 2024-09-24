<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz_web"; 

$conn = new mysqli($servername, $username, $password, $database); 


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM signin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        header("Location: home.html");
        exit(); 
    } else {
        
        echo "Invalid username or password";
    }
}

$conn->close();
?>

