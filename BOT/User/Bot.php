<?php
    require "Connection.php";
    
    $query = "SELECT contents FROM bot WHERE keyword LIKE ?";
    $sql_stmt = $conn->prepare($query);
    $sql_stmt->bind_param('s',$msg);
    $msg = "%".$_REQUEST['msg']."%";
    $sql_stmt->execute();
    $sql_stmt->bind_result($contents);
    if($sql_stmt->fetch())
    {
        echo $contents;
    }
    else{
        echo "Sorry, i didn't have knowledge about that.";
    }
?>