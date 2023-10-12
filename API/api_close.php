<?php

use Mpdf\Tag\Select;

include("connect.php");

$case = $_GET['xCase'];
$id = $_GET['id'];
switch ($case) {
    case 1: //insert customer
        $headcode = $_POST['headcode'];
        $dateclose = $_POST['dateclose'];
        $project_id = $_POST['project_id'];
        $cost = $_POST['cost'];
        $pay = $_POST['pay'];
        $emp_id = $_POST['emp_id'];
        $comment = $_POST['comment'];

        $spl = mysqli_query($conn, "INSERT INTO project_close VALUES ('$headcode','$dateclose','$project_id','$cost','$pay','$emp_id', '$comment',0)");
        if (!$spl) {
            echo json_encode(array('title' => 'Unsuccessfully!', 'status' => 'error', 'message' => 'Inserted data is not success.'));
        } else {
            echo json_encode(array('title' => 'Successfully!', 'status' => 'success', 'message' => 'Inserted data is successfully.'));
        }
        break;
    case 2: //Update
        $dateclose = $_POST['dateclose'];
        $project_id = $_POST['project_id'];
        $cost = $_POST['cost'];
        $pay = $_POST['pay'];
        $emp_id = $_POST['emp_id'];
        $comment = $_POST['comment'];

        $spl = mysqli_query($conn, "UPDATE project_close SET project_id = '$project_id', cost = '$cost',pay = '$pay'
        ,emp_id = '$emp_id',comment = '$comment' WHERE headcode = $id");
        if (!$spl) {
            echo json_encode(array('title' => 'Unsuccessfully!', 'status' => 'error', 'message' => 'Inserted data is not success.'));
        } else {
            echo json_encode(array('title' => 'Successfully!', 'status' => 'success', 'message' => 'Inserted data is successfully.'));
        }
        break;
    case 3:
        $id = $_GET['id'];
        $spl = mysqli_query($conn, "UPDATE project_close SET void = '1' WHERE headcode = $id");
        if (!$spl) {
            echo json_encode(array('title' => 'Unsuccessfully!', 'status' => 'error', 'message' => 'Inserted data is not success.'));
        } else {
            echo json_encode(array('title' => 'Successfully!', 'status' => 'success', 'message' => 'Inserted data is successfully.'));
        }

        break;
    case 4:
        $headcode = mysqli_real_escape_string($conn, $_GET['id']);

        // SQL query to fetch project details
        $sql = "SELECT * FROM `project_hd`JOIN project USING(project_id) JOIN employee USING(emp_id) WHERE headcode  = '$headcode' AND project_hd.void = 0";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $project_id = $row['project_id'];
            $totalprice = $row['totalprice'];
            $project_name = $row['project_name'];
            $emp_id = $row['emp_id'];
            $project_end = $row['project_end'];
            $project_valueprice = $row['project_valueprice'];

            $projectData = [
                'project_id' => $project_id,
                'project_name' => $project_name,
                'emp_id' => $emp_id,
                'totalprice' => $totalprice,
                'project_end' => $project_end,
                'project_valueprice' => $project_valueprice,
            ];

            echo json_encode($projectData);
        } else {
            echo "ไม่สามารถดึงข้อมูลโครงการได้: " . mysqli_error($conn);
        }
}