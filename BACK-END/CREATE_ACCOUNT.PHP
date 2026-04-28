<?php
	$error1="";$error2="";$error3="";$error4 = "";
	$fname="";$father="";$surname="";$dob="";$mobile="";$email="";$address="";$gender="";$aadhaar="";$pan="";

if(isset($_POST['s1'])){

	$fname =  $_POST["t1"];			//  table : account data saved
	$fathar = $_POST["t2"];		
	$surname = $_POST["t3"];
	$dob = $_POST["t4"];
	$mobile =  $_POST["t5"];
	$email = $_POST["t6"];
	$address = $_POST["t7"];
	$gender = $_POST["gender"];
	$aadhaar = (int)$_POST["t8"];
	$pan =  $_POST["t9"];

	if(
    	!(empty($_FILES['signature']['name'])) &&
    	!(empty($_FILES['photo']['name'])) &&
    	!(empty($_FILES['aadhaar']['name'])) &&
    	!(empty($_FILES['pan']['name']))
	){	

	$con = mysqli_connect("localhost","root","","infinity_bank");
	$q = "insert into account (first_name,father_name,surname,dob,mobile_no,email_id,address,gender,aadhaar_no,pan_no,amount) value('$fname','$fathar','$surname','$dob','$mobile','$email','$address','$gender','$aadhaar','$pan',0)";
	mysqli_query($con,$q);

	$id = mysqli_insert_id($con);
	$account_number = 7102005000 + (int)$id;
	$q = "update account set account_number = {$account_number} where id = {$id}";
	mysqli_query($con,$q);
	}

	$n_fname = $_POST["nt1"];		//  table : nominee data saved(option)
	$n_father = $_POST["nt2"];
	$n_surname = $_POST["nt3"];
	$n_relationship = $_POST["nt4"];
	$n_address = $_POST["nt5"];

	if($n_fname!="" || $n_father!="" || $n_surname!="" || $n_relationship!="" || $n_address!="")	// option data saved in database
	{
		$q = "insert into nominee (n_first_name,n_father_name,n_surname,relationship,n_address,account_number) value ('$n_fname','$n_father','$n_surname','$n_relationship','$n_address','$account_number')";
		mysqli_query($con,$q);
	}


	if(isset($_FILES['signature']) && $_FILES['signature']['error'] == 0){   //   signature upload
	
        $tmp_name = $_FILES['signature']['tmp_name'];
		$extension = pathinfo($_FILES['signature']['name'],PATHINFO_EXTENSION);

        $upload_path = "DOCUMENTS/SIGNATURE/" .$account_number.".".$extension;
        move_uploaded_file($tmp_name, $upload_path);
	}

	if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){     //      photo upload

        $tmp_name = $_FILES['photo']['tmp_name'];
		$extension = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);


        $upload_path = "DOCUMENTS/PHOTO/" .$account_number.".".$extension;

        move_uploaded_file($tmp_name, $upload_path);
	}

	if(isset($_FILES['pan']) && $_FILES['pan']['error'] == 0){		// 		pan card upload

        $tmp_name = $_FILES['pan']['tmp_name'];
		$extension = pathinfo($_FILES['pan']['name'],PATHINFO_EXTENSION);

        $upload_path = "DOCUMENTS/PAN/" .$account_number.".".$extension;

        move_uploaded_file($tmp_name, $upload_path);
	}

	if(isset($_FILES['aadhaar']) && $_FILES['aadhaar']['error'] == 0){		//  aadhaar card upload

        $tmp_name = $_FILES['aadhaar']['tmp_name'];
		$extension = pathinfo($_FILES['aadhaar']['name'],PATHINFO_EXTENSION);

        $upload_path = "DOCUMENTS/AADHAAR/" .$account_number.".".$extension;

        move_uploaded_file($tmp_name, $upload_path);
	}

	if(empty($_FILES['signature']['name'])) {
    $error1 = "<p style='color: #e97063;'>Signature not uploaded. Please upload your signature.</p>";
	}
	if(empty($_FILES['photo']['name'])){
		$error2 = "<p style='color: #e97063;'>Photo not uploaded. Please upload your photo.</p>";
	}
	if(empty($_FILES['aadhaar']['name'])){
		$error3 = "<p style='color: #e97063;'>Aadhaar card not uploaded. Please upload your aadhaar card.</p>";
	}
	if(empty($_FILES['pan']['name'])){
		$error4 = "<p style='color: #e97063;'>Pan card not uploaded. Please upload your signature.</p>";
	}

	if($error1=="" and $error2=="" and $error3=="" and $error4==""){
		
//   Email //
$body = "Dear Customer,

Congratulations! 🎉

Your bank account has been successfully created in our banking system.

Account Details:

Account Holder Name   :
".$fname." ".$fathar." ".$surname."

Account Number      :
".$account_number."

Account Type       :
Savings Account

Opening Date       :
".date('d-M-Y')."



If you have any questions, please contact our support team.

Thank you for choosing our bank.

Best Regards,
Infinity Bank
Customer Support Team";

include 'EMAIL/test.php';
		
		echo "<script>
			alert('✅ Your account has been created successfully.Welcome !');
			window.location.href='home.php';
		</script>";
		exit();
	}
}
?>