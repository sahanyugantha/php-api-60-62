<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "mysql");
define("DATABASE", "air_db");

$conn = mysqli_connect(HOST,USER, PASSWORD, DATABASE) or 
        die("Couldn't connect to database");


?>