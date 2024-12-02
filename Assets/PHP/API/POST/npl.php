<?php
include "../Config/Config.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Player_Name = addslashes($_POST['PlayerName'] ?? '');
    $Player_Role = addslashes($_POST['PlayerRole'] ?? '');
    if ($Player_Role === 'Batsman') {
        $tableName = 'npl_stats_batting';
    } elseif ($Player_Role === 'Bowler') {
        $tableName = 'npl_stats_bowling';
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid Player Role']);
        exit;
    }
    $insertQuery = "INSERT INTO `$tableName`(`Player Name`) VALUES ('$Player_Name')";

    if (mysqli_query($conn, $insertQuery)) {
        echo json_encode(['success' => true, 'message' => "Player record inserted successfully"]);
    } else {
        error_log("DB Error: " . mysqli_error($conn));
        echo json_encode(['success' => false, 'message' => 'Error inserting record.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
