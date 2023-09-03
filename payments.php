<?php
session_start();
$email_address = $_SESSION['email'];
include('config/database.php');
if (empty($email_address)) {
    header("location:index.php");
}

// 

$cat = !empty($_GET['cat']) ? $_GET['cat'] : '';
$subcat = !empty($_GET['subcat']) ? $_GET['subcat'] : '';
if ($cat == 'website-setting' && $subcat == 'add-website-menu') {

    include('scripts/multilevel-script.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--custom style-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JQuery DataTable Css -->
    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">


</head>

<body>
    <?php
    include('partials/header.php');
    ?>
    <div id="confirmBox">
        <p>Are You Sure to Delete ?</p>
        <button value="1">Yes</button><button value="0">No</button>
    </div>
    <div id="alertBox">mhvmbvbm</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php include('partials/sidebar.php'); ?>
            </div>
            <div class="col-sm-10">
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    MPESA PAYMENTS
                                </h2>
                                <!-- <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul> -->
                            </div>
                            <div class="body">

                                <div class="progress" id="progress">
                                    <div class="progress-bar bg-pink progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        REFRESH PAGE FOR LATEST
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="transactions">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Trans ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Time</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Trans ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Time</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $sql1 = "SELECT * FROM mpesa_payments ORDER BY TransTime DESC";
                                            $res1 = $conn->query($sql1);
                                            if ($res1->num_rows > 0) {
                                                $i = 1;
                                                while ($data = $res1->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $data['TransID']; ?></td>
                                                        <td><?php echo $data['FirstName'] . $data['LastName']; ?></td>
                                                        <td><?php echo $data['MSISDN']; ?></td>
                                                        <td><?php echo $data['TransAmount']; ?></td>
                                                        <td><?php echo $data['TransTime']; ?></td>

                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                            } else {

                                                ?>
                                                <tr>
                                                    <td colspan="6">No Data</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Exportable Table -->
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#transactions').DataTable({

                //"order": [[ 5, "desc" ]],
                dom: 'Bfrtip',
                //jQueryUI: true,
                responsive: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            //loadAll();
        });
    </script>


</body>

</html>