<?php
    include("function.php");

    global $conn;
    $query = "SELECT * FROM lapangan";

    $result = mysqli_query($conn, $query);

    if($result) {
        while($temp = mysqli_fetch_assoc($result)) {
            $datas[] = [
                "ID" => $temp["ID"],
                "name" => $temp["name"],
            ];
        }
    }

    mysqli_close($conn_regency);

    header('Content-Type: application/json');
    echo json_encode($datas);
?>