<?php
include("connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];

    // Validate the input (you can add more validation as needed)
    if (empty($user) || empty($password)) {
        echo '<script>alert("กรุณากรอกทุกช่อง");</script>';
    } else {
        // Query the database to check if the user exists
        $query = "SELECT * FROM account WHERE user = '$user' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit; // Important to stop further execution
        } else {
            // Login failed
            echo '<script>alert("เข้าสู่ระบบไม่สำเร็จ");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Mini Project</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

    <!-- Highcharts library -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- Datatable -->
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/a19fde44b7.js" crossorigin="anonymous"></script>


    <!-- export excel:XLS -->
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- export excel:XLS -->
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

</head>

<body>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <section class="vh-100 d-flex justify-content-center align-items-center">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-9 col-lg-6 col-xl-5 my-4">
                                <img src="../assets/img/avatars/Admin-bro.png" class="img-fluid" alt="Sample image" />
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 my-4">
                                <form method="post">
                                    <h2 class="text-center">
                                        Project management system
                                    </h2>
                                    <!-- User input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="user">อีเมล</label>
                                        <input type="text" id="text" name="user" class="form-control form-control-lg" value="admin" placeholder="ป้อนอีเมล" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="password">รหัสผ่าน</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" value="1234" placeholder="ป้อนรหัสผ่าน" />
                                    </div>

                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">เข้าสู่ระบบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Content Row -->


            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include("footer.php"); ?>
            <!-- / Footer -->