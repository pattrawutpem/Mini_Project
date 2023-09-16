<?php
include("connect.php");
include("header.php");
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <!-- Menu -->
        <?php include("sidebar.php") ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

            <!-- Navbar -->
            <?php include("topbar.php"); ?>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                    </div>
                    <section class="content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 class="text-white " style="font-weight: 600;">
                                            <?php
                                            $result = mysqli_query($conn, 'SELECT SUM(subtotal) AS value_sum FROM invoices WHERE status = "paid"');
                                            $row = mysqli_fetch_assoc($result);
                                            $sum = $row['value_sum'];
                                            echo $sum;
                                            ?>
                                        </h3>
                                    </div>
                                    <h5 class="text-white">Sales Amount</h5>
                                    <div class="icon">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box" style="background-color:mediumpurple">
                                    <div class="inner">
                                        <h3 class="text-white " style="font-weight: 600;">
                                            <?php

                                            $sql = "SELECT * FROM invoices";
                                            $query = $conn->query($sql);

                                            echo "$query->num_rows";
                                            ?></h3>

                                        <h5 class="text-white">Total Invoices</h5>

                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-print"></i>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 class="text-white " style="font-weight: 600;">
                                            <?php

                                            $sql = "SELECT * FROM invoices WHERE status = 'open'";
                                            $query = $conn->query($sql);

                                            echo "$query->num_rows";
                                            ?></h3>

                                        <h5 class="text-white">Pending Bills</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-duotone fa-loader"></i>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3 class="text-white " style="font-weight: 600;">
                                            <?php
                                            $result = mysqli_query($conn, 'SELECT SUM(subtotal) AS value_sum FROM invoices WHERE status = "open"');
                                            $row = mysqli_fetch_assoc($result);
                                            $sum = $row['value_sum'];
                                            echo $sum;
                                            ?></h3>

                                        <h5 class="text-white">Due Amount</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                        <!-- 2nd row -->
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box" style="background-color:royalblue">
                                    <div class="inner">
                                        <h3 class="text-white " style="font-weight: 600;">
                                            <?php
                                            $sql = "SELECT * FROM products WHERE void = 0 ";
                                            $query = $conn->query($sql);

                                            echo "$query->num_rows";
                                            ?></h3>

                                        <h5 class="text-white">Total Products</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-brands fa-dropbox"></i>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box" style="background-color:palevioletred">
                                    <div class="inner">
                                        <h3 class="text-white " style="font-weight: 600;">
                                            <?php
                                            $sql = "SELECT * FROM store_customers";
                                            $query = $conn->query($sql);

                                            echo "$query->num_rows";
                                            ?></h3>

                                        <h5 class="text-white">Total Customers</h5>
                                    </div>

                                    <div class="icon">
                                        <i class="fa-solid fa-users"></i>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box" style="background-color:darkcyan">
                                    <div class="inner">
                                        <h3 class="text-white " style="font-weight: 600;">
                                            <?php
                                            $sql = "SELECT * FROM invoices WHERE status = 'paid'";
                                            $query = $conn->query($sql);

                                            echo "$query->num_rows";
                                            ?></h3>

                                        <h5 class="text-white">Paid Bills</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-regular fa-newspaper"></i>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- /.content -->
                </div>
            </div>
        </div>
        <!-- / Content -->
        <!-- Footer -->
        <?php include("footer.php"); ?>
        <!-- / Footer -->