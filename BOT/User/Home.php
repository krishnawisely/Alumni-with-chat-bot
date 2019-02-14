<?php
    //session_start();
    //if(!$_SESSION['username'])
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
        </style>
    </head>
    <body>
    <form method="post">
        <div id="bot-menu">
            <div>
                <img src="<?php echo $_COOKIE['pic']; ?>" width="" height="" />
            </div>
            <div style="margin-left:40px">
                <select id="nav_bar" onchange="navigate(this.value)">
                    <option>Navigation</option>
                    <option value="Bot_ajax.php">BOT</option>
                </select>
            </div>
            <div style="float:right;">
                    <button name="exit" id="exit">
                        EXIT
                    </button>
            </div>
            <div style="float:right;"><input style="font-size:15px;" type="text" onkeyup="Usersearch()" id='search_user' name="search_user" placeholder='Search user' /></div>
        </div>
    </form>
       <div id="user"></div>
    <script>
        function navigate(url){
            window.location.href=url;
        }
        function Usersearch()
        {
            var search_user = document.getElementById('search_user').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState == 4 && xhttp.status == 200)
                    {
                        document.getElementById("user").innerHTML = xhttp.responseText;
                    }
            };
            xhttp.open("GET","User_search.php?user="+search_user,true);
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