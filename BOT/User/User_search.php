<?php
    require 'Connection.php';
    
    $query = "SELECT Username,Pic_url,email,Institution,Working_at,Living_at FROM users WHERE Username LIKE ? AND NOT Username = ?";
    $sql_stmt = $conn->prepare($query);
    $sql_stmt->bind_param('ss',$user,$cur_user);
    $user = $_REQUEST['user']."%";
    $cur_user = $_COOKIE['username'];
    $sql_stmt->execute();
    $sql_stmt->bind_result($username,$pic,$email,$institution,$workingat,$livingat);
    
    if($sql_stmt->fetch())
    {
        echo "<center>";
        echo "<table style='font-size:20px;color:darkgreen;box-shadow:0px 3px 5px 0px rgba(0,0,0,0.5);font-family: Courier New';";
        echo "<tr><td colspan='3' style='text-align:center;background-color:lightgray;'><img src=".$pic." width='70px' height='70px' style='border-radius:10%;'/></td></tr>";
        echo "<tr><td colspan='3' style='text-align:center;background-color:lightgray;'><b>".$username."</b></td></tr>";
        echo "<tr><td>Institution</td><td>:</td><td>".$institution."</td></tr>";
        echo "<tr><td>E-mail</td><td>:</td><td>".$email."</td></tr>";
        echo "<tr><td>Working at</td><td>:</td><td>".$workingat."</td></tr>";
        echo "<tr><td>Living at</td><td>:</td><td>".$livingat."</td></tr>";
        echo "</table>";
        echo "</center>";
    }
   
?>