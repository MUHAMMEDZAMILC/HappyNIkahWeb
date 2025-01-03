<!DOCTYPE html>
<?php include('header.php'); ?>
<?php include('menusales.php'); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h6 style="color:darkgrey;">Payment Calls</h1>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">


                                <div class="card">
                                    <!-- <div class="card-header">
                                            <h3 class="card-title">DataTable with default features</h3>
                                        </div> -->
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <h1 class="app-page-title mb-0">Payment Calls</h1>
                                        <div>
                                            <h6 style="float: right;">Total records : 4</h6>
                                        </div>
                                        <br><br>


                                        <div class="table-scroll-y my-custom-scrollbar" style="height: 645px;">
                                            <table id="example" class="table table-bordered table-striped">
                                                <thead style="background-color: grey;border:1px solid black;">
                                                    <tr>
                                                        <th>Details</th>
                                                        <th>Time</th>
                                                        <th>Count</th>
                                                        <th>Action</th>

                                                        <!-- <th>Gender</th> -->
                                                        <!-- <th>Profile Description</th> -->
                                                        <!-- <th>Registered on </th> -->
                                                        <!-- <th>Registration Through </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <li style="list-style-type:none;">
                                                                <span>
                                                                    Adheena - HN10001
                                                                </span>
                                                                <br><br>
                                                                <button class="btn btn-primary">Approved</button>
                                                            </li>
                                                        </td>
                                                        <td>
                                                            29-01-2023 10:00 AM
                                                        </td>

                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            <div>

                                                                <button class="btn btn-danger">Delete</button>
                                                                <button class="btn btn-primary">View Details</button>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- next tr -->
                                                    <tr>
                                                        <td>
                                                            <li style="list-style-type:none;">
                                                                <span>
                                                                    Harshan - HN10005
                                                                </span>
                                                                <br><br>
                                                                <button class="btn btn-primary">Approved</button>
                                                            </li>
                                                        </td>
                                                        <td>
                                                            29-01-2023 10:00 AM
                                                        </td>

                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            <div>

                                                                <button class="btn btn-danger">Delete</button>
                                                                <button class="btn btn-primary">View Details</button>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- next tr -->
                                                </tbody>
                                            </table>







                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->




            <!-- end modal for Interest details  -->
            <?php include('footer.php'); ?>



            <!-- jQuery -->
            <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
            <!-- DataTables  & Plugins -->
            <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script> -->
            <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
			<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->

            </html>