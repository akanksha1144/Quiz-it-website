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
    $confirm_password = $_POST['confirm_password'];
    if ($password != $confirm_password) {
        echo "Password and confirm password do not match";
        exit(); 
    }

    $check_sql = "SELECT * FROM signin WHERE username='$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "Username already exists";
        exit(); 
    }

    $insert_sql = "INSERT INTO signin (username, password) VALUES ('$username', '$password')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
