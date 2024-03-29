<?php
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
 header("Location:adminlogin.php"); 
}
if(!isset($_SESSION['aid'])) 
{
 header("Location:adminlogin.php"); 
}
include("../config/config.php");


// include('form.php');

  $sql=mysqli_query($conn,"select * from new_agreement where user_id='".$_SESSION['aid']."'");
                            $query =mysqli_query($conn,"select * from users where user_id='".$_SESSION['aid']."'");
                      $dnk=mysqli_num_rows($sql);
                      $lastid=$dnk+1;
                      $arr=mysqli_fetch_array($query);
                      $name=$arr['agent_name'];
                      $first=$name;
                      
                      $res= preg_replace('~\S\K\S*\s*~u', '', $first);
                      if(empty($lastid)){
						           $number=$res."-000";
					           }else{
						          $id=str_pad($lastid + 0, 3,0, STR_PAD_LEFT);
					        	  $number=$res."-$id";
					            }		
                     
                    //  echo "<script> alert('$number1');</script>";			


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | Enquiry Details</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'include/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php'; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                       
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Agreement Details</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">New Agreement</h3>
                                </div>

                                <div class="card-body">
                                    <form method="post" action="form.php">
                                        <div class="form-group row">
                                            <label for="inputtext" class="col-sm-2 col-form-label">Document no.<span
                                                    class="text-danger">*</span></label>

                                            <div class="col-sm-4">

                                                <input type="text" name="document_no11" value="<?php echo $number;?>"
                                                    class="form-control" id="exampledno" readonly>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampledate" class="col-sm-2 col-form-label">Date Of
                                                Aggrement<label style="color:Red">*</label></label>
                                            <div class="col-sm-4">
                                                <input type="date" name="date" class="form-control" id="exampledate"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleprop" class="col-sm-2 col-form-label">Total No Of
                                                Months<label style="color:Red">*</label></label>
                                            <div class="col-sm-4">
                                                <select required class="form-control" name="month"
                                                    id="exampleSelectGender">
                                                    <option value="" disabled selected hidden>select</option>
                                                    <option>11</option>
                                                    <option>22</option>
                                                    <option>36</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleprop" class="col-sm-2 col-form-label">Property Type<label
                                                    style="color:Red">*</label></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="type" id="exampleProperty" required>
                                                    <option value="" disabled selected hidden>select</option>
                                                    <option>Flat</option>
                                                    <option>Shop</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleprop" class="col-sm-2 col-form-label">Place Of
                                                Agreement<label style="color:Red">*</label></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="place" class="form-control"
                                                    style="text-transform:uppercase" id="exampleagreement"
                                                    placeholder="Enter Place" required>

                                            </div>
                                        </div>
                                        <div class="">
                                            <input type="hidden" name="agreement_details" value="">
                                            <button type="submit" name="submit" id="details" class="btn btn-info"
                                                data-tt="tooltip" title="" data-original-title="Click here to Save">Save
                                                as
                                                Draft</button>&nbsp;
                                            <!-- <button type="button" name="submit" id="next" class="btn btn-info" data-tt="tooltip" title="" data-original-title="Click here to Save">Next</button> -->
                                        </div>

                                    </form>
                                </div>
                            </div>

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
        <?php include 'include/footer.php'; ?>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->

    <script src="plugins/jszip/jszip.min.js"></script>

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
  
</body>

</html>