<?php
include 'db.php';


$studentData = $_POST['studentData'];

$statusMsg = $errorMsg = $insertMarksValue = $insertStudentsValue = '';
foreach ($studentData as $key => $val) {
  $name = $val['name'];
  $registration = $val['registration_no'];
  $autonomy = $val['autonomy_roll_no'];
  $papers = $val['papers'];

  foreach ($papers as $k => $v) {
    $code = $v['code'];
    $external = $v['external'];
    $internal = $v['internal'];
    $total = $v['total'];

    $insertMarksValue .= "('" . $autonomy . "', '" . $code . "', '" . $external . "', '" . $internal . "', '" . $total . "'),";
  }

  $insertStudentsValue .= "('" . $name . "', '" . $registration . "', '" . $autonomy . "'),";
}
if (!empty($insertMarksValue) and !empty($insertStudentsValue)) {
  $insertMarksValue = trim($insertMarksValue, ',');
  $insertStudentsValue = trim($insertStudentsValue, ',');

  $insertStudent = $conn->query("INSERT INTO student (`name`, `registration_no`, `autonomy_roll`) VALUES $insertStudentsValue");
  $insertMarks = $conn->query("INSERT INTO marks (`autonomy_roll`, `paper_code`, `external_marks`, `internal_marks`, `total_marks`) VALUES $insertMarksValue");


  if ($insertStudent and $insertMarks) {
    echo json_encode(array("statusCode" => 200, "msg" => "Success!! Data has been inserted."));
  } else {
    echo json_encode(array("statusCode" => 201, "msg" => "Failed!!"));
  }
}
