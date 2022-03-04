<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="openpage.css">
</head>

<body>

    <div class="head">WELCOME TO ONLINE MARKS INPUT SYSTEM</div> <br>
    <br>
    <form action="" method="POST">
        <label for="student_name"><b> Enter Student's name :</b></label>
        <input type="text" name="Name" size=35 maxlength=35 value="" required>
        <br><br>
        <label for="college_roll"><b> Enter College Roll_no :</b></label>
        <input type="number" name="college_roll" size=35 maxlength=35 value="" required>
        <br><br>
        <label for="auto_roll"><b> Enter Autonomy Roll-no:</b></label>
        <input type="number" name="auto_roll" maxlength=35 value="" required>
        <br><br>
        <label for="univ_reg"><b> Enter University Regn_no:</b></label>
        <input type="number" name="univ_reg" size=35 maxlength=35 value="" required>
        <br><br>
        <label for="dept_code"><b>Enter dept_code :</b></label>
        <select name="Department" id="" required>
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
        <label for="year_of_admission"><b> Enter Year of Admission : </b></label>
        
        <select name="Year_of_admission" id="" required>
            <option value=""> Year </option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
        </select>
        <br> <br>
        <label for="year_of_passout"><b> Enter Year of Passout : </b></label>

        <select name="year_of_passout" id="" required>
            <option value=""> Year </option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
        </select>
        <br><br>
        <label for="exam_type"><b> Enter Student Type :</b></label>
        <select name="type" id="" required>
            <option value="2010">Regular</option>
            <option value="2011">Backlog</option>
            <option value="2012">SSE</option>
        </select>
        <br><br>
        <input name="regbutton" type="submit" class="button1" value="Registration" onclick="Done()">

        <a href="inputpage.html" class="button"> Go to homepage </a>

        </div>
    </form>
    <?php
    if (isset($_POST['regbutton'])) {
        $sname = ($_POST['Name']);
        $croll = ($_POST['college_roll']);
        $aroll = ($_POST['auto_roll']);
        $ureg = ($_POST['univ_reg']);
        $dept = ($_POST['Department']);
        $yoa = ($_POST['Year_of_admission']);
        $yop = ($_POST['year_of_passout']);

        $insert = "INSERT INTO student (`name`, `college_roll_no`, `registration_no`, `autonomy_roll`, `dept_code`, `year_of_joining`, `year_of_passout`) values('$sname','$croll','$ureg','$aroll','$dept','$yoa','$yop')";

        $ique = mysqli_query($conn, $insert);

        if ($ique) {
            echo "Insertion sucessful";
        } else {
            echo " No record inserted";
        }
    }

    ?>

</body>

</html>