<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$rank = [
    [
        "ID" => "1",
        "ODI" => "17",
        "T20" => "17",
        "T20_POINTS" => "169",
        "ODI_POINTS" => "31"
        
    ]
];

$response = [
    "status" => "success",
    "courses" => $rank
];

echo json_encode($response);
?>
