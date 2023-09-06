<?php


include_once('./config/db_config.php');

if (isset($_GET["userid"])) {
    echo json_encode(Repair());
}

if (isset($_GET["feedback"])) {
    echo json_encode(Feedback($_GET["feedback"]));
}

if (isset($_GET["repair"])) {
    echo json_encode(nomalRepair($_GET["repair"]));
}



function Repair()
{
    global $connection;
    $data = array();
    $sql = "SELECT * FROM db_fast_repair WHERE create_by= '" . $_GET["userid"] . "' ORDER BY id_repair DESC";
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

function Feedback($userid)
{
    global $connection;
    $data = array();
    $sql = "SELECT * FROM db_suggest WHERE create_by= '" . $userid . "' ORDER BY id_suggest DESC";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($res)) {

        $sql_status = "SELECT status FROM db_suggest_status WHERE id_suggest = '" . $row['id_suggest']  . "' ORDER BY id DESC LIMIT 1";
        $status = mysqli_query($connection, $sql_status);
        $st = mysqli_fetch_array($status, MYSQLI_ASSOC);

        $obj = array(
            "id_suggest" => $row["id_suggest"],
            "detail" => $row["detail"],
            "location" => $row["location"],
            "date" => $row["date"],
            "create_by" => $row["create_by"],
            "status" => $st["status"],
        );
        array_push($data, $obj);
    }
    return $data;
}


function nomalRepair($user_id)
{
    global $connection;
    $data_repair = array();
    $sql = "SELECT * FROM db_repair WHERE create_by= '" . $user_id . "' ORDER BY id_repair DESC";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($res)) {

        $sql_status = "SELECT status FROM db_repair_status WHERE id_repair = '" . $row['id_repair']  . "' ORDER BY id DESC LIMIT 1";
        $status = mysqli_query($connection, $sql_status);
        $st = mysqli_fetch_array($status, MYSQLI_ASSOC);

        $sql_img = "SELECT * FROM db_repair_img WHERE id_repair = '" . $row['id_repair']  . "' ";
        $imgs = mysqli_query($connection, $sql_img);
        $img = array();
        while ($m = mysqli_fetch_array($imgs)) {
            array_push($img, $m['img_h']);
        }

        $obj = array(
            "id_repair" => $row["id_repair"],
            "type_repair" => $row["type_repair"],
            "detail_repair" => $row["detail_repair"],
            "location_repair" => $row["location_repair"],
            "date" => $row["date"],
            "create_by" => $row["create_by"],
            "status" => $st["status"],
            "imgs" =>  $img,
        );
        array_push($data_repair, $obj);
    }
    return $data_repair;
}
