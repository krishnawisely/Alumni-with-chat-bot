<!DOCTYPE html>
<html>
    <head>
        <title>
            Signup
        </title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
        #signup-pannel{
            position: absolute;
            left:50%;
            top:10%;
            transform:translate(-50%,-10%);
            font-family: sans-serif;
            font-size:20px;
            color:orange;
            text-align:center;
        }
        #signup-pannel div{
            margin-top:10px;
        }
        #signup-btn{
            background-color:blue;
            color:white;
            font-size:20px;
            border-radius:10%;
            border:none;
        }
        </style>
    </head>
    <body>
    <form method="post" enctype="multipart/form-data">
    <div id="signup-pannel">
        <div>Username</div>
        <div><input type="text" name="username" required autofocus/></div>
        <div>Password</div>
        <div>
            <input type="password" id="password" name="password" required/>
            <meter style="display:none" id="password_meter" value="0" low="5" high="9" optimum="10" max="15" max-length="15"></meter>
        </div>
        <div>DOB</div>
        <div><input type="date" name="dob" required /></div>
        <div>Picture</div>
        <div><input type="file" name="pic" required /></div>
        <div>Institution</div>
        <div><input type="text" name='institution' /></div>
        <div>Year of passed out</div>
        <div>
            <select name='passedout'>
                <option value=''>--SELECT--</option>
                <option value='2016'>2016</option>
                <option value='2017'>2017</option>
                <option value='2018'>2018</option>
            </select>
        </div>
        <div>E-mail</div>
        <div><input type="email" name='email' /></div>
        <div>Department</div>
        <div><select name='department'>
        <option>--SELECT--</option>
        <option value='CSE'>CSE</option>
        <option value='ECE'>ECE</option>
        <option value='EEE'>EEE</option>
        <option value='CIVIL'>CIVIL</option>
        <option value='MECH'>MECH</option>
        <option value='AUTOMOBILE'>AUTOMOBILE</option>
        </select></div>
        <div>Working at</div>
        <div><input type='text' name='workingat'/></div>
        <div>Living at</div>
        <div><input type="text" name="livingat"></div>
        <div><input type="submit" id="signup-btn" name="signup_btn" value="Signup" /></div>
</div>
    <form>
        <script>
        var meter=document.getElementById("password_meter");
        var password_length=0;
        password.addEventListener('keyup',function()
        {
            meter.style.display="block";
            password_length=password.value.length;
            password_meter.value=password_length;
            
        });
        </script>
    </body>
</html>
<?php
    
    require "Connection.php";

    if(isset($_POST['signup_btn']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $DOB = $_POST['dob'];
        $pic = $_FILES['pic']['name'];
        $institution = $_POST['institution'];
        $passedout = $_POST['passedout'];
        $workingat = $_POST['workingat'];
        $livingat = $_POST['livingat'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        if($pic)
        {
            $pic_destination = "C:/xampp/htdocs/BOT/User/PIC/user_".$pic;
            $pic_location = "\BOT\User\PIC\user_".$pic;
            move_uploaded_file($_FILES['pic']['tmp_name'],$pic_destination);
        }
        $query = "INSERT INTO users(Username,Password,DOB,Pic_url,Passedout,Institution,Working_at,Living_at,email,department) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $sql_stmt = $conn->prepare($query);
        $sql_stmt->bind_param('ssssssssss',$username,$password,$DOB,$pic_location,$passedout,$institution,$workingat,$livingat,$email,$department);
        $sql_stmt->execute();
        if($sql_stmt)
        {
            header('location:Signin.php');
        }
        else{
            echo "<div>ERROR!</div>";
        }
    }

?>