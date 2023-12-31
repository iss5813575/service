<?php

include_once('./config/db_conect.php');
session_start();


if (isset($_GET['get_fast_repair'])) {
    echo json_encode(fastRepair());
}
if (isset($_GET['get_ap'])) {
    echo json_encode(Appeal());
}

if (isset($_GET["get_repair"])) {
    echo json_encode(Repair());
}


function fastRepair()
{
    global $connection;
    $data = array();
    $sql = "SELECT * FROM db_fast_repair ORDER BY id_repair DESC";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($res)) {

        $sql_status = "SELECT status,detail_worker FROM db_fast_status WHERE id_repair = '" . $row['id_repair']  . "' ORDER BY id DESC LIMIT 1";
        $status = mysqli_query($connection, $sql_status);
        $st = mysqli_fetch_array($status, MYSQLI_ASSOC);


        $obj = array(
            "id_repair" => $row["id_repair"],
            "repair_room" => $row["repair_room"],
            "repair_detail" => $row["repair_detail"],
            "date" => $row["date"],
            "create_by" => $row["create_by"],
            "status" => $st["status"],
            "detail_worker" => $st["detail_worker"]
        );
        array_push($data, $obj);
    }
    return $data;
}

function Appeal()
{
    global $connection;
    $data = array();
    $sql = "SELECT * FROM db_suggest ORDER BY id_suggest DESC";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($res)) {

        $sql_status = "SELECT status,detail_worker FROM db_suggest_status WHERE id_suggest = '" . $row['id_suggest']  . "' ORDER BY id DESC LIMIT 1";
        $status = mysqli_query($connection, $sql_status);
        $st = mysqli_fetch_array($status, MYSQLI_ASSOC);


        $obj = array(
            "id_suggest" => $row["id_suggest"],
            "location" => $row["location"],
            "detail" => $row["detail"],
            "date" => $row["date"],
            "create_by" => $row["create_by"],
            "status" => $st["status"],
            "detail_worker" => $st["detail_worker"]
        );
        array_push($data, $obj);
    }
    return $data;
}

function Repair()
{
    global $connection;
    $data = array();
    $sql = "SELECT * FROM db_repair ORDER BY id_repair DESC";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($res)) {

        $sql_status = "SELECT status,detail_worker FROM db_repair_status WHERE id_repair = '" . $row['id_repair']  . "' ORDER BY id DESC LIMIT 1";
        $status = mysqli_query($connection, $sql_status);
        $st = mysqli_fetch_array($status, MYSQLI_ASSOC);

        $sql_img = "SELECT img_h FROM db_repair_img WHERE id_repair = '" . $row['id_repair']  . "'";
        $image = mysqli_query($connection, $sql_img);
        $data_image = array();
        while ($img = mysqli_fetch_array($image)) {
            array_push($data_image, $img["img_h"]);
        }

        $obj = array(
            "id_repair" => $row["id_repair"],
            "type_repair" => $row["type_repair"],
            "detail_repair" => $row["detail_repair"],
            "location_repair" => $row["location_repair"],
            "date" => $row["date"],
            "create_by" => $row["create_by"],
            "status" => $st["status"],
            "detail_worker" => $st["detail_worker"],
            "imgs" => $data_image,
        );
        array_push($data, $obj);
    }
    return $data;
}
