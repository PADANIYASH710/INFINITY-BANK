<?php
$error1 = "";$error2 = "";    
$account_number = "";

// for email 
$email = "";

if(isset($_POST['s1']))
{
    $account_number = $_POST['account_number'];
    $type = $_POST['type_d'];

    $con = mysqli_connect("localhost","root","","infinity_bank");

    $q = "SELECT * FROM gold_loan WHERE loan_account_number = '$account_number'";
    $result = mysqli_query($con, $q);

    if($row = mysqli_fetch_assoc($result)) {

        // Update based on type
        if($type == 'interest'){ 
            if($row['interest'] == 0){
                $error2 = "<p style='color: #e97063;'>Interest amount is already zero.</p>";
            }
            else{
                $q = "UPDATE gold_loan SET interest = 0 WHERE loan_account_number = '$account_number'";
                mysqli_query($con,$q);

                echo "<script>
                    alert('✅ Interest deposited successfully.');
                    window.location.href='home.php';
                </script>";
                exit();
            }
        }

        if($type == 'loan_amount'){
            if($row['interest'] == 0){
                $q = "UPDATE gold_loan SET loan_amount = 0 WHERE loan_account_number = '$account_number'";
                mysqli_query($con,$q);
                $q = "delete from gold_loan WHERE loan_account_number = '$account_number'";
                mysqli_query($con,$q);

//  email 
$email = $row['email'];
$body = "Dear Customer,

We hope you are doing well.

This is to inform you that your Gold Loan with Infinity Bank has been successfully closed after receiving the full repayment.

Loan Closure Details

Customer Name      : 
".$row['name']."

Account Number     :
".$row['loan_account_number']."

Loan Type          :
Gold Loan

Closure Date       : 
".date("d-m-Y")."

Your loan account is now fully settled and no outstanding balance remains.

Thank you for your timely payments and for choosing Infinity Bank.

If you have any questions or require further assistance, please feel free to contact our customer support team.

Best Regards,
Infinity Bank
Customer Support Team";
include 'EMAIL/test.php';

                echo "<script>
                    alert('✅ The loan has been successfully closed.');
                    window.location.href='home.php';
                </script>";
                exit();
            }
            else{
                $error2 = "<p style='color: #e97063;'>Interest amount is not zero.</p>";
            }
        }
        
    }
    else{
        $error1 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
    }

    mysqli_close($con);
}
?>