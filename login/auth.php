<?php
include_once('../config/db_conect.php');
include_once('../assets/nusoap.php');


if (isset($_POST['username'])) {
    $user = str_replace(' ', '', $_POST['username']);
    $password = $_POST['password'];

    if (!empty($user) && !empty($password)) {
        $login = false;

        $query = mysqli_prepare($connection, "SELECT * FROM user");
        mysqli_stmt_execute($query); //execute statement
        $result = mysqli_stmt_get_result($query); //get only result

        while ($row = mysqli_fetch_array($result)) {
            if ($row["user_name"] == $_POST['username'] && $row["password"] == $_POST['password']) {
                $login = true;
                session_start();
                $_SESSION['login'] = 'true';
                $_SESSION['username'] = $row["first_name"] . ' ' . $row["last_name"];
                $_SESSION['user_id'] = $row["user_id"];

                $token = hash("md5", time());
                $_SESSION['token'] = $token;
                $condition = "user_id = '" . $row["user_id"] . "'";
                break;
            }
        }
        if ($login) {
            echo json_encode(array("response" => "1", "token" => $token));
        } else {
            $result = lib_psulogin_wsdl($user, $password);


            // var_dump($result);
            if ($result != NULL) {

                // $sql = "SELECT * FROM user WHERE user_name ='" . $user . "'";
                // $u = mysqli_query($connection, $sql);
                // if (mysqli_num_rows($u) == 0) {
                //     $id = getId();

                //     $field = array();
                //     $field["user_id"] = $id;
                //     $field["user_name"] = $user;
                //     $field["first_name"] = $result[2];
                //     $field["last_name"] = $result[3];
                //     $field["email"] = $result[8];
                //     $field["faculty"] = $result[5];
                //     $field["img"] = "profile.png";
                //     $field["token"] = hash("md5", time());
                //     $field["type_login"] = "PSU Passport";
                //     $res = insert_sql("user", $field);

                //     $field = array();
                //     $field["user_id"] = $id;
                //     $field["role_id"] = '2';

                //     $res = insert_sql("user_role", $field);
                // }
                $sql2 = "SELECT * FROM user WHERE user_name ='" . $user . "'";
                $u2 = mysqli_query($connection, $sql2);
                while ($d = mysqli_fetch_array($u2)) {
                    if ($d['user_name'] == $user) {
                        session_start();
                        $_SESSION['login'] = 'true';
                        $_SESSION['username'] = $d['first_name'] . ' ' . $d['last_name'];
                        $_SESSION['user_id'] = $d["user_id"];
                        $_SESSION["salt"] = hash("md5", time());

                        $token = hash("md5", time());
                        $_SESSION['token'] = $token;
                        $condition = "user_id = '" . $d["user_id"] . "'";
                    } else {
                        echo json_encode(array("response" => "202"));
                    }
                }
                echo json_encode(array("response" => "1", "token" => $token));
            } else {
                echo json_encode(array("response" => "false"));
            }
        }
    }
}

// if(isset($_POST)){
//     $login = false;
//     $user = str_replace(' ', '', $_POST['username']);
//     $password = $_POST['password'];

//     $check_user = mysqli_prepare($connection, "SELECT * FROM user WHERE user_name= ?");
//     mysqli_stmt_bind_param($check_user, "s", $user);
//     mysqli_stmt_execute($check_user);
//     $result_user = mysqli_stmt_get_result($check_user);

//     $result = lib_psulogin_wsdl($user,$password);
//     if($result != NULL){

//         session_start();
//         $token =hash("md5", time());
//         $_SESSION['login'] = 'true';
//         $_SESSION['user_name'] = $user;
//         $_SESSION['fname'] = $result[2];
//         $_SESSION['lname'] = $result[3];
//         echo json_encode(array("response" => "1" ,"token" => $token));

//     }else if(){

//     }else{
//         echo json_encode(array("response" => "false"));
//     }

// }



function lib_psulogin_wsdl($id, $password)
{
    $client = new nusoap_client('https://passport.psu.ac.th/authentication/authentication.asmx?WSDL', true);
    $err = $client->getError();
    if ($err) {
        $str_return =  $err;
    }
    $client->soap_defencoding = 'UTF-8';
    $client->decode_utf8 = false;
    $result = $client->call('GetUserDetails', array('username' => $id, 'password' => $password));
    $err = $client->getError();
    if ($err) {
        return null;
    }
    $proxy = $client->getProxy();
    $person = array('username' => $id, 'password' => $password);
    $result = $proxy->Authenticate($person);
    $xxxresult = $proxy->GetUserDetails($person);

    if ($proxy->fault) {
        $str_return = $result;
        //print_r($str_return);
    } else {
        $err = $proxy->getError();
        if ($err) {
            $str_return =  $err;
            echo $str_return;
        } else {
            $login = $result['AuthenticateResult'];
        }
    }

    $prefix = $xxxresult['GetUserDetailsResult']['string'][12];
    $name = $xxxresult['GetUserDetailsResult']['string'][1];
    $sname = $xxxresult['GetUserDetailsResult']['string'][2];
    $idStaff = $xxxresult['GetUserDetailsResult']['string'][3];
    $id_cart = $xxxresult['GetUserDetailsResult']['string'][5];
    $faculty = $xxxresult['GetUserDetailsResult']['string'][8];
    $gender = $xxxresult['GetUserDetailsResult']['string'][4];
    $email = $xxxresult['GetUserDetailsResult']['string'][13];

    //list($login,$name,$sname,$staff_id,$sex,$per_id,$a7,$a8,$fac_name,$a10,$campus_name,$a12,$title_name,$email,$a15) = $xxxresult;

    $return = array($login, $prefix, $name, $sname, $id_cart, $faculty, $gender, $idStaff, $email);
    return $return;
}