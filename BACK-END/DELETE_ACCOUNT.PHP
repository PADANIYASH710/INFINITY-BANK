<?php
    $error1 = "";
    $account_number = "";
    $temp = "";
    
    //  for email 
    $email = "";
    $name = "";

    if(isset($_POST['s1']))
    {
        $account_number = $_POST['account_number'];
        
        $con = mysqli_connect("localhost","root","","infinity_bank");

        $q = "SELECT * FROM fd_account where account_number = $account_number";
        $result_fd = mysqli_query($con, $q);

        if(mysqli_num_rows($result_fd) != 0){
            echo "<script>
                        alert('This account will come fd amount and interest.');
                        window.location.href='HOME.PHP';
                    </script>";
            exit();
        }

        $q = "SELECT * FROM account";
        $result = mysqli_query($con, $q);

        while ($row = mysqli_fetch_assoc($result)) {
            if($account_number == $row['account_number']){
                $temp = 1;
                $email = $row['email_id'];
                $name = $row['first_name']." ".$row['father_name']." ".$row['surname'];

                if($row['amount'] == 0){
                    $file_aadhaar_path = "DOCUMENTS/AADHAAR/".$account_number.".jpg";       //   delete the files in server
                    $file_pan_path = "DOCUMENTS/PAN/".$account_number.".jpg";
                    $file_photo_path = "DOCUMENTS/PHOTO/".$account_number.".jpg";
                    $file_signature_path = "DOCUMENTS/SIGNATURE/".$account_number.".jpg";

                    unlink($file_aadhaar_path);
                    unlink($file_pan_path);
                    unlink($file_photo_path);
                    unlink($file_signature_path);

                    $q = "delete from account where account_number = {$account_number}";
                    //  record deleted 
                    mysqli_query($con,$q);
                }
                else{
                     echo "<script>
                        alert('The balance should always be zero.');
                        window.location.href='HOME.PHP';
                    </script>";
                    exit();
                }
            }
        }

        $q = "SELECT * FROM account";
        $result = mysqli_query($con, $q);

        while($row = mysqli_fetch_assoc($result)){      //  nominee record deleted
            if($account_number == $row['account_number']){
                $q = "delete from nominee where account_number = {$account_number}";
                mysqli_query($con,$q);
            }
        }

        $q = "SELECT * FROM virtual_cards";
        $result = mysqli_query($con, $q);

        while($row = mysqli_fetch_assoc($result)){      //  card block
            if($account_number == $row['account_number']){
                $q = "delete from virtual_cards where account_number = {$account_number}";
                mysqli_query($con,$q);
            }
        }

        if($temp != 1){
            $error1 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }
        if($temp == 1){
//   email  
$body = "Dear Customer,

We hope you are doing well.

This email is to inform you that your bank account has been successfully closed as per your request.

Account Details

Account Holder Name     : 
".$name."

Account Number      : 
".$account_number."

Your account is no longer active, and all associated banking services have been discontinued.

If you did not request this action or have any questions, please contact our customer support team immediately.

Thank you for banking with us.

Best Regards,
Infinity Bank
Customer Support Team";
include 'EMAIL/test.php';
            echo "<script>
                        alert('✅ The account will be permanently deleted.');
                        window.location.href='home.php';
                    </script>";
            exit();
        }
        mysqli_close($con);
    }
?>