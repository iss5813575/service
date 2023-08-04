<?php

include_once('./config/db_conect.php');
session_start();


if (isset($_GET)) {
    echo json_encode(fastRepair());
}


function fastRepair()
{
    global $connection;
    $data = array();
    $sql = "SELECT * FROM db_fast_repair ORDER BY id_repair DESC";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($res)) {

        $sql_status = "SELECT status FROM db_fast_status WHERE id_repair = '" . $row['id_repair']  . "' ORDER BY id DESC LIMIT 1";
        $status = mysqli_query($connection, $sql_status);
        $st = mysqli_fetch_array($status, MYSQLI_ASSOC);


        $obj = array(
            "id_repair" => $row["id_repair"],
            "repair_room" => $row["repair_room"],
            "repair_detail" => $row["repair_detail"],
            "date" => $row["date"],
            "create_by" => $row["create_by"],
            "status" => $st["status"],
        );
        array_push($data, $obj);
    }
    return $data;
}
