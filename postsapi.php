<?php

//  HTTP METHODS
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        ob_start();//starting the buffer for write header
        header("Content-type:application/json");  // setting up JSON header.
        echo json_encode(fetchDashboardData(), JSON_PRETTY_PRINT); // encoding php array to JSON format.
        ob_end_flush(); // end the buffer.

    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "HTTP <b>POST</b> METHOD DETECTED";
    }

    if($_SERVER["REQUEST_METHOD"] == "PUT"){
        echo "HTTP <b>PUT</b> METHOD DETECTED";
    }

    if($_SERVER["REQUEST_METHOD"] == "DELETE"){
        echo "HTTP <b>DELETE</b> METHOD DETECTED";
    }


    //Fetch the data from database
    function fetchDashboardData(){

        require_once("dbconn.php");
        $sql = "SELECT `id`, `company`, `flight_no`, `type`, `from`, `to`, `time` FROM `tbl_dashboard`";

        $stmt = mysqli_prepare($conn, $sql);

        $response = mysqli_stmt_execute($stmt);
        if($response){
            mysqli_stmt_store_result($stmt);
            $num_rows = mysqli_stmt_affected_rows($stmt);
            if($num_rows > 0){
                mysqli_stmt_bind_result($stmt, $id, $company, $flight_no, $type, $from, $to, $time);

                $dataArray = array();
                while(mysqli_stmt_fetch($stmt)){
                    $row = array();
                    $row['id'] = $id;
                    $row['company'] = $company;
                    $row['flight_no'] = $flight_no;
                    $row['type'] = $type;
                    $row['from'] = $from;
                    $row['to'] = $to;
                    $row['time'] = $time;

                    array_push($dataArray, $row);
                }

               return $dataArray;

            } else {
                return array("message" => "No records found");
            }
        } else {
            return array("message" => "Database error, please contact admin");
        }

    }


?>