<?php
    include("function.php");

    global $conn;
    $id = $_GET['id'];
    $query = "SELECT * FROM lapangan WHERE ID = $id";

    $result = mysqli_query($conn, $query);

    if($result) {
        $temp = mysqli_fetch_assoc($result)) {
        $datas[] = [
            "ID" => $temp["ID"],
            "harga" => $temp["harga"],
            "gambar" => $temp["gambar"],
        ];
    }

    mysqli_close($conn);

    header('Content-Type: application/json');
    echo json_encode($datas);
?>