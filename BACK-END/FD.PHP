<?php
    $error1 = "";$error2 = "";
    $account_number = "";$amount = "";$time = "";$email = "";

    if(isset($_POST['s1'])){
        $account_number = $_POST['account_number'];
        $amount = $_POST['amount'];
        $time = $_POST['time'];   
        $email = $_POST['email'];

        $con = mysqli_connect("localhost","root","","infinity_bank");
        $q = "select *from account where account_number = $account_number";
        $result1 = mysqli_query($con,$q);
        $q = "select *from fd_account where account_number = $account_number";
        $result2 = mysqli_query($con,$q);

        if(mysqli_num_rows($result2)==0 and mysqli_num_rows($result1)!=0){
            $interest = $amount * 0.1 * $time;
            $start_date = strtoupper(date("d-M-Y"));
            $end_date = strtoupper(date("d-M-Y",strtotime("+1 year"))); 
            
            $q = "insert into fd_account (account_number , end_date , start_date , amount , interest , time , email ) value('$account_number','$end_date','$start_date',$amount,$interest,$time,'$email')";
            mysqli_query($con,$q);

            $id = mysqli_insert_id($con);
            $fd_account_number = 9121996000  + (int)$id;
            $q = "update fd_account set fd_account_number = {$fd_account_number} where id = {$id}";
            mysqli_query($con,$q);

//      email  
$body = "Dear Customer,

We hope you are doing well.

We are pleased to inform you that your Fixed Deposit (FD) account has been successfully created with Infinity Bank.

FD Account Details

Account Number     :
".$account_number."

FD Amount          : 
₹".$amount."

Interest Rate      : 
10 % annual

Start Date         : 
".$start_date."

End Date           :
".$end_date."

Your Fixed Deposit has been successfully registered and will earn interest as per the applicable rate.

Thank you for choosing Infinity Bank for your financial investments.

Best Regards,
Infinity Bank
Customer Support Team";
include 'EMAIL/test.php';

            echo "<script>
            alert('✅ Your FD account has been created successfully.Welcome!');
            window.location.href='home.php';
            </script>";

            exit();
        }  
        
        //  account number when used in fd
        if(mysqli_num_rows($result2)!=0){
             $error2 = "<p style='color: #e97063;'>FD account number already exists.</p>";
        }
        
         //  error of wrong account number 
        if(mysqli_num_rows($result1)==0){
                $error1 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }
    }
?>