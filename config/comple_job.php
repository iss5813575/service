<?php
include_once('./db_conect.php');

session_start();
if (isset($_POST['complete_job_fast_repair'])) {


    $job_id = $_POST['complete_job_fast_repair'];

    $status = array();
    $status["id_repair"] = $job_id;
    $status["status"] = "ดำเนินการเรียบร้อย";
    $status["date"] = date("Y-m-d H:i:s");
    $status["create_by"] = $_SESSION['user_id'];
    $status["worker"] = $_POST["txt_worker"];
    $status["detail_worker"] = $_POST["txt_detail"];
    $res_status = insert_sql("db_fast_status", $status);

    $data = getData("db_fast_repair","id_repair", $job_id);
    $data_create = mysqli_fetch_array($data, MYSQLI_ASSOC);
    if($res_status){
        send($data_create["create_by"], $job_id);
        echo json_encode(array("response" => "1"));
    }
    else{
        echo json_encode(array("response" => "0"));   
    }
}else{
    echo json_encode(array("response" => "0"));
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
    $arrayPostData['messages'][0]['text'] = "การเเจ้งของท่านดำเนินการเรียบร้อยเเล้ว ขอบคุณครับ\nหมายเลขการเเจ้ง: " . $job_id . "";

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