<?php
include "../Config/Config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Player_Name = addslashes($_POST['PlayerName'] ?? '');

    $insertQuery = "INSERT INTO `npl_stats`(`Player Name`) VALUES ('$Player_Name')";

    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo "Player record inserted successfully.";
    } else {
        error_log("DB Error: " . mysqli_error($conn));
        echo "Error inserting record.";
    }
} else {
    echo "Invalid request.";
}
?>
