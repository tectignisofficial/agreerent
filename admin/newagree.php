<?php 
session_start();
if(!isset($_SESSION['admin']) == 1) // If session is not set then redirect to Login Page
{
//  header("Location:adminlogin"); 
}
if(!isset($_SESSION['id'])) 
{
 header("Location:adminlogin.php"); 
}
include("../config/config.php");


// include('form.php');

$basicid=$_GET['documentbasid'];

if(isset($_GET['familydelid'])){
$deleteid=$_GET['familydelid'];	
 $query=mysqli_query($conn,"select * from family_members where id='$deleteid'");
    $res=mysqli_fetch_array($query);
    $id=$res['document_no'];
	$sql=mysqli_query($conn,"delete from family_members where id='$deleteid'");
   
	if($sql==1){	
	header("location:newagreement.php?documentbasid=$id");
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}

if(isset($_GET['deleteid'])){
$deleteid=$_GET['deleteid'];
$query=mysqli_query($conn,"select * from amenities where id='$deleteid'");
    $res=mysqli_fetch_array($query);
    $id=$res['document_no'];	
	$sql=mysqli_query($conn,"delete from amenities where id='$deleteid'");
	if($sql==1){	
	header("location:newagreement.php?documentbasid=$id");
  	}else{
		echo "<script>alert('Something went wrong');</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGREERENT | List of Agreement</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                        <div class="col-sm-6">
                            <h1>Create New Agreement</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Create New Agreement</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-two-profile-tab" data-toggle="pill"
                                            href="#owner" role="tab" aria-controls="custom-tabs-two-profile"
                                            aria-selected="false">Owner Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                                            href="#tenant" role="tab" aria-controls="custom-tabs-two-messages"
                                            aria-selected="false">Tenant Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#property" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Property</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#family-member" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Family Member</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#witness" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Witness</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#aminities" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Aminities</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                                            href="#payment" role="tab" aria-controls="custom-tabs-two-settings"
                                            aria-selected="false">Payment</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">

								<!-- Owners Details -->
                                    <div class="tab-pane fade active show" id="owner" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-profile-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" method="post">
                                                 <input type="hidden" id="no" name="no1"
                                                            value="<?php echo $basicid;?>" readonly>
                                                <div class="form-group row">
                                                     
                                                    <label for="examplename" class="col-sm-2 col-form-label">Full
                                                        Name<label style="color:Red">*</label> </label>
                                                    <div class="col-sm-2">
                                                      

                                                        <select class="form-control" name="abbreviation" id="examplemr"
                                                            required>
                                                            <option value="" disabled selected hidden>select</option>
                                                            <option value="mr.">Mr.</option>
                                                            <option value="mrs.">Mrs.</option>
                                                            <option value="mrs.">Miss.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" style="text-transform:uppercase" name="name"
                                                            class="form-control" id="txtname" placeholder="Enter Name"
                                                            required>
                                                        <span id="spanname"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Age<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" name="age"  class="form-control" id="id1"
                                                            placeholder="Enter Age" required>
                                                        <span id="demo"></span>
                                                    </div>

                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Mobile No.<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" name="mobile" id="mobile" class="form-control"
                                                            minlength="10" maxlength="10" pattern="[7-9]{1}[0-9]{9}"
                                                            placeholder="Enter Mobile Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar
                                                        Card No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
													<input type="text" class="form-control"name="aadhaar" id="txAdhar" placeholder="Enter Aadhaar Card number"   required>
                                                        <span id="spanAadharCard"></span>
                                                    </div>

                                                    <label for="examplepan"
                                                        class="col-sm-2 col-form-label">Pancard<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" style="text-transform:uppercase"
                                                            name="pancard" id="txtPANCard" class="form-control"
                                                            placeholder="Enter Pancard number"  maxlength="10" pattern="[A-Z]{4}[0-9]{5}[A-Z]{1}" required />
                                                        <span id="spanCard"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Residence Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" cols="66" rows="4" class="form-control"
                                                            placeholder="Enter Address" required
                                                            id="address"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col" align="right">
                                                    <button type="button" name="submitowner" id="subm"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;

                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>&nbsp;

                                                </div>
                                            </form>
                                        </div>
                                    </div>

									<!-- Tenant Details -->

									<div class="tab-pane fade" id="tenant" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-messages-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" method="post">
                                                  <input type="hidden" id="no2" name="no2" value="<?php echo $basicid;?>"
                                                            class="form-control" id="exampledno" readonly >
                                                <div class="form-group row">
                                                   
                                                    <label for="examplename" class="col-sm-2 col-form-label">Full
                                                        Name<label style="color:Red">*</label></label>
                                                    <div class="col-sm-2">
                                                       
                                                        <select class="form-control" id="exampleSelectTenant"
                                                            name="abbreviation" required>
                                                            <option value="" disabled selected hidden>select</option>
                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>
                                                            <option>Miss.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name1"
                                                            id="txtNameTenant" placeholder="Enter Name"
                                                            style="text-transform:uppercase" required>
                                                        <span id="spannameTenant"></span>
                                                    </div>
                                                </div>
                                                <!-- ss -->
                                                <div class="form-group row">
                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Office name<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="officename" name="officename"
                                                            placeholder="Enter Your Office Name" required>
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-  form-label">Office No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" class="form-control" name="officeno"
                                                            id="officeno" placeholder="Enter Office Number" minlength="10"
                                                            maxlength="10" required>
                                                    </div>
                                                </div>
                                                <!-- ss -->
                                                <div class="form-group row">
                                                    <label for="exampleInputMobile"
                                                        class="col-sm-2 col-form-label">Mobile No.<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" class="form-control" id="phoneTenant" name="mobile"
                                                            placeholder="Enter Mobile Number"  minlength="10" maxlength="10" pattern="[7-9]{1}[0-9]{9}"	 required>
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-  form-label">E-mail
                                                        ID<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="email" class="form-control" name="email"
                                                            id="emailcheckTenant" placeholder="Enter Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Passport
                                                        No</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="passport"
                                                            id="passport" placeholder="Enter Passport Number">
                                                    </div>

                                                    <label for="exampleaadhaar" class="col-sm-2 col-form-label">Aadhaar
                                                        Card No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                    <input type="text" name="aadhaar" class="form-control"
                                                            id="txAdharTenant" placeholder="Enter Aadhaar card No"
                                                         required>
                                                        <span id="spanAadharCardTenant"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Age<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" class="form-control" name="age" min="18"
                                                            max="100" id="idTenant" placeholder="Enter Age" required>
                                                        <p id="demoTenant"></p>
                                                    </div>


                                                    <label for="examplepan" class="col-sm-2 col-form-label">Pancard
                                                        No.<label style="color:Red">*</label></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="pancard"
                                                            id="txtPANCardTenant" placeholder="Enter Pancard number"
                                                            style="text-transform:uppercase" required>
                                                        <span id="spanCardTenant"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Residence Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="address" cols="66" rows="4" class="form-control"
                                                            placeholder="Enter Address" id="residenceAddressTenant"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplepreaddress"
                                                        class="col-sm-2 col-form-label">Present Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="permanent_address" class="form-control"
                                                            cols="66" rows="4" placeholder="Enter Address"
                                                            id="presentAddressTenant" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleaddress"
                                                        class="col-sm-2 col-form-label">Office Address<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <textarea name="officeaddr" cols="66" rows="4" class="form-control"
                                                            placeholder="Enter Address" id="officeaddress"
                                                            required></textarea>
                                                    </div>
                                                </div>

                                                <div class="col" align="right">

                                                    <!-- <a href="owner.php?id=<?php //echo $id;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a> -->
                                                    <button type="button" name="submitenant" id="submitenant"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary  next" style="color: aliceblue"
                                                        name="submit" id="sub">Next<i
                                                            class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

									<!-- Property -->

									<div class="tab-pane fade" id="property" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" method="post" >
                                                <div class="form-group row">
                                                    <input type="hidden" name="no3" id="noProperty"
                                                            value="<?php echo $basicid;?>" readonly>
                                                    <label for="examplename" class="col-2 col-form-label">Property
                                                        Type<label style="color:Red">*</label></label>

                                                    <div class="col-sm-2 col-lg-2">
                                                        

                                                        <!-- <input type="text" for="examplename" name="type" id="propertyTypeVal" class="form-control" readonly> -->
                                                        <select class="form-control" name="type" id="exampleproperties"
                                                            required>
                                                            <option value="" disabled selected hidden>select</option>
                                                            <option>Flat</option>
                                                            <option>Shop</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-8 col-lg-8">
                                                        <input type="text" class="form-control" name="address"
                                                            id="addressPro" placeholder="Enter Address" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplesec"
                                                                class="col-sm-4 col-form-label">Sector<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="sector"
                                                                    id="sector" placeholder="Enter Sector" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="exampleplot"
                                                                class="col-sm-4 col-form-label">Plot No.<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="plotno"
                                                                    id="plotno" placeholder="Enter Plot Number"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplecid"
                                                                class="col-sm-4 col-form-label">CIDCO</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="cidco"
                                                                    id="cidco" placeholder="Enter CIDCO">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplearea"
                                                                class="col-sm-4 col-form-label">Area(in sq.ft)<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="area"
                                                                    id="area" placeholder="Enter Area(in sq.ft)"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplecoop" class="col-sm-2 col-form-label">Co.op
                                                        Housing Society<label style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="chs" id="chs"
                                                            style="text-transform:uppercase"
                                                            placeholder="Enter Co.op Housing Society" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="examplenode"
                                                        class="col-sm-2 col-form-label">NODE</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="node" id="node"
                                                            placeholder="Enter NODE">
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <!-- <a href="tenant.php?id=<?php echo $did;?>"><button type="button" class="btn btn-primary  btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a> -->
                                                    <button type="button" name="submitproperty" id="submitproperty"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

									<!-- Family Member -->

									<div class="tab-pane fade" id="family-member" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">

                                            <form class="forms-sample" id="basic-form" method="post">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                             <input type="hidden" name="no4" id="noFamily"
                                                                value="<?php echo $basicid;?>">
                                                            <label for="examplename"
                                                                class="col-sm-3 col-form-label-sm">Name<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="txtnameFamily"
                                                                    name="name2" placeholder="Enter Name" required>
                                                                <span id="spannameFamily"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplerel"
                                                                class="col-sm-3 col-form-label-sm">Relation<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" id="exampleSelectrelation"
                                                                    name="relation" required>
                                                                    <option value="" disabled selected hidden>Select
                                                                    </option>
                                                                    <option>Father</option>
                                                                    <option>Mother</option>
                                                                    <option>Husband</option>
                                                                    <option>Wife</option>
                                                                    <option>Son</option>
                                                                    <option>Daughter</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="exampleage"
                                                                class="col-sm-3 col-form-label-sm">Age<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="age"
                                                                    id="relativeage" placeholder="Enter Age" required>
																	<span id="demoFamily"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="examplearea"
                                                                class="col-sm-3 col-form-label-sm">Gender<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" id="relativegender"
                                                                    name="gender" required>
                                                                    <option value="" disabled selected hidden>select
                                                                    </option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <button type="button" name="submitmember" id="submitmember"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>

                                        </div>
                                        <!--table-->
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div id="displayfamily"></div>
                                            </div>
                                        </div>
                                        <!-- table -->
                                    </div>

									<!-- Witness -->

									<div class="tab-pane fade" id="witness" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">



                                            <form class="forms-sample" method="post">
                                                <div class="row">
                                                    <h4>Owner Witness </h4>
                                                </div>
                                                <div class="form-group row">
                                                    <input type="hidden" name="no5" id="noWitness" value="<?php echo $basicid;?>">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">1<sup>st</sup> Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control " id="owitness1" name="owitness1"
                                                            placeholder="Enter Name" required>
															<span id="owitness1span"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control txtname" id="nameowner2"
                                                            name="owitness2" placeholder="Enter Name" required>
															<span id="nameowner2span"></span>

                                                    </div>
                                                </div>
                                                <div>
                                                </div>
                                                <div class="row">
                                                    <h4>Tenant Witness </h4>
                                                </div>
                                                <div class="form-group row">

                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">1<sup>st</sup> Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control " id="twitness1" name="twitness1"
                                                            placeholder="Enter Name" txtname required>
															<span id="twitness1span"></span>
															
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputtran"
                                                        class="col-sm-2 col-form-label">2<sup>nd</sup>Person<label
                                                            style="color:Red">*</label></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" style="text-transform:uppercase"
                                                            class="form-control " id="twitness2" name="twitness2"
                                                            placeholder="Enter Name" txtname required>
															<span id="twitness2span"></span>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <button type="button" name="submitwitness" id="submitwitness"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

									<!-- Amenities -->

									<div class="tab-pane fade" id="aminities" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <div class="card-body">
                                            <div class="row">
                                                <h4>List of Amenities </h4>
                                            </div>

                                            <form class="forms-sample" name="form1" method="post">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <input type="hidden" name="no6" id="noAmenities"
                                                                value="<?php echo $basicid;?>">
                                                            <label for="examplename"
                                                                class="col-sm-3 col-form-label-sm">Name<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" style="text-transform:uppercase"
                                                                    class="form-control" id="txtnameAmenities" name="name3"
                                                                    placeholder="Enter Name" required>
                                                                <span id="spannameAmenities"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="exampleitem"
                                                                class="col-sm-3 col-form-label-sm">Number Of Items<label
                                                                    style="color:Red">*</label></label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="number"
                                                                    id="itemnumber" placeholder="Enter Number of items"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" align="right">
                                                    <!-- <a href="family.php?id=<?php echo $fid;?>"><button type="button" class="btn btn-primary btn-lg" style="color: aliceblue"><i class="mdi mdi-chevron-left"></i>Previous</button></a> -->
                                                    <button type="button" name="submitaminities" id="submitaminities"
                                                        class="btn btn-info" data-tt="tooltip" title=""
                                                        data-original-title="Click here to Save">Save as
                                                        Draft</button>&nbsp;
                                                    <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                        Previous<i class="mdi mdi-chevron-left"></i></a>
                                                    <a class="btn btn-primary next " style="color: aliceblue" id="">
                                                        Next<i class="mdi mdi-chevron-right"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <div id="displayaminities"></div>
                                            </div>
                                        </div>
                                    </div>

									<!-- Payment -->

									<div class="tab-pane fade " id="payment" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-settings-tab">
                                        <form method="post">
                                            <div class="form-group row">
                                                <label for="examplename" class="col-sm-2 col-form-label-sm">Security
                                                    Deposit<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" name="no7" id="noPayment" value="<?php echo $basicid;?>">
                                                    <input type="number" id="deposit" class="form-control"
                                                        name="security_deposit" placeholder="Deposit" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Monthly
                                                    Rent<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="number" id="rent" class="form-control"
                                                        name="rent_amount" placeholder="Rent" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Payment
                                                    Method<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        name="method" id="checkselec" style="width: 100%;"
                                                        data-select2-id="3" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected" data-select2-id="4">CASH</option>
                                                        <option>CHEQUE</option>
                                                        <option>BANK TRASFER</option>
                                                        <option>GOOGLE PAY</option>
                                                        <option>PHONE PAY</option>
                                                        <option>PAYTYM</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label for="exampleage" class="col-sm-2 col-form-label-sm">Bank<label
                                                        style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        name="bank" id="bank" style="width: 100%;" data-select2-id="1"
                                                        tabindex="-2" aria-hidden="true">
                                                        <option selected="selected" data-select2-id="2">SBI</option>
                                                        <option>UNION</option>
                                                        <option>AXIS</option>
                                                        <option>KOTAK</option>
                                                        <option>HDFC</option>
                                                        <option>ICICI</option>
                                                        <option>BOI</option>
                                                        <option>YES BANK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampldate" class="col-sm-2 col-form-label">Date Of 
                                                    Rent Payment<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="rentpay"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampldate" class="col-sm-2 col-form-label">Date Of 
                                                    Payment<label style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" name="date" id="date"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputtran"
                                                    class="col-sm-2 col-form-label">Transaction ID<label
                                                        style="color:Red">*</label></label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" name="tid" id="tid"
                                                        placeholder="Enter Transaction ID" required>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="button" name="savepayment" id="savepayment"
                                                    class="btn btn-info" data-tt="tooltip" title=""
                                                    data-original-title="Click here to Save"
                                                    >Save as Draft</button>
                                                <input type="hidden" name="agreement_details" value="">
                                                <a class="btn btn-primary previous " style="color: aliceblue" id="">
                                                    Previous<i class="mdi mdi-chevron-left"></i></a>
                                                <button type="button" name="submitpayment" id="submitpayment"
                                                    class="btn btn-info" data-tt="tooltip" title=""
                                                    data-original-title="Click here to Save"
                                                    onclick="function()">submit</button>&nbsp;
                                            </div>


                                        </form>

                                    </div>
                                 
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script src="checkform.js"></script>

    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
    </script>
    <script>
    function getproperty(val) {
        $.ajax({
            type: 'post',
            url: 'form.php',
            data: 'typeid=' + val,
            success: function(data) {
                $("#propertyTypeVal").html(data);
            }
        });
    }
    </script>
    <script>
    $('.next').click(function() {
        $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').trigger('click');
    });

    $('.previous').click(function() {
        $('.nav-tabs > .nav-item > .active').parent().prev('li').find('a').trigger('click');
    });
    </script>
<script>

</script>

<script>
let submitenant = document.getElementById("submitenant");
submitenant.addEventListener("click", function(){
// let no2 = document.getElementById("no2").value;
let abbreviation = document.getElementById("exampleSelectTenant").value;
let name1 = document.getElementById("txtNameTenant").value;
let mobile = document.getElementById("phoneTenant").value;
let email = document.getElementById("emailcheckTenant").value;

let aadhaar = document.getElementById("txAdharTenant").value;
let age = document.getElementById("idTenant").value;
let pancard = document.getElementById("txtPANCardTenant").value;
let address = document.getElementById("residenceAddressTenant").value;
let permanent_address = document.getElementById("presentAddressTenant").value;
// if(no2 == "" || abbreviation == "" || name1 == "" || mobile == "" || email == "" || aadhaar == "" || age == "" || pancard == "" || address == "" || permanent_address == ""  ){
//     swal("Oops...", "Please fill all the fields", "error");
// }
if( abbreviation == "" || name1 == "" || mobile == "" || email == "" || aadhaar == "" || age == "" || pancard == "" || address == "" || permanent_address == ""  ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});
</script>


<script>
let submitproperty = document.getElementById("submitproperty");
submitproperty.addEventListener("click", function(){
let exampleproperties = document.getElementById("exampleproperties").value;
let address = document.getElementById("addressPro").value;
let sector = document.getElementById("sector").value;
let plotno = document.getElementById("plotno").value;
let cidco = document.getElementById("cidco").value;
let area = document.getElementById("area").value;
let chs = document.getElementById("chs").value;
let node = document.getElementById("node").value;

if(exampleproperties == "" || address == "" || sector == "" || plotno == "" || cidco == "" || area == "" || chs == "" || node == ""  ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});
</script>
<script>
let submitmember = document.getElementById("submitmember");
submitmember.addEventListener("click", function(){
// let no4 = document.getElementById("noFamily").value;
let name2 = document.getElementById("txtnameFamily").value;
let relation = document.getElementById("exampleSelectrelation").value;
let age = document.getElementById("relativeage").value;
let gender = document.getElementById("relativegender").value;

// if(no4 == "" || name2 == "" || relation == "" || age == "" || gender == ""  ){
//     swal("Oops...", "Please fill all the fields", "error");
// }
if( name2 == "" || relation == "" || age == "" || gender == ""  ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});
</script>
<script>
let submitwitness = document.getElementById("submitwitness");
submitwitness.addEventListener("click", function(){
// let noWitness = document.getElementById("noWitness").value;
let owitness1 = document.getElementById("nameowner").value;
let owitness2 = document.getElementById("nameowner2").value;
let twitness1 = document.getElementById("twitness1").value;
let twitness2 = document.getElementById("twitness2").value;


// if(noWitness == "" || owitness1 == "" || owitness2 == "" || twitness1 == "" || twitness2 == ""  ){
//     swal("Oops...", "Please fill all the fields", "error");
// }
if(owitness1 == "" || owitness2 == "" || twitness1 == "" || twitness2 == ""  ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});
</script>
<script>
let submitaminities = document.getElementById("submitaminities");
submitaminities.addEventListener("click", function(){
// let no6 = document.getElementById("noAmenities").value;
let name3 = document.getElementById("txtnameAmenities").value;
let number = document.getElementById("itemnumber").value;



// if(no6 == "" || name3 == "" || number == ""   ){
//     swal("Oops...", "Please fill all the fields", "error");
// }

if( name3 == "" || number == ""   ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});
</script>
<script>
let submitpayment = document.getElementById("submitpayment");
submitpayment.addEventListener("click", function(){
// let no7 = document.getElementById("noPayment").value;
let rent_amount = document.getElementById("rent").value;
let method = document.getElementById("checkselec").value;
let date_of_payment = document.getElementById("date1").value;
let bank = document.getElementById("bank").value;
let date = document.getElementById("date").value;
let tid = document.getElementById("tid").value;
// if(no7 == "" || rent_amount == "" || method == "" || date_of_payment == "" || bank == "" || date== "" || tid== "" ){
//     swal("Oops...", "Please fill all the fields", "error");
// }
if(rent_amount == "" || method == "" || date_of_payment == "" || bank == "" || date== "" || tid== "" ){
    swal("Oops...", "Please fill all the fields", "error");
}
  
    else{
        swal("Saved!", "Agreement Save", "success");
    }
});
</script>
<script>
  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spanname").hide();
	    $("#txtname").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtname").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spanname").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#spanname").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //PAN card validation
	   $("#spanCard").hide();
	    $("#txtPANCard").keyup(function(){
	     pan_check();
	   });
	   function pan_check(){
		   let pancard=$("#txtPANCard").val();
		   let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
		   if(!vali.test(pancard)){
			    $("#spanCard").show().html("*Invalid Pan No").css("color","red").focus();
			 pan_err=false;
			 return false;
		   }
		   else{
		       $("#spanCard").hide();
		   }
	   }

	   $("#sub").click(function(){
	           pan_err = true;
		       pan_check();
			   
			   if((pan_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //AADHAR CARD VALIDATION
      $("#spanAadharCard").hide();
	    $("#txAdhar").keyup(function(){
	     aadhar_check();
	   });
	   function aadhar_check(){
		   let aadharcard=$("#txAdhar").val();
		   let vali =/^\d{12}$/; 
		   if(!vali.test(aadharcard)){
			    $("#spanAadharCard").show().html("*Invalid Aadhar No").css("color","red").focus();
          aadhar_err=false;
			 return false;
		   }
		   else{
		       $("#spanAadharCard").hide(); 
		   }
	   }

	   $("#sub").click(function(){
	           aadhar_err = true;
             aadhar_check();
			   
			   if((aadhar_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //age validation
      $("#demo").hide();
	    $("#id1").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#id1").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
            $("#demo").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
            $("#demo").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



 });
 let subm = document.getElementById("subm");
subm.addEventListener("click", function(){
// let no1 = document.getElementById("no").value;
let abbreviation = document.getElementById("examplemr").value;
let name = document.getElementById("txtname").value;
let age = document.getElementById("id1").value;
let mobile = document.getElementById("mobile").value;
let aadhaar = document.getElementById("txAdhar").value;
let pancard = document.getElementById("txtPANCard").value;
let address = document.getElementById("address").value;

// if(no1 == "" || abbreviation == "" || name == "" || age == "" || mobile == "" || aadhaar== "" || pancard== "" || address== ""  ){
//     swal("Oops...", "Please fill all the fields", "error");
// }

if( abbreviation == "" || name == "" || age == "" || mobile == "" || aadhaar== "" || pancard== "" || address== ""  ){
    swal("Oops...", "Please fill all the fields", "error");
}
    else{
      swal("Saved!", "Agreement Save", "success");
    }
});
</script>
<!-- Tenant -->

<script>
  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spannameTenant").hide();
	    $("#txtNameTenant").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtNameTenant").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spannameTenant").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#spannameTenant").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //PAN card validation
	   $("#spanCardTenant").hide();
	    $("#txtPANCardTenant").keyup(function(){
	     pan_check();
	   });
	   function pan_check(){
		   let pancard=$("#txtPANCardTenant").val();
		   let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
		   if(!vali.test(pancard)){
			    $("#spanCardTenant").show().html("*Invalid Pan No").css("color","red").focus();
			 pan_err=false;
			 return false;
		   }
		   else{
		       $("#spanCardTenant").hide();
		   }
	   }

	   $("#sub").click(function(){
	           pan_err = true;
		       pan_check();
			   
			   if((pan_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //AADHAR CARD VALIDATION
      $("#spanAadharCardTenant").hide();
	    $("#txAdharTenant").keyup(function(){
	     aadhar_check();
	   });
	   function aadhar_check(){
		   let aadharcard=$("#txAdharTenant").val();
		   let vali =/^\d{12}$/; 
		   if(!vali.test(aadharcard)){
			    $("#spanAadharCardTenant").show().html("*Invalid Aadhar No").css("color","red").focus();
          aadhar_err=false;
			 return false;
		   }
		   else{
		       $("#spanAadharCardTenant").hide(); 
		   }
	   }

	   $("#sub").click(function(){
	           aadhar_err = true;
             aadhar_check();
			   
			   if((aadhar_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //age validation
      $("#demoTenant").hide();
	    $("#idTenant").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#idTenant").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
            $("#demoTenant").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
            $("#demoTenant").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



 });
</script>

<!-- Property -->
<script>
  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spannameTenant").hide();
	    $("#txtNameTenant").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtNameTenant").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spannameTenant").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#spannameTenant").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //PAN card validation
	   $("#spanCardTenant").hide();
	    $("#txtPANCardTenant").keyup(function(){
	     pan_check();
	   });
	   function pan_check(){
		   let pancard=$("#txtPANCardTenant").val();
		   let vali =/([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}$/;  
		   if(!vali.test(pancard)){
			    $("#spanCardTenant").show().html("*Invalid Pan No").css("color","red").focus();
			 pan_err=false;
			 return false;
		   }
		   else{
		       $("#spanCardTenant").hide();
		   }
	   }

	   $("#sub").click(function(){
	           pan_err = true;
		       pan_check();
			   
			   if((pan_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //AADHAR CARD VALIDATION
      $("#spanAadharCardTenant").hide();
	    $("#txAdharTenant").keyup(function(){
	     aadhar_check();
	   });
	   function aadhar_check(){
		   let aadharcard=$("#txAdharTenant").val();
		   let vali =/^\d{12}$/; 
		   if(!vali.test(aadharcard)){
			    $("#spanAadharCardTenant").show().html("*Invalid Aadhar No").css("color","red").focus();
          aadhar_err=false;
			 return false;
		   }
		   else{
		       $("#spanAadharCardTenant").hide(); 
		   }
	   }

	   $("#sub").click(function(){
	           aadhar_err = true;
             aadhar_check();
			   
			   if((aadhar_err==true)){
			      return true;
			   }
			   else{return false;}
		  });


      //age validation
      $("#demoTenant").hide();
	    $("#idTenant").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#idTenant").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
            $("#demoTenant").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
            $("#demoTenant").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



 });
</script>

<!-- Family Member -->
<script>
  $(document).ready(function(){
   //TEXT VALIDATION
   $("#spannameFamily").hide();
	    $("#txtnameFamily").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtnameFamily").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spannameFamily").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#spannameFamily").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });

      //age validation
      $("#demoFamily").hide();
	    $("#relativeage").keyup(function(){
	     age_check();
	   });
	   function age_check(){
		   let age=$("#relativeage").val();
        let vali =/^(1[89]|[2-9]\d)$/;
        
        
       if(!vali.test(age)){
            $("#demoFamily").show().html("*Age should be between 18 to 100").css("color","red").focus();
            age_err=false;
            return false;
        }
        else{
            $("#demoFamily").hide();
        }
      }

	   $("#sub").click(function(){
      age_err = true;
      age_check();
			   
			   if((age_err==true)){
			      return true;
			   }
			   else{return false;}
		  });



 });
</script>

<!-- Witness -->

 <script>
 $(document).ready(function(){

	
		   //Owner
		   $("#owitness1span").hide();
	    $("#owitness1").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#owitness1").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#owitness1span").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#owitness1span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });
 });
 </script>
 <script>
 $(document).ready(function(){

	
		   //Owner
		   $("#nameowner2span").hide();
	    $("#nameowner2").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#nameowner2").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#nameowner2span").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#nameowner2span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });
 });
 </script>
 <script>
 $(document).ready(function(){
	   //TENANT Witness
	   $("#twitness1span").hide();
	    $("#twitness1").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#twitness1").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#twitness1span").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#twitness1span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });
	
});
</script>
<script>
   $(document).ready(function(){
	   //TENANT
	   $("#twitness2span").hide();
	    $("#twitness2").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#twitness2").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#twitness2span").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#twitness2span").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });
	
   });
</script>


<!-- Amenities -->
<script>
   $(document).ready(function(){
	   //TENANT
	   $("#spannameAmenities").hide();
	    $("#txtnameAmenities").keyup(function(){
	     txt_check();
	   });
	   function txt_check(){
		   let txt=$("#txtnameAmenities").val();
		   let vali =/^[A-Za-z ]+$/;
		   if(!vali.test(txt)){
			  $("#spannameAmenities").show().html("Enter Alphabets only").css("color","red").focus();
			  txt_err=false;
			  return false;
		   }
		   else{
		       $("#spannameAmenities").hide();
		       
		   }
	   }

	   $("#sub").click(function(){
       txt_err = true;
             txt_check();
			   
			   if((txt_err==true)){
			      return true;
			   }
			   else{return false;}
		  });
	
   });
</script>

</body>

</html>