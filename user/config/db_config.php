<?php

date_default_timezone_set("Asia/Bangkok");

$Hostname = "localhost";

// For Production
$Database = "sos";
$User = "sos";
$Password = "**123sos321**";

// For Dev
// $Database = "oar_service";
// $User = "root";
// $Password = "";

$connection = mysqli_connect($Hostname, $User, $Password, $Database);

mysqli_set_charset($connection, "utf8");
if (!$connection) {
    echo "<h3>Database Connection failed</h3>";
    exit();
}



function insert_sql($table, &$fields)
{
    global $connection;
    $sql = "INSERT INTO $table (`" . implode("` , `", array_keys($fields)) . "`)";
    $sql .= " VALUES('";
    foreach ($fields as $key => $value) {
        $fields[$key] = $value;
    }
    $sql .= implode("' , '", array_values($fields)) . "');";
    $fields = array();
    $res = mysqli_query($connection, $sql);
    return $res;
}

function getData($table, $condition, $id)
{
    global $connection;
    $res = mysqli_prepare($connection, "SELECT * FROM " . $table . " WHERE " . $condition . "= ?");
    mysqli_stmt_bind_param($res, "s", $id);
    mysqli_stmt_execute($res);
    $result = mysqli_stmt_get_result($res);
    return $result;
}
