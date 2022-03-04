<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th,
        td {
            border: 1px solid lightgray;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Student Data</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Registration_no</th>
                            <th>Autonomy_Roll_No</th>
                            <th>Paper_Code</th>
                            <th>External_Marks</th>
                            <th>Internal_Marks</th>
                            <th>Total_Marks</th>
                        </tr>
                    </thead>
                    <tbody id='target-data'>
                        <!-- <tr>
                            <td rowspan="2">Iti Bera</td>
                            <td rowspan="2">40333</td>
                            <td rowspan="2">1261901001</td>
                            <td>MCAP1011</td>
                            <td>55</td>
                            <td>25</td>
                            <td>80</td>
                        </tr>
                        <tr>

                            <td>MCAP1013</td>
                            <td>55</td>
                            <td>25</td>
                            <td>80</td>
                        </tr> -->




                    </tbody>
                </table>
                <!-- <div class="text-container">
                    <a href="student_data_download.php" class="btn btn-primary" target="_blank">Data Export</a>
                </div> -->
            </div>
        </div>
    </div>
    <script>
        $.ajax({
            url: "api_get_marks.php",
            type: "GET",
            data: {},
            cache: false,
            success: function(response) {
                var response = JSON.parse(response);
                // console.log(dataResult);
                //   console.log(response);
                if (response.statusCode == 200) {
                    // console.log(response.data);
                    setData(response.data);
                } else {
                    console.log(response.msg);
                }

            }
        });
        const setData = (data) => {
            var template = '';
            data.forEach(student => {
                for (var count = 0; count < student.marks.length; count++) {
                    if (count == 0) {
                        template = template + `<tr>
                            <td rowspan="${student.marks.length}">${student.name}</td>
                            <td rowspan="${student.marks.length}">${student.registration_no}</td>
                            <td rowspan="${student.marks.length}">${student.autonomy_roll}</td>
                            <td>${student.marks[count].paperCode}</td>
                            <td>${student.marks[count].externalMarks}</td>
                            <td>${student.marks[count].internalMarks}</td>
                            <td>${student.marks[count].total}</td>
                        </tr>`;

                    } else {
                        template = template + `<tr>

                             <td>${student.marks[count].paperCode}</td>
                             <td>${student.marks[count].externalMarks}</td>
                             <td>${student.marks[count].internalMarks}</td>
                             <td>${student.marks[count].total}</td>
                        </tr>`;
                    }
                }


            });
            const table = document.getElementById('target-data');
            table.innerHTML = template;
        }
    </script>

</body>

</html>
