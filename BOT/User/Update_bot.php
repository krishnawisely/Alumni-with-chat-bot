<!DOCTYPE html>
<html>
    <head>
        <title>
            CONTROLL PANNEL
        </title>
    </head>
    <body>
    <table>
        <form method="post">
            <tr><td>KEYWORDS</td><td>ACKNOWLEDGEMENT</td></tr>
            <tr><td><input type="text" name="keyword" /></td><td><input type="text" name="content" /></td></tr>
            <tr><td><input type="submit" name="ok" /></td></tr>
        </form>
    </table>
    </body>
</html>
<?php
    require "Connection.php";
    //header('Content-Type:text/html;charset=UTF-8');
    if(isset($_POST['ok']))
    {
        $query = "INSERT INTO bot(keyword,contents) VALUES(?,?)";
        $sql_stml = $conn->prepare($query);
        $sql_stml->bind_param('ss',$keyword,$content);
        $keyword = strtoupper($_POST['keyword']);
        $content = $_POST['content'];
        $sql_stml->execute();
    }
?>