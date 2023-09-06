<?php
include_once('../config/db_config.php');

if (isset($_POST['txt_detail'])) {

    $id_repair = countId();
    $field = array();
    $field["id_suggest"] = $id_repair;
    $field["location"] = $_POST['txt_location'];
    $field["detail"] = $_POST['txt_detail'];
    $field["date"] = date("Y-m-d H:i:s");
    $field["create_by"] = $_POST["txt_user_id"];
    $field["create_by_name"] = $_POST["txt_user_name"];
    $res = insert_sql("db_suggest", $field);
    if ($res) {

        $status = array();
        $status["id_suggest"] = $id_repair;
        $status["status"] = "รอดำเนินการ";
        $status["date"] = date("Y-m-d H:i:s");
        $status["create_by"] = $_POST["txt_user_id"];
        $res_status = insert_sql("db_suggest_status", $status);
        echo json_encode(array("response" => "1", "job" => $id_repair));


        // ------LINE Notification-----
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        // date_default_timezone_set("Asia/Bangkok");

        // $sToken = "BRgONy0QkCzTElrxo4FrsCeAbmMD6fIh6tnP014yUSb";
        // $sMessage = "\nวันที่: " . date("d-m-Y") . " \nเวลา: " . date("H:i:s") . "\nหมายเลขงาน: " . $id_repair . "\nหมายเลขห้อง: " . $_POST['txt_room'] . "\nรายละเอียด: " . $_POST['txt_detail'] . " \nหากดำเนินการเเล้วให้รายเข้าไปรายงานผลการดำเนินการที่ลิ้งค์ : " . "https://sos.oas.psu.ac.th/";

        // $chOne = curl_init();
        // curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        // curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($chOne, CURLOPT_POST, 1);
        // curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        // $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        // curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        // $result = curl_exec($chOne);

        // curl_close($chOne);

        // -------LINE PUSH--------
        // send($_POST["txt_user_id"], $id_repair);
    } else {
        echo json_encode(array("response" => "0"));
    }
}

function countId()
{
    global $connection;
    $res = mysqli_query($connection, "SELECT id_suggest FROM db_suggest ORDER BY id_suggest DESC  LIMIT 1");
    if (mysqli_num_rows($res) == 0) {
        return 'FED' . date("Y") . '0001';
    } else {
        $rw = mysqli_fetch_array($res);
        if (substr($rw['id_suggest'], 3, -4) == date("Y")) {
            $no = (substr($rw['id_suggest'], 7) * 1) + 1;
            $num = str_pad($no, 4, "0", STR_PAD_LEFT);
            return 'FED' . date("Y") . $num;
        } else {
            return 'FED' . date("Y") . '0001';
        }
    }
}


function send($id, $job_id)
{

    $accessToken = "Aw8O9fyE3tkTnune5FZ/bJxhvMOixLd+1h9eIAdMO7OU3KX84rkcJKjVawHAwmjEh2+4xuW8sx6usLi09yWgK68uquutpz8YZg3jTGbc7yMkBRoxP2IK+YuVQDOjTvlt9PwQIuYATts5eurtXjjz+wdB04t89/1O/w1cDnyilFU="; //copy ข้อความ Channel access token ตอนที่ตั้งค่า
    // $content = file_get_contents('php://input');
    // $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    //รับข้อความจากผู้ใช้
    // $message = $arrayJson['events'][0]['message']['text'];
    //รับ id ของผู้ใช้
    // $id = "Ud95e6ba1e93f3b0236622c899a26dd9c";
    #ตัวอย่าง Message Type "Text + Sticker"
    // if ($message == "สวัสดี") {
    $arrayPostData['to'] = $id;
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "ขอบคุณครับ\nคำร้องของท่านจะถูกส่งไปที่ผู้รับผิดชอบโดยตรงเเละนำไปดำเนินการโดยรวดเร็ว\nหมายเลขคำร้อง: " . $job_id . "";

    pushMsg($arrayHeader, $arrayPostData);
    // }
}

function pushMsg($arrayHeader, $arrayPostData)
{
    $strUrl = "https://api.line.me/v2/bot/message/push";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
}
exit;
