<?php
    $error1 = "";    
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
                $newAmount = $row['amount'] + $amount;
                
                $q = "update account set amount = {$newAmount} where account_number = $account_number";     // money updated
                mysqli_query($con,$q);
                
                $name = $row['first_name']." ".$row['father_name']." ".$row['surname']; // statements
                date_default_timezone_set("Asia/Kolkata");
                $date = strtoupper(date("d-M-Y"));
                $time = date("H:i:s");
                    
                $q = "insert into statements (type,date,time,name,from_no,amount,account_number) value ('Deposit','$date','$time','$name','---Bank---',$amount,'$account_number')";
                mysqli_query($con,$q);

//   Email //
echo $email = $row['email_id'];

echo $body = "Dear Customer,

I hope you are doing well.

We are pleased to inform you that a deposit has been successfully credited to your account.

Account Details

Name :
".$row['first_name']." ".$row['father_name']." ".$row['surname']."

Account Number :
".$account_number."

Amount Deposited :
".$amount."

The deposited amount is now available in your account balance.

If you did not authorize this transaction or need any assistance, please contact our support team immediately.

Thank you for banking with us.

Best Regards,
Infinity Bank
Customer Support Team";

include 'EMAIL/test.php';

                echo "<script>
                    alert('✅ Amount deposited successfully.');
                    window.location.href='home.php';
                </script>";
                exit();
        }
        else{
             $error1 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }
        mysqli_close($con);
    }
?>