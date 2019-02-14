<!DOCTYPE html>
<html>
    <head>
        <title>
            Signin
        </title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="/bot/CSSFiles/Signin.css">
        <style>
        
            #psd div{
                float:left;
            }
            #img{
                margin-left:-30px;
            }
            #bot-menu{
                position:absolute;
                background-image:linear-gradient(blue,darkblue);
                color:white;
                font-size:20px;
                padding:10px;
                border-radius:50%;
                left:0;
                top:0;
                box-shadow:0px 3px 10px 0px rgba(0,0,0,0.5); 
            }
        </style>
    </head>
    <body>
        <div id="bot-menu">@</div>
        <form method="post">
            <div id="signin-pannel">
                <div><input type="text" id="username" name="username" autocomplete="off" placeholder="Username..." autofocus/></div>
                <div id="psd">
                    <div><input type="password" id="password" name="password" placeholder="Password..." /></div>
                    <div id="img"><img src="/BOT/icons/eye.png" width="30px" height="30px" /></div>
                </div>
                <div><input type="submit" id="submit-btn" name="signin" value="Signin" /></div>
                <div><a href="Signup.php">Signup</a></div>
                <div style="display:none;color:red;font-size:20px;" id="msg">Invalid username or password!</div>
            </div>
        </form>
        <script>
                img.addEventListener('mouseover',function(){
                    document.getElementById('password').type = 'text';
                });
        </script>
    </body>
</html>
<?php

            require "Connection.php";
            //session_start();
            if(isset($_POST['signin']))
            {
            $query = "SELECT Username,Pic_url FROM users WHERE Username=? AND Password=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ss',$user_name,$password);
            $user_name = $_POST['username'];
            $password = $_POST['password'];
            $stmt->execute();
            $stmt->bind_result($user,$pic);
            if($stmt->fetch())
            {
                header('location:Home.php');
                setcookie("username",$user,time()+(60*30),"/");
                setcookie("pic",$pic,time()+(60*30),"/");
            }
            else{
                echo "<script>document.getElementById('msg').style.display = 'block';</script>";
            }
        }


?>