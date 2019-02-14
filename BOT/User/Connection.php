<?php

    define("hostname","localhost");
    define("username","root");
    define("password","");
    define("db_name","bot");

    $conn = mysqli_connect(hostname,username,password,db_name) OR die("Conntion error!");

?>