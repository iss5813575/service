<?php

date_default_timezone_set("Asia/Bangkok");

$Hostname = "localhost";

// For Production
// $Database = "sos";
// $User = "sos";
// $Password = "**123sos321**";

// For Dev
$Database = "oar_service";
$User = "root";
$Password = "";

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

function getId()
{
    global $connection;
    $res = mysqli_query($connection, "SELECT user_id FROM user ORDER BY user_id DESC  LIMIT 1");
    if (mysqli_num_rows($res) == 0) {
        return 'USI' . date("Y") . '0001';
    } else {
        $rw = mysqli_fetch_array($res);
        if (substr($rw['user_id'], 3, -4) == date("Y")) {
            // echo substr($rw['job_info_id'],7) ."<br>";
            $no = (substr($rw['user_id'], 7) * 1) + 1;
            $num = str_pad($no, 4, "0", STR_PAD_LEFT);
            return 'USI' . date("Y") . $num;
        } else {
            return 'USI' . date("Y") . '0001';
        }
    }
}


function update_sql($table, &$fields, $condition)
{
    global $connection;
    $sql = "UPDATE $table SET ";
    foreach ($fields as $key => $value) {
        $fields[$key] = " `$key` = '" . $value . "' ";
    }
    $sql .= implode(" , ", array_values($fields)) . " WHERE " . $condition . ";";
    $res = mysqli_query($connection, $sql);
    return $res;
}