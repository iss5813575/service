<?php
include_once('../config/db_conect.php');
session_start();

if (isset($_POST['room'])) {
    $field = array();
    $field["room"] = $_POST['room'];
    $field["date"] = date("Y-m-d H:i:s");

    $res = insert_sql("master_room", $field);
    if ($res) {
        echo json_encode(array("response" => "1"));
    } else {
        echo json_encode(array("response" => "0"));
    }
}


if (isset($_GET['get_room'])) {
    echo json_encode(get_data());
}
function get_data()
{
    global $connection;
    $data = array();
    $res = mysqli_query($connection, "SELECT * FROM master_room ");
    while ($row = mysqli_fetch_array($res)) {
        $obj = array(
            "id" => $row["id"],
            "room" => $row["room"],
            "date" => $row["date"],
        );
        array_push($data, $obj);
    }
    return $data;
}
