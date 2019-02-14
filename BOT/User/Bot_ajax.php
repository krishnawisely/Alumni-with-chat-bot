<?php
    if(!$_COOKIE['username'])
    {
        header('location:Signin.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
            #bot-menu{
                position:sticky;
                top:0;
                overflow:hidden;
                box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.5);
                margin-left:0;
                width:100%;
                z-index:1;
            }
            #bot-menu div{
                float:left;
                display:block;
                font-size:30px;
                font-family: 'Courier New', Courier, monospace;
                color:black; 
            }
            #bot-menu div img{
                position:absolute;
                max-height:40px;
                max-width:40px;
            }
            #exit{
                background-color:inherit;
                border:none;
                font-size:20px;
                color:black;
            }
            #content{
                margin-top:10px;
                position:relative;
            }
            #request{
                left:0;
                position:absolute;
                bottom:1%;
                width:80%;
                height:6%;
                border:none;
                box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.5);
                font-size:20px;
            }
            #hit{
                position:absolute;
                background-color:inherit;
                bottom:1%;
                right:0;
                font-size:20px;
                width:20%;
                height:7%;
                border:none;
                box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.5);
            }
            #msg{
                background-color:darkblue;
                color:white;
                font-size:20px;
                font-family:sans-serif;
                border-radius:5%;
                box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.5);
                position:absolute;
            }
        </style>
    </head>
    <body>
    <div id="bot-menu">
        <div>
            <img src="<?php echo $_COOKIE['pic']; ?>" width="" height="" />
        </div>
        <div style="margin-left:40px;">
        <select id="nav_bar" onchange="navigate(this.value)">
                    <option>Navigation</option>
                    <option value="Home.php">HOME</option>
        </select>
        </div>
        <div style="float:right;">
            <form method="post">
                <button name="exit" id="exit">
                    EXIT
                </button>
            </form>
        </div>
    </div>
    
        <div id="content">
            <div id="msg"></div>
        </div>
            <div><input type="text" id="request" placeholder="Type here..."><input type="submit" onclick="bot()" name="hit" id="hit" value="HIT" /></div>
        
    <script>
        function navigate(url)
        {
            window.location.href = url;
        }
        function bot()
        {
            var msg = document.getElementById('request').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState == 4 && xhttp.status == 200)
                    {
                        document.getElementById("msg").innerHTML = xhttp.responseText;
                    }
            };
            xhttp.open("GET","Bot.php?msg="+msg,true);
            xhttp.send();
        }
    </script>
    </body>
</html>
<?php
    if(isset($_POST['exit']))
    {
        //session_destroy();
        setcookie('username','',time()-1800,"/");
        setcookie('pic','',time()-1800,"/");
        header('location:Signin.php');
    }
?>