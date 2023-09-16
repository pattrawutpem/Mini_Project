<?php

use Mpdf\Tag\Select;

include("connect.php");

$case = $_GET['xCase'];
$id = $_GET['id'];
switch ($case) {
    case 1: //insert customer
        $datesave = $_POST['datesave'];
        $receiptcode = $_POST['receiptcode'];
        $project_id = $_POST['project_id'];
        $totalprice = $_POST['totalprice'];
        $status = $_POST['status'];

        $maxID = mysqli_query($conn, "SELECT MAX(headcode) AS id FROM projcost_hd ORDER BY headcode");
        if (mysqli_num_rows($maxID) > 0) {
            while ($row = mysqli_fetch_assoc($maxID)) {
                $id = $row['id'] + 1;
            }
        }

        $spl = mysqli_query($conn, "INSERT INTO projcost_hd VALUES ('$id','$datesave','$receiptcode','$totalprice','$status', 0)");
        if (!$spl) {
            echo json_encode(array('title' => 'Unsuccessfully!', 'status' => 'error', 'message' => 'Inserted data is not success.'));
        } else {
            echo json_encode(array('title' => 'Successfully!', 'status' => 'success', 'message' => 'Inserted data is successfully.'));
        }
        break;
    case 2: //Update
        $project_name = $_POST['project_name'];
        $cus_id = $_POST['cus_id'];
        $project_start = $_POST['project_start'];
        $project_end = $_POST['project_end'];
        $project_valueprice = $_POST['project_valueprice'];
        $emp_id = $_POST['emp_id'];
        $project_status = $_POST['project_status'];

        $spl = mysqli_query($conn, "UPDATE project SET project_name = '$project_name', cus_id = '$cus_id',project_start = '$project_start'
        ,project_end = '$project_end',project_valueprice = '$project_valueprice', emp_id = '$emp_id', project_status = '$project_status' Where project_id = $id");
        if (!$spl) {
            echo json_encode(array('title' => 'Unsuccessfully!', 'status' => 'error', 'message' => 'Inserted data is not success.'));
        } else {
            echo json_encode(array('title' => 'Successfully!', 'status' => 'success', 'message' => 'Inserted data is successfully.'));
        }
        break;
    case 3:
        $id = $_GET['id'];
        $spl = mysqli_query($conn, "UPDATE project SET void = '1' Where project_id = $id");
        if (!$spl) {
            echo json_encode(array('title' => 'Unsuccessfully!', 'status' => 'error', 'message' => 'Inserted data is not success.'));
        } else {
            echo json_encode(array('title' => 'Successfully!', 'status' => 'success', 'message' => 'Inserted data is successfully.'));
        }
        break;
    case 4:
        // $project_id = mysqli_real_escape_string($conn, $_GET['id']); // เปลี่ยน $_GET['id'] เป็น $_GET['project_id']

        // // คำสั่ง SQL เพื่อดึงชื่อโครงการ
        // $sql = "SELECT * FROM project JOIN customer USING(cus_id) WHERE project_id = '$project_id' AND project.void = 0";
        // $result = mysqli_query($conn, $sql);

        // if ($result) {
        //     $row = mysqli_fetch_assoc($result);
        //     $project_name = $row['project_name']; // เปลี่ยน $project_id เป็น $project_name
        //     $project_id = $row['project_id'];
        //     $cus_firstname = $row['cus_firstname'];
        //     $cus_lastname = $row['cus_lastname'];
        //     $project_valueprice = $row['project_valueprice'];
        //     echo $cus_firstname." ".$cus_lastname;
        // } else {
        //     echo "ไม่สามารถดึงข้อมูลโครงการได้: " . mysqli_error($conn);
        // }

        $project_id = mysqli_real_escape_string($conn, $_GET['id']); // Correct the variable name to 'project_id'

        // SQL query to fetch project details
        $sql = "SELECT * FROM project JOIN customer USING(cus_id) WHERE project_id = '$project_id' AND project.void = 0";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $project_name = $row['project_name'];
            $cus_firstname = $row['cus_firstname'];
            $cus_lastname = $row['cus_lastname'];
            $project_valueprice = $row['project_valueprice'];
            $project_fullname = $cus_firstname . ' ' . $cus_lastname;

            // Create an array to hold project data and echo it as JSON
            $projectData = [
                'project_id' => $project_id,
                'project_name' => $project_name,
          
                'project_fullname' => $project_fullname,
             
                'project_valueprice' => $project_valueprice
            ];

            echo json_encode($projectData);
        } else {
            echo "ไม่สามารถดึงข้อมูลโครงการได้: " . mysqli_error($conn);
        }
}
