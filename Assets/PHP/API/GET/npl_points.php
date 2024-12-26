<?php
include "../Config/Config.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $Array=[];
    if (isset($_GET["GetAllTeam"])) {
        $TeamQuery="SELECT * FROM `npl_points_table` 
ORDER BY Points DESC, Nrr DESC";
        $TeamQueryRun=mysqli_query($conn,$TeamQuery);
        if($TeamQueryRun){
            while($Row=$TeamQueryRun->fetch_assoc()){
                $Array[]=$Row;
            }   
            echo json_encode($Array); 
        }
    }
}
