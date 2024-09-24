
<?php

$receivedName = $_POST['Name'];
$questionNumber = $_POST['question_number'];
$userAnswer = $_POST['user_answer'];
$correctAnswer = $_POST['correct_answer'];

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "quiz_web";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user_answers (Name, question_number, user_answer, correct_answer, time)
        VALUES (?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $receivedName, $questionNumber, $userAnswer, $correctAnswer);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>










