<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="openpage.css">
</head>

<body class="body" background="background.jpg">
    <div class="head">WELCOME TO ONLINE MARKS INPUT SYSTEM</div> <br>
    <br>
    <form action="" method="POST">
        <label for="teacher_name"><b> Enter your name :</b></label>
        <input type="text" name="Name" placeholder="Name" size=35 maxlength=35 value="">
        <br><br>
        <label for="teacher_mail"><b> Enter your Mail-Id :</b></label>
        <input type="text" name="Email" placeholder="Username" size=35 maxlength=35 value="">
        <br><br>
        <label for="teacher_Id"><b> Enter your ID :</b></label>
        <input type="text" name="ID" placeholder="ID" size=35 maxlength=35 value="">
        <br><br>
        <label for="teacher_dept"><b>Enter your department :</b></label>
        <!-- <input type="" name="Dept" size=35 maxlength=35 value="">  -->
        <select name="Department" id="">
            <option value="">Select your department</option>
            <option value="B.Tech">B.Tech</option>
            <option value="B.Sc">B.Sc</option>
            <option value="B.Com">B.Com</option>
            <option value="B.A">BA</option>
            <option value="MCA">MCA</option>
            <option value="MTech">MTech</option>
            <option value="MSc">MSc</option>

        </select>
        <br> <br>
        <label for="password"><b>Enter your Password :</b></label>
        <input type="password" name="password" size=35 maxlength=20 value="" placeholder="Enter a new password">
        <br>
        <br>
        <input type=submit value="Register" class="button" name="regi">
        </div>
    </form>

    <?php
    if (isset($_POST['regi'])) {
        $tname = ($_POST['Name']);
        $tmail = ($_POST['Email']);
        $tid = ($_POST['ID']);
        $tdept = ($_POST['Department']);
        $passwo = ($_POST['password']);

        $insert = "insert into teacher values('$tname','$tmail','$tid','$tdept','$passwo')";

        $ique = mysqli_query($con, $insert);

        if ($ique) {
            echo "Insertion sucessful";
        } else {
            echo " No record inserted";
        }
    }

    ?>
</body>

</html>