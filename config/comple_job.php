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

    if($res_status){
        echo json_encode(array("response" => "1"));
    }
    else{
        echo json_encode(array("response" => "0"));   
    }
}else{
    echo json_encode(array("response" => "0"));
}