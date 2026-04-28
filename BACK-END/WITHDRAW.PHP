<?php
    $error1 = "";
    $error2 = "";
    $temp = "";

    $account_number = "";
    $amount = "";
    
    if(isset($_POST['s1']))
    {
        $account_number = $_POST['account_number'];
        $amount =  $_POST['amount'];

        $con = mysqli_connect("localhost","root","","infinity_bank");

        $q = "SELECT * FROM account where account_number = $account_number";
        $result = mysqli_query($con, $q);

        if($row = mysqli_fetch_assoc($result)) {
            $temp = 1;
                if($row['amount'] >= $amount){
                    $newAmount = $row['amount'] - $amount;
                    
                    $q = "update account set amount = {$newAmount} where account_number = $account_number";     //  money updated from account table
                    mysqli_query($con,$q);

                    $name = $row['first_name']." ".$row['father_name']." ".$row['surname'];  // statements
                    date_default_timezone_set("Asia/Kolkata");
                    $date = strtoupper(date("d-M-Y"));
                    $time = date("H:i:s");
                    
                   $q = "insert into statements (type,date,time,name,from_no,amount,account_number) value ('Withdraw','$date','$time','$name','---Bank---',$amount,'$account_number')";
                   mysqli_query($con,$q);

//   Email //
$email = $row['email_id'];

$body = "Dear Customer,           

I hope you are doing well.

I would like to request a withdrawal from my account. Kindly process my withdrawal request for the available balance in my account.

Account Details

Name    :  
".$row['first_name']." ".$row['father_name']." ".$row['surname']."

Account Number      :
".$account_number."

Amount to Withdraw      :
".$amount."

Please let me know if any further information is required from my side.

Thank you for your support.

Best Regards,
Infinity Bank
Customer Support Team";
include 'EMAIL/test.php';

        echo "<script>
                alert('✅ Amount Withdrawal successfully.');
                window.location.href='home.php';
         </script>";
        exit();
                }
                else{
                   $error2 = "<p style='color: #e97063;'>❌ Not enough money in your account.</p>";
                }
            
        }
        else{
            $error1 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }
        mysqli_close($con);
    }
?>