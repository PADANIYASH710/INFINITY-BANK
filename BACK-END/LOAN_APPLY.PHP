<?php
    $error1 = "";$error2="";    
    $account_number = "";$amount = "";$weight = "";$fname="";$father="";$surname="";$email="";$locker_number="";
    $loan_account_number = "";

    if(isset($_POST['s1']))
    {
        $fname=$_POST['t1'];$father=$_POST['t2'];$surname=$_POST['t3'];
        $name = $_POST['t1']." ".$_POST['t2']." ".$_POST['t3'];
        $account_number = $_POST['account_number'];
        $amount =  $_POST['amount'];
        $weight = $_POST['weight'];
        $locker_number = $_POST['locker'];
        $email = $_POST['email'];
        $date = strtoupper(date("Y-m-d"));
        date_default_timezone_set("Asia/Kolkata");

        $con = mysqli_connect("localhost","root","","infinity_bank");

        $q = "SELECT * FROM account where account_number = $account_number";
        $result = mysqli_query($con, $q);

        if($row = mysqli_fetch_assoc($result)) {
                $max_loan_amount = 10000 * $weight;
                if($max_loan_amount < $amount){
                    $error2 = "<p style='color: #e97063;'>Gold weight is less, but loan amount is high.The maximum loan amount is ".$max_loan_amount."</p>";
                }
                else{
                    $q = "insert into gold_loan (name,account_number,gold_weight,locker_number,loan_amount,interest,email,start_date) value('$name','$account_number',$weight,$locker_number,$amount,0,'$email','$date')";
	                mysqli_query($con,$q);

                   $id = mysqli_insert_id($con);
	               $loan_account_number = 8102000000 + (int)$id;
	               $q = "update gold_loan set loan_account_number = {$loan_account_number} where id = {$id}";
	               mysqli_query($con,$q);

                   //   Loan amount transfer to saving account
                   $q = "SELECT * FROM account where account_number = $account_number";
                   $result = mysqli_query($con, $q);

                  if($row = mysqli_fetch_assoc($result)) {
                        $newAmount = $row['amount'] + $amount;
                
                        $q = "update account set amount = {$newAmount} where account_number = $account_number";     // money updated
                        mysqli_query($con,$q);
                
                        $name = $row['first_name']." ".$row['father_name']." ".$row['surname']; // statements
                        $date = strtoupper(date("d-M-Y"));
                        date_default_timezone_set("Asia/Kolkata");
                        $time = date("h:i:s A");
                    
                        $q = "insert into statements (type,date,time,name,amount,account_number) value ('Deposit','$date','$time','$name',$amount,'$account_number')";
                        mysqli_query($con,$q);
                  }
//   email
$body = "Dear Customer,

Congratulations! 🎉

We hope you are doing well.

Your request for a Gold Loan has been successfully submitted to Infinity Bank. Our team will review your application and contact you shortly.

Loan Application Details

Applicant Name      :
 ".$name ."

 Account Number      :
".$loan_account_number."

Loan Type           :
Gold Loan

Requested Amount    :
₹".$amount."

Application Date    :
".date("d-M-Y")."

Please ensure that your gold documents and identification proofs are ready for verification.

Our representative will contact you soon regarding the next steps of your loan process.

Thank you for choosing Infinity Bank.

Best Regards,
Infinity Bank
Customer Support Team";
include 'EMAIL/test.php';

                    echo "<script>
                        alert('✅ LOAN SUCCESSFULLY GRANTED!!!');
                        window.location.href='home.php';
                    </script>";
                exit();
                }
        }
        else{
             $error1 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }
        mysqli_close($con);
    }
?>