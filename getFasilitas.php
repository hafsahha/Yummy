<?php
    include("function.php");

    global $conn;
    $query = "SELECT * FROM fasilitas WHERE ID = '".$_GET["ID"]."'";

    $result = mysqli_query($conn, $query);

    if($result) {
        while($temp = mysqli_fetch_assoc($result)) {
            $datas[] = [
                "ID" => $temp["ID"],
                "harga" => $temp["harga"],
            ];
        }
    }

    mysqli_close($conn);

    header('Content-Type: application/json');
    echo json_encode($datas);
?>