<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open page</title>
    <link rel="stylesheet" href="openpage.css">
</head>

<body class="body" background="background.jpg">
    <div class="head">WELCOME TO ONLINE MARKS INPUT SYSTEM</div> <br>
    <br>
    <form action="" method="POST">
        <label for="teacher_code"><b> Enter your code : </b></label>
        <input type="text" id="teacher_code" name="teacher_code" placeholder="Teacher_Id or Username">
        <br><br>
        <label for="teacher_code"><b> Enter your password : </b></label>
        <input type="password" placeholder="Password" name="password">
        <br> <br>
        <a href="inputpage.html"><button type="submit" class="button" value="submit" name="sub"><b><big>Login</big></b></button> </a>
    </form>
    <br>
    <div class="a">To register new , click <a href="Registerpage.html">HERE</a>

        <?php

        if (isset($_POST['sub'])) {
            $username = ($_POST['teacher_code']);
            $password = ($_POST['password']);

            $find = "select * from teacher where id='$username'AND password='$password' limit 1 ";

            $ique = mysqli_query($con, $find);

            $res = mysqli_num_rows($ique);

            if ($res == true) {
                header("location:https://www.youtube.com/watch?v=KwxSQx4lRSI");
            } else {
                echo "Wrong Password";
            }
        }
        ?>

</body>

</html>