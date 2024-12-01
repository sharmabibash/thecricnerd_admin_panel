<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$player_stats = [
    [
        "ID" => "1",
        "Player_Name" => "Kushal Bhurtel",
        "Player_Role" => "Batsman",
        "Player_Type" => "Right-Hand Batsman",
        "Bowling_Style" => "Right Handed - Leg Spinner",
        "Batting_Style" => "Right Handed",
        "Player_Photo" => "2024/07/Kushal Bhurtel.jpg",
        "T20_Matches" => "46",
        "T20_Batting_Innings" => "46",
        "T20_Bowlings_Innings" => "10",
        "T20_Run_Scored" => "1105",
        "T20_Highest_Score" => "104",
        "T20_Half_Centuries" => "8",
        "T20_Centuries" => "1",
        "T20_Strike_Rate" => "127.74",
        "T20_Batting_Average" => "26.95",
        "T20_Bowling_Economy" => "5.46",
        "T20_Wickets_Taken" => "14",
        "T20_Best_Bowling" => "4/12",
        "ODI_Matches" => "52",
        "ODI_Batting_Innings" => "51",
        "ODI_Bowlings_Innings" => "14",
        "ODI_Run_Scored" => "1219",
        "ODI_Highest_Score" => "115",
        "ODI_Half_Centuries" => "8",
        "ODI_Centuries" => "1",
        "ODI_Strike_Rate" => "83.26",
        "ODI_Batting_Average" => "23.90",
        "ODI_Bowling_Economy" => "4.84",
        "ODI_Wickets_Taken" => "11",
        "ODI_Best_Bowling" => "4/20"
    ]
];

$response = [
    "status" => "success",
    "courses" => $player_stats
];

echo json_encode($response);
?>
