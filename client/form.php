<?php
//new_agreement
session_start();
include("../config/config.php");

if(isset($_POST['submit'])){
	$document_main=$_POST['document_no11'];
	$date=$_POST['date'];
	$type=$_POST['type'];
	$month=$_POST['month'];
  $place=$_POST['place'];
  $status=0;
	
	$sql=mysqli_query($conn,"INSERT INTO `new_agreement`(`user_id`,`document_no`, `property_type`, `date_of_agreement`, `no_of_month`,`place_of_agreement`) VALUES ('".$_SESSION['id']."','$document_main','$type','$date','$month','$place')");
  $sql =mysqli_query($conn,"INSERT INTO `noc`(`document_no`, `status`) VALUES ('$document_main','$status')");
	if($sql==1){			
      
		header("location:newagreement.php?documentbasid=".$document_main);
	}else{
		echo "<scrpt>alert('Something went wrong');</script>";
	}
}

//owner
if(isset($_POST['subm'])){
    $id=$_POST['no'];
	$abbreviation=$_POST['examplemr'];
	$name=$_POST['txtname'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$aadhaar=$_POST['txAdhar'];
	$pancard=$_POST['txtPANCard'];
  $age=$_POST['id1'];
	
  $query=mysqli_query($conn,"select * from owner where document_no='$id'");
if(mysqli_num_rows($query)>0){
	$sql=mysqli_query($conn,"UPDATE `owner` SET `document_no`='$id',`abbreviation`='$abbreviation',`fullname`='$name',`age`='$age',`address`='$address',`mobile`='$mobile',`aadhaar`='$aadhaar',`pan_card`='$pancard' WHERE document_no='$id'");
	if($sql==1){	
     echo "successfully updated";
	}else{
		echo "something went wrong";
	}
	}
else{
	$sql=mysqli_query($conn,"INSERT INTO `owner`(`document_no`, `abbreviation`, `fullname`,`age`, `address`, `mobile`, `aadhaar`, `pan_card`) VALUES ('$id','$abbreviation','$name','$age','$address','$mobile','$aadhaar','$pancard')");
	if($sql==1){	
    echo "successfully Added";
	}else{
	echo "Something went wrong";
	}
	}

}

//tenant
if(isset($_POST['tenant'])){
     $idtenant=$_POST['exampledno'];
	$surname=$_POST['exampleSelectmr'];
	$name=$_POST['txtname3'];
  $age=$_POST['id2'];
  $officename=$_POST['officename'];
  $officeno=$_POST['officeno'];
  $officeaddress=$_POST['officeaddress'];
  $permanent_address=$_POST['presentAddress'];
	$address=$_POST['residenceAddress'];
	$mobile=$_POST['phone'];
	$aadhaar=$_POST['txAdhartr'];
	$pancard=$_POST['txtPANCard1'];
  $email=$_POST['emailcheck'];
	$passport=$_POST['passport'];
	
	$query1=mysqli_query($conn,"select document_no from tenant where document_no='$idtenant' ");

	if(mysqli_num_rows($query1)>0){
		$sql=mysqli_query($conn,"UPDATE `tenant` SET `document_no`='$idtenant',`abbreviation`='$surname',`fullname`='$name',`age`='$age',`address`='$address',`permanent_address`='$permanent_address',`mobile`='$mobile',`email`='$email',`passport`='$passport',`aadhaar`='$aadhaar',`pan_card`='$pancard',`office_name`='$officename',`office_addres`='$officeaddress',`office_phone`='$officeno'  WHERE document_no='$idtenant'");
	if($sql==1){	
     echo "successfully updated";
  	}else{
		echo "something went wrong";
	}
	
	}
	else{
	$sql=mysqli_query($conn,"INSERT INTO `tenant`(`document_no`, `abbreviation`, `fullname`,`age`, `address`,`permanent_address`, `mobile`, `email`,`passport`,`aadhaar`, `pan_card`,`office_name`, `office_addres`, `office_phone`) VALUES 
  ('$idtenant','$surname','$name','$age','$address','$permanent_address','$mobile','$email','$passport','$aadhaar','$pancard','$officename','$officeaddress','$officeno')");
	if($sql==1){	
    echo "Successfully Added";
  	}else{
		echo "Something went wrong";
	}
}
}


//property
if(isset($_POST['submitproperty'])){
	 $idproperty=$_POST['no3'];
	$type=$_POST['exampleproperties'];  
  $sector=$_POST['sector'];
	$address=$_POST['addressPro'];
	$plotno=$_POST['plotno'];
	$cidco=$_POST['cidco'];
	$area=$_POST['area'];
  $chs=$_POST['chs'];
  $node=$_POST['node'];
	
  $query=mysqli_query($conn,"select * from property_details where document_no='$idproperty' ");
if(mysqli_num_rows($query)>0){
	$sql=mysqli_query($conn,"UPDATE `property_details` SET `document_no`='$idproperty',`property_type`='$type',`address`='$address',`sector`='$sector',`plot_no`='$plotno',`cidco`='$cidco',`area`='$area',`chs`='$chs',`node`='$node' WHERE document_no='$document2'");
	if($sql==1){	
   echo "successfully updated";
  	}else{
		echo "something went wrong";
	}
	
}

	else{
		$sql=mysqli_query($conn,"INSERT INTO `property_details`(`document_no`,`property_type`, `address`, `sector`, `plot_no`,`cidco`, `area`, `chs`, `node`) VALUES 
  ('$idproperty','$type','$address','$sector','$plotno','$cidco','$area','$chs','$node')");
	if($sql==1){	
    echo "Successfully Added";
  	}else{
		echo "Something went wrong";
	}
}
}


//family
if(isset($_POST['submitmember'])){
	$idfamily=$_POST['no4'];
	$name=$_POST['txtname1'];  
  $age=$_POST['relativeage'];
	$relation=$_POST['exampleSelectrelation'];
	$gender=$_POST['relativegender'];
	
	
	$sql=mysqli_query($conn,"INSERT INTO `family_members`(`document_no`,`name`, `age`, `relation`, `gender`) VALUES 
  ('$idfamily','$name','$age','$relation','$gender')");
	if($sql==1){	
    echo "Successfully Added";
  	}else{
			echo "Something went wrong";
	}

}

if(isset($_POST['submitmember'])){
	$idfamily=$_POST['no4'];
	
	$sql=mysqli_query($conn,"select * from family_members where document_no='$idfamily'");
	echo "<table class='table table-bordered'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Relation</th>
        <th>Age</th>
         <th>Gender</th>
		 <th>Action</th>
      </tr>
    </thead>
    <tbody>";
	while($arr=mysqli_fetch_array($sql)){
     echo " <tr>
     
        <td>". $arr['name']."</td>
        <td>". $arr['relation'] ."</td>
       <td>". $arr['age'] ."</td>
       <td>". $arr['gender'] ."</td>
	   <td><a onclick='familyfun(".$arr['id'].")'  alt='delete'><i class='fas fa-trash'></i></a></td>
      </tr>";
       } 
    echo "</tbody>
  </table>";

}

//witness
if(isset($_POST['submitwitness'])){
	$idwitness=$_POST['no5'];
	$owitness1=$_POST['nameowner'];
	$owitness2=$_POST['nameowner2'];
  $twitness1=$_POST['twitness1'];
  $twitness2=$_POST['twitness2'];
	
	
	$sql=mysqli_query($conn,"UPDATE owner SET name1='$owitness1',name2='$owitness2' WHERE document_no='$idwitness'"); 
  $tenant=mysqli_query($conn,"UPDATE tenant SET name1='$twitness1',name2='$twitness2' WHERE document_no='$idwitness'"); 

	if($sql==1){	

     echo "Successfully Added";
  	}else{
		echo "Something went wrong";
	}
}


//aminities
if(isset($_POST['submitaminities'])){
	$idaminities=$_POST['no6'];
	$name=$_POST['txtname2'];  
  $number=$_POST['itemnumbe'];
	$sql=mysqli_query($conn,"INSERT INTO `amenities`(`document_no`,`name`,`number`) VALUES 
  ('$idaminities','$name','$number')");
	if($sql==1){	
    echo "Successfully Added";
  	}else{
		echo "Something went wrong";
	}
}

if(isset($_POST['submitaminities'])){
	$idaminities=$_POST['no6'];
	
	$sql=mysqli_query($conn,"select * from amenities where document_no='$idaminities'");
	echo "<table class='table table-bordered'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Number Of Items</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>";
	while($arr=mysqli_fetch_array($sql)){
     echo " <tr>
        <td>". $arr['name']."</td>
        <td>". $arr['number'] ."</td>
		<td><a onclick='fun(".$arr['id'].")'  alt='delete'><i class='fas fa-trash'></i></a></td>
      </tr>";
       } 
    echo "</tbody>
  </table>";

}
//payment
if(isset($_POST['savepayment'])){
	$idpayment=$_POST['no7'];
	$security_deposit=$_POST['deposit'];  
  $rentpay=$_POST['rentpay']; 
  $rent_amount=$_POST['rent'];
  $method=$_POST['checkselec'];  
  $bank=$_POST['bank'];  
  $date=$_POST['date'];
  $tid=$_POST['tid'];

  $query2=mysqli_query($conn,"select * from payment where document_no='$idpayment' ");
$num2=mysqli_fetch_array($query2);
if(mysqli_num_rows($query2)>0){
  $document2=$num2['document_no'];
$sql=mysqli_query($conn,"UPDATE `payment` SET `document_no`='$idpayment',`security_deposit`='$security_deposit',`rent_amount`='$rent_amount',`bank`='$bank',`method`='$method',`date_of_payment`='$rentpay',`date`='$date',`tid`='$tid' WHERE document_no='$idpayment'");
if($sql==1){
echo "Successfully updated";
}else{
echo "Something went wrong";
}	
}
else{
  $sql=mysqli_query($conn,"INSERT INTO `payment`(`document_no`, `security_deposit`, `rent_amount`, `bank`, `method`,`date_of_payment`, `date`, `tid`) VALUES ('$idpayment','$security_deposit','$rent_amount','$bank','$method','$rentpay','$date','$tid')");
if($sql==1){
echo "Successfully Added";
}else{
echo "<script>
alert('Something went wrong');
</script>";
}
}
}

//update payment
if(isset($_POST['submitpayment'])){
	$idpayment=$_POST['no7'];
	$security_deposit=$_POST['deposit'];  
  $rent_amount=$_POST['rent'];
  $method=$_POST['checkselec'];  
  $bank=$_POST['bank'];  
  $date=$_POST['date'];  
  $rentpay=$_POST['rentpay'];
  $tid=$_POST['tid'];

  $document='';

$query=mysqli_query($conn,"SELECT document_no FROM owner where document_no ='$idpayment'");

$query1=mysqli_query($conn,"SELECT document_no FROM tenant where document_no ='$idpayment'");

$query2=mysqli_query($conn,"SELECT document_no FROM property_details where document_no ='$idpayment'");

$query3=mysqli_query($conn,"SELECT document_no FROM family_members where document_no ='$idpayment'");

$query4=mysqli_query($conn,"SELECT document_no FROM amenities where document_no ='$idpayment'");

$query6=mysqli_query($conn,"SELECT document_no FROM payment where document_no ='$idpayment'");

$query5=mysqli_query($conn,"SELECT * FROM owner where document_no ='$idpayment' ");
$arr5=mysqli_fetch_assoc($query5);
$name1=$arr5['name1'];


if(!mysqli_num_rows($query)>0){
echo "please fill owner details";
}
else if(!mysqli_num_rows($query1)>0){
echo "please fill tenant details";
}
else if(!mysqli_num_rows($query2)>0){
echo "please fill family details";
}
elseif(!mysqli_num_rows($query3)>0){
echo "please fill property details";
}
else if(!mysqli_num_rows($query4)>0){
echo "please fill amenities details";
}
else if($name1==''){
echo "please fill witness details";
}
else if(mysqli_num_rows($query6)>0){
$sql=mysqli_query($conn,"UPDATE `payment` SET `document_no`='$idpayment',`security_deposit`='$security_deposit',`rent_amount`='$rent_amount',`bank`='$bank',`method`='$method',`date_of_payment`='$rentpay',`date`='$date',`tid`='$tid' WHERE document_no='$idpayment'");
if($sql==1){
echo "Successfully updated";
}else{
echo "Something went wrong";
}
}
else{
  $sql=mysqli_query($conn,"INSERT INTO `payment`(`document_no`, `security_deposit`, `rent_amount`, `bank`, `method`,`date_of_payment`, `date`, `tid`) VALUES ('$idpayment','$security_deposit','$rent_amount','$bank','$method','$rentpay','$date','$tid')");
  if($sql==1){
    echo "Successfully updated";
    }else{
    echo "Something went wrong";
    }
}
}


//list of complaints
if(isset($_POST['dnkid'])){
	$sql=mysqli_query($conn,"SELECT * FROM ticket where id='".$_POST['dnkid']."'");
	$arr=mysqli_fetch_array($sql);
	echo '<div class="modal-header">
              <h4 class="modal-title">'.$arr['complaint_code'].'</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form method="post" action="form.php">
            <div class="modal-body body1">
                <div class="row">   
                <div class="col-4">
                <b> Date & Time :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['date'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Client Code :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['user_id'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Complaint Code :</b><br>
                </div>
                <div class="col-8">
                <p>'.$arr['complaint_code'].'</p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Subject :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['subject'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Description :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['description'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Comment :</b><br>
                </div>
                <div class="col-8">
				<input type="hidden" name="compid" value="'.$arr['id'].'">
                <p> <textarea class="form-control" name="descr" id=""  rows="2"></textarea> </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Status :</b><br>
                </div>
                <div class="col-8">
                <p> <select class="form-control select2" name="status" style="width: 100%;" required>
                <option selected="selected" disable>Status</option>
                                <option>Open</option>
                                <option>In Proccess</option>
                                <option>Hold On</option>
                                <option>Closed</option>
                              </select></p>
                </div>
                </div>


        
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="compsubmit" >Submit</button>
            </div></form>';
}
if(isset($_POST['dnkidno'])){
	$sql=mysqli_query($conn,"SELECT * FROM `ticket` WHERE id='".$_POST['dnkidno']."'");
	$arr=mysqli_fetch_array($sql);
	echo '<div class="modal-header">
              <h4 class="modal-title">'.$arr['complaint_code'].'</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form method="post" action="form.php">
            <div class="modal-body body1">
                <div class="row">   
                <div class="col-4">
                <b> Date & Time :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['date'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Client Code :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['user_id'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Complaint Code :</b><br>
                </div>
                <div class="col-8">
                <p>'.$arr['complaint_code'].'</p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Subject :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['subject'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Description :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['description'].' </p>
                </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div></form>';
}

if(isset($_POST['compsubmit'])){
	$compid=$_POST['compid'];
	$descr=$_POST['descr'];
	$status=$_POST['status'];
	$sql=mysqli_query($conn,"UPDATE `ticket` SET `status`='".$status."',`comment`='".$descr."' WHERE id='".$compid."'");
	if($sql==1){
		header("location:listofcomplaint.php");
	}else{
		echo "Something went wrong";
	}
}
if(isset($_POST['dnkidno1'])){
	$sql=mysqli_query($conn,"select leads.user_id,leads.requirement,leads.location,leads.mobile,leads.area,leads.id,leads.type,leads.client_name,agent_details.firm_name from leads inner join agent_details on leads.user_id=agent_details.user_id  where leads.id='".$_POST['dnkidno1']."'");
 
	$arr=mysqli_fetch_array($sql);
	echo '<div class="modal-header">
              <h4 class="modal-title">'.$arr['firm_name'].'</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form method="post" action="form.php">
            <div class="modal-body body1">
                <div class="row">   
                <div class="col-4">
                <b> Client Code :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['user_id'].' </p>
                </div>
                </div>

                <div class="row">   
                <div class="col-4">
               <b>Client Name :</b><br>
               </div>
               <div class="col-8">
               <p> '.$arr['client_name'].' </p>
               </div>
               </div>

               <div class="row">   
               <div class="col-4">
              <b> Firm Name :</b><br>
              </div>
              <div class="col-8">
              <p> '.$arr['firm_name'].' </p>
              </div>
              </div>

              

                <div class="row">   
                 <div class="col-4">
                <b> Mobile No :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['mobile'].' </p>
                </div>
                </div>

                <div class="row">   
                <div class="col-4">
               <b> Property Type :</b><br>
               </div>
               <div class="col-8">
               <p> '.$arr['type'].' </p>
               </div>
               </div>

               <div class="row">   
                 <div class="col-4">
                <b> Requirement :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['requirement'].' </p>
                </div>
                </div>


                <div class="row">   
                 <div class="col-4">
                <b> Location :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['location'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Area :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['area'].' </p>
                </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div></form>';
}

if(isset($_POST['idImage'])){
  $delid=$_POST['idImage'];
  $sql=mysqli_query($conn,"delete from amenities where id='$delid'");
  if($sql==1){
    echo 1;
  }
  else{
    echo 0;
  }
}

if(isset($_POST['famidImage'])){
  $dnkdelid=$_POST['famidImage'];
  $sql=mysqli_query($conn,"delete from family_members where id='$dnkdelid'");
  if($sql==1){
    echo 1;
  }
  else{
    echo 0;
  }
}


if(isset($_POST['dnkid1'])){
	$sql=mysqli_query($conn,"SELECT * FROM `property` WHERE id='".$_POST['dnkid1']."'");
	$arr=mysqli_fetch_array($sql);
	echo '<div class="modal-header">
              <h4 class="modal-title">'.$arr['user_id'].'</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form method="post" action="form.php">
            <div class="modal-body body1">
                <div class="row">   
                <div class="col-4">
                <b> Property Type :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['property_for'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Client Name :</b><br>
                </div>
                <div class="col-8">
                <p> '.$arr['client_name'].' </p>
                </div>
                </div>

                <div class="row">   
                 <div class="col-4">
                <b> Mobile Number :</b><br>
                </div>
                <div class="col-8">
                <p>'.$arr['mobile_no'].'</p>
                </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div></form>';
}

?>