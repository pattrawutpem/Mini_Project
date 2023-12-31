<?php
include("connect.php");
$data = mysqli_query($conn, "select * from stock WHERE void = 0 ORDER BY s_id");

include("header.php"); ?>

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
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="customer.php" class="text-decolation">ข้อมูลสินค้า</a></li>
                            <!-- <li class="breadcrumb-item">Manage Users</li> -->
                        </ol>
                    </div>
                    <!-- /.content-header -->
                    <div class="row">
                        <div class="col-12 order-2 order-md-3 order-lg-2 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <a href="crud_product.php?xCase=1" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>เพิ่มสินค้า</a>
                                </div>
                                <div class="">
                                    <div class="card-body">
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" >#</th>
                                                    <th width="150px">สินค้า</th>
                                                    <th>หน่วยนับ</th>
                                                    <th>ราคา/หน่วย</th>
                                                    <th class="text-center" style="width: 200px;">จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (mysqli_num_rows($data) > 0) {
                                                    while ($row = mysqli_fetch_assoc($data)) {
                                                ?>
                                                        <tr>
                                                            <th class="text-center" style="width: 50px;">
                                                                <?php echo $row['s_id']; ?>
                                                            </th>
                                                            <th><?php echo $row['s_name'] ?>
                                                            <th><?php echo $row['s_unit'] ?>
                                                            <th><?php echo $row['s_price'] ?>
                                                            </th>
                                                            <td class="text-center">
                                                                <a href="crud_product.php?xCase=2&id=<?php echo $row['s_id'] ?>" name="btn_edit" class="btn btn-warning edit_sale"><i class="tf-icons bx bx-edit"></i></a>
                                                                <a href="crud_product.php?xCase=3&id=<?php echo $row['s_id'] ?>" name="btn_delete" class="btn btn-danger"><i class="tf-icons bx bx-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Revenue -->
                        </div>
                    </div>
                </div>
                <!-- / Content -->
                <script>
                    $.extend(true, $.fn.dataTable.defaults, {
                        "language": {
                            "sProcessing": "กำลังดำเนินการ...",
                            "sLengthMenu": "แสดง _MENU_ แถว",
                            "sZeroRecords": "ไม่พบข้อมูล",
                            "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                            "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                            "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                            "sInfoPostFix": "",
                            "sSearch": "ค้นหา:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "เิริ่มต้น",
                                "sPrevious": "ก่อนหน้า",
                                "sNext": "ถัดไป",
                                "sLast": "สุดท้าย"
                            }
                        },
                        "lengthMenu": [
                            [10, 15, 20],
                            [10, 15, 20],
                        ],
                    });
                    $('#myTable').DataTable({
                        order: [
                            [0, 'desc']
                        ]
                    });
                </script>

                <!-- Footer -->
                <?php include("footer.php"); ?>
                <!-- / Footer -->