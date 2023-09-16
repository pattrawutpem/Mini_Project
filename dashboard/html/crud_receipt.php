<?php
include("header.php");

$case = $_GET['xCase'];
if ($case == '1') {
    $header = 'บันทึกค่าใช้จ่ายโครงการ';
    $id = '';
    $result = mysqli_query($conn, "SELECT * FROM project WHERE void = 0");
} else if ($case  == '2') {
    $header = 'Edit';
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE cus_id ='$id' ");
    $row = mysqli_fetch_array($result);
    // print_r(md5($row['password']));
} else if ($case  == '3') {
    $header = 'Delete';
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE cus_id ='$id' ");
    $row = mysqli_fetch_array($result);
}

?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <!-- Menu -->
        <?php include("sidebar.php"); ?>
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
                            <li class="breadcrumb-item active"><a href="receipt.php" class="text-decolation">
                                    Receipt</a>
                            </li>
                            <!-- <li class="breadcrumb-item active"><a href="magUsers.php" class="text-decolation">Manage
                                    User</a></li> -->
                            <li class="breadcrumb-item"><?php echo $header; ?></li>
                        </ol>
                    </div>
                    <!-- /.content-header -->
                    <div class="row">
                        <div class="col-12 order-2 order-md-3 order-lg-2 mb-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3><?php echo $header; ?></h3>
                                </div>
                                <div class="card-body">
                                    <form id="formAccountSettings" action="../../API/api_receipt.php?xCase=<?php echo $case ?>&id=<?php echo $id ?>" method="POST">
                                        <div class="row">
                                            <div class="mb-2 col-lg-4 col-md-6 col-ms-12">
                                                <label for="datesave" class="form-label">วันที่บันทึก</label>
                                                <input type="date" class="form-control" name="datesave" id="datesave" value="<?php echo ($case == 1) ? '' : $row['datesave'] ?>" <?php echo ($case == '3') ? 'readonly' : 'required' ?>>
                                            </div>
                                            <div class="mb-2 col-lg-4 col-md-6 col-ms-12">
                                                <label for="receiptcode" class="form-label">เลขที่ใบเสร็จ</label>
                                                <input type="text" class="form-control" name="receiptcode" id="receiptcode" placeholder="เลขที่ใบเสร็จ" value="<?php echo ($case == 1) ? '' : $row['receiptcode'] ?>" <?php echo ($case == '3') ? 'readonly' : 'required' ?>>
                                            </div>
                                            <div class="mb-2 col-lg-4 col-md-6 col-ms-12">
                                                <label for="datereceipt" class="form-label">วันที่ใบเสร็จ</label>
                                                <input type="date" class="form-control" name="datereceipt" id="datereceipt" placeholder="วันที่ใบเสร็จ" value="<?php echo ($case == 1) ? '' : $row['datereceipt'] ?>" <?php echo ($case == '3') ? 'readonly' : 'required' ?>>
                                            </div>
                                            <div class="mb-2 col-lg-4 col-md-6 col-ms-12">
                                                <label for="project_id" class="form-label">รหัสโครงการ</label>
                                                <input type="text" class="form-control" id="project_id_display" placeholder="ชื่อโครงการ" readonly value="<?php echo ($case == 1) ? '' : $row['project_id'] ?>" <?php echo ($case == '3') ? 'readonly' : 'required' ?>>
                                                <!-- <div id="project_name_display"></div> -->
                                            </div>
                                            <div class="mb-2 col-lg-4 col-md-6 col-ms-12">
                                                <label for="datereceipt" class="form-label">ชื่อโครงการ</label>
                                                <select class="form-select" aria-label="Default select example" name="project_id" id="project_id" <?php echo ($case == '3' || $case == '4') ? 'disabled' : 'required' ?>>
                                                    <option selected disabled>ชื่อโครงการ</option>
                                                    <?php
                                                    foreach ($result as $rowselect) {
                                                        $isSelected = ($rowselect['project_id'] == $row['project_id']) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?php echo $rowselect['project_id']; ?>" <?php echo $isSelected; ?>>
                                                            <?php echo $rowselect['project_name']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-2 col-lg-4 col-md-6 col-ms-12">
                                                <label for="cus_id" class="form-label">ชื่อลูกค้า</label>
                                                <input type="text" class="form-control" name="cus_id" id="project_name_display" readonly>
                                            </div>
                                            <div class="mb-2 col-lg-4 col-md-6 col-ms-12">
                                                <label for="totalprice" class="form-label">มูลค่า</label>
                                                <input type="text" class="form-control" name="totalprice" id="project_price_display"readonly>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <?php
                                            echo ($case == '1') ?
                                                '<button type="submit" name="submit_frm" class="btn btn-success">Save</button> ' : (($case == '2') ?
                                                    '<button type="submit" name="submit_frm" class="btn btn-warning">Edit</button>' : (($case == '3') ?
                                                        '<button type="submit" name="submit_frm" class="btn btn-danger">Delete</button>' : ''))
                                            ?>
                                            <!-- <button type="submit" name="submit" class="btn btn-success">บันทึก</button> -->
                                            <a href="customer.php" class="btn btn-secondary ms-3">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/ Total Revenue -->
                    </div>
                </div>
                <!-- / Content -->

                <script>
                    // เลือกรหัสโครงการ
                    var projectSelect = document.getElementById('project_id');
                    // ช่องแสดงชื่อโครงการ
                    var projectNameInput = document.getElementById('project_name_display');
                    var projectNameInputID = document.getElementById('project_id_display');
                    var projectNameInputprice = document.getElementById('project_price_display');

                    // ใช้ addEventListener เพื่อดักเหตุการณ์การเลือกรหัสโครงการ
                    projectSelect.addEventListener('change', function() {
                        // หาค่าที่ถูกเลือก
                        var selectedOption = projectSelect.options[projectSelect.selectedIndex];
                        var selectedProjectID = selectedOption.value; // รหัสโครงการที่ถูกเลือก

                        // ส่งคำขอ AJAX ไปยังเซิร์ฟเวอร์เพื่อดึงชื่อโครงการ
                        $.ajax({
                            url: '../../API/api_receipt.php?xCase=4&id=' + selectedProjectID,
                            type: 'GET',
                            success: function(data) {
                                var projectData = JSON.parse(data);
                                projectNameInputID.value = selectedOption.value;
                                projectNameInput.value = projectData.project_fullname;
                                projectNameInputprice.value = projectData.project_valueprice;
                            }
                        });

                    });
                </script>

                <script>
                    $(document).ready(function() {
                        $("#formAccountSettings").submit(function(e) {
                            e.preventDefault();

                            let formUrl = $(this).attr("action");
                            let reqMethod = $(this).attr("method");
                            let formData = $(this).serialize();

                            $.ajax({
                                url: formUrl,
                                type: reqMethod,
                                data: formData,
                                success: function(data) {
                                    // console.log("Success", data);
                                    let result = JSON.parse(data);

                                    if (result.status == "success") {
                                        // console.log("Success", result);
                                        Swal.fire({
                                            icon: result.status,
                                            title: result.title,
                                            text: result.message,
                                            showConfirmButton: false,
                                            timer: 2500
                                        }).then(function() {
                                            window.location.href = "receipt.php";
                                        });
                                    } else {
                                        Swal.fire(result.title, result.message, result
                                            .status)
                                    }
                                }
                            })
                        })
                    })
                </script>

                <!-- Footer -->
                <?php include("footer.php"); ?>
                <!-- / Footer -->