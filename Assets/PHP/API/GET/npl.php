
<?php
include "../Config/Config.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $response = [];
    if (isset($_GET["GetNPL"])) {
        $query = "SELECT * FROM `npl` ORDER BY ID DESC";
        $queryRun = mysqli_query($conn, $query);
        if ($queryRun) {
            while ($row = $queryRun->fetch_assoc()) {
                $response[] = $row;
            }
            echo json_encode($response);
        } else {
            echo json_encode(["error" => "Error fetching records: " . mysqli_error($conn)]);
        }
    }
}