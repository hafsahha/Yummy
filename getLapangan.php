<?php
    include("function.php");

    global $conn;
    $query = "SELECT * FROM lapangan WHERE ID = '".$_GET["ID"]."'";

    $result = mysqli_query($conn, $query);

    if($result) {
        while($temp = mysqli_fetch_assoc($result)) {
            $datas[] = [
                "ID" => $temp["ID"],
                "harga" => $temp["harga"],
                "gambar" => $temp["gambar"],
            ];
        }
    }

    mysqli_close($conn);

    header('Content-Type: application/json');
    echo json_encode($datas);
?>