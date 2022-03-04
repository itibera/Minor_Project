<?php

include 'db.php';

$studentQuery = "SELECT  
`student`.`name`, 
`student`.`registration_no`, 
`student`.`autonomy_roll`
FROM student";
$studentQueryResult = $conn->query($studentQuery);//name,registration,autonomy || all student name,registration_no,autonomy_roll

if ($studentQueryResult->num_rows > 0) {

    $data = [];
    while ($row = $studentQueryResult->fetch_assoc()) {
        $name = $row["name"];//Iti Bera
        $registration_no = $row["registration_no"];//30444
        $autonomy_roll = $row["autonomy_roll"];//1261901001

        $marksQuery = "SELECT * FROM marks 
                        WHERE `marks`.`autonomy_roll`='$autonomy_roll'";
        $marksQueryResult = $conn->query($marksQuery); // autonomy_roll, paper_code, external_marks, internal_marks, total_marks

        $marks = [];
        while ($row = $marksQueryResult->fetch_assoc()) {
            $papers = array(
                "paperCode" => $row["paper_code"],
                "externalMarks" => $row["external_marks"],
                "internalMarks" => $row["internal_marks"],
                "total" => $row["total_marks"]
            );
            array_push($marks, $papers);
        }
        

        $studentData = array(
            "name" => $name,
            "registration_no" => $registration_no,
            "autonomy_roll" => $autonomy_roll,
            "marks" => $marks
        );
        array_push($data, $studentData);
    }
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $data));
} else {
    echo json_encode(array("statusCode" => 201, "msg" => "Failed"));
}

