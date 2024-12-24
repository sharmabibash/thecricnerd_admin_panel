<?php 
include "../Config/Config.php";
$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$correctOption = (int) $_POST['correctOption'];
$created_at = date("Y-m-d H:i:s");
$upload_query = "INSERT INTO quiz_questions (Questions, Option1, Option2, Option3, Option4, CorrectAns, created_at)
            VALUES ('$question', '$option1', '$option2', '$option3', '$option4', $correctOption, '$created_at')";
if ($conn->query($upload_query)) {
    echo "Success";
} else {
    echo "Failed to upload data: " . $conn->error;
}
$conn->close();
?>
