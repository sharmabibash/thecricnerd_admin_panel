<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Method");

$conn = mysqli_connect("localhost", "thecricn_erd", "8.Z8~0pW*U4B", "thecricn_erd");

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}

// Ensure that $SlugUrl is defined and sanitized
$SlugUrl = isset($_GET['slug']) ? mysqli_real_escape_string($conn, $_GET['slug']) : '';

$query = "SELECT
    p.ID,
    p.`Player Name`,
    p.`Player Role`,
    p.`Player Type`,
    p.`Bowling Style`,
    p.`Batting Style`,
    p.`Player Photo`,
    t.`Total Matches` AS T20_Matches,
    t.`Batting Innings` AS T20_Batting_Innings,
    t.`Bowlings Innings` AS T20_Bowlings_Innings,
    t.`Run Scored` AS T20_Run_Scored,
    t.`Highest Score` AS T20_Highest_Score,
    t.`Half Centuries` AS T20_Half_Centuries,
    t.`Centuries` AS T20_Centuries,
    t.`Strike Rate` AS T20_Strike_Rate,
    t.`Batting Average` AS T20_Batting_Average,
    t.`Bowling Economy` AS T20_Bowling_Economy,
    t.`Wickets Taken` AS T20_Wickets_Taken,
    t.`Best Bowlings` AS T20_Best_Bowling,
    o.`Total Matches` AS ODI_Matches,
    o.`Batting Innings` AS ODI_Batting_Innings,
    o.`Bowlings Innings` AS ODI_Bowlings_Innings,
    o.`Run Scored` AS ODI_Run_Scored,
    o.`Highest Score` AS ODI_Highest_Score,
    o.`Half Centuries` AS ODI_Half_Centuries,
    o.`Centuries` AS ODI_Centuries,
    o.`Strike Rate` AS ODI_Strike_Rate,
    o.`Batting Average` AS ODI_Batting_Average,
    o.`Bowling Economy` AS ODI_Bowling_Economy,
    o.`Wickets Taken` AS ODI_Wickets_Taken,
    o.`Best Bowlings` AS ODI_Best_Bowling
FROM
    `players` p
LEFT JOIN `t20i_statistics` t ON
    p.`ID` = t.`Player ID`
LEFT JOIN `odi_statistics` o ON
    p.`ID` = o.`Player ID`
WHERE
    p.`Slug Url` LIKE '%$SlugUrl%'";

// Execute the query
$playerData = mysqli_query($conn, $query);

if ($playerData && mysqli_num_rows($playerData) > 0) {
    $result = mysqli_fetch_all($playerData, MYSQLI_ASSOC);
    echo json_encode($result);  // Return all player, t20i_statistics, and odi_statistics data
} else {
    echo json_encode(['status' => 'error', 'message' => 'No data found']);
}

// Close the database connection
mysqli_close($conn);
?>
