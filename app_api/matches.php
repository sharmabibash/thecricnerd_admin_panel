<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Origin");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
$conn = mysqli_connect("localhost", "thecricn_erd", "8.Z8~0pW*U4B","thecricn_erd");
if(!$conn){
    echo json_encode(['status'=>'error','message'=>'connection failed']);
}
$match= "SELECT matches.`ID`, `Tournament Name`, `Country A`, `Country B`, `Schedule`, `Time`,`Link`, flag1.`Icon` AS FlagA, flag2.`Icon` AS FlagB FROM`matches` matches 
    JOIN flags flag1 ON flag1.`Country Name` = matches.`Country A`
    JOIN flags flag2 ON flag2.`Country Name` = matches.`Country B` ORDER BY matches.ID ASC";
$matchData= mysqli_query($conn,$match);
if($matchData && mysqli_num_rows($matchData)>0){
    $result=mysqli_fetch_all($matchData,MYSQLI_ASSOC);
    echo json_encode($result);
    
}else{
    echo json_encode(['status'=>'error','message'=>'not found']);
}
?>
