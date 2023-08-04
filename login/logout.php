<?php
if(isset($_POST['logout'])){
    session_start();
    session_destroy();
    echo json_encode(array("response" => "1"));
}
