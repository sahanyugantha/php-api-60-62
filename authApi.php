<?php

require_once("dbconn.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = urldecode($_POST['uemail']);
    $password = urldecode($_POST['upassword']);


    $sql = "SELECT * FROM `tbl_user` WHERE `email`= ? AND `password`= ?";
    $stmt = mysqli_prepare($conn,$sql);

    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    $res = mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id, $email, $passoword, $username, $role);

    if($res){
        mysqli_stmt_store_result($stmt);
        $num_rows =  mysqli_stmt_affected_rows($stmt);
        if($num_rows > 0){
            ob_start();//starting the buffer for write header
            header("Content-type:application/json");  // setting up JSON header.
           // echo json_encode(array("message"=>"SUCCESS"), JSON_PRETTY_PRINT);
            while(mysqli_stmt_fetch($stmt)){
                echo json_encode(
                    array(
                        "message"=>"SUCCESS",
                        "user"=>
                                array(
                                    "id"=>$id,
                                    "email"=>$email,
                                    "password"=>$passoword,
                                    "username"=>$username,
                                    "role"=>$role,
                                )
                    )
                );
            }
            ob_end_flush(); // end the buffer.
        } else {
            ob_start();//starting the buffer for write header
            header("Content-type:application/json");  // setting up JSON header.
            echo json_encode(array("message"=>"FAILED"), JSON_PRETTY_PRINT);
            ob_end_flush(); // end the buffer.
        }
    } else {
        ob_start();//starting the buffer for write header
        header("Content-type:application/json");  // setting up JSON header.
        echo json_encode(array("message"=>"Error at query"), JSON_PRETTY_PRINT);
        ob_end_flush(); // end the buffer.
    }

}
