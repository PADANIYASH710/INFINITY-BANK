<?php
    $error = "";$temp = "";

    $weight="";$email="";$name = "";$start_date = "";$amount = "";$interest = "";$locker_number = "";$loan_account_number="";

    if(isset($_POST["s1"])){
        $loan_account_number = $_POST['account_number'];

        $con = mysqli_connect("localhost","root","","infinity_bank");

        $q = "SELECT * FROM gold_loan where loan_account_number = {$loan_account_number}";
        $result = mysqli_query($con, $q);

        if($row = mysqli_fetch_assoc($result)) {
                    $temp = 1;
                    $name = $row['name'];
                    $start_date = $row['start_date'];
                    $amount = $row['loan_amount'];
                    $interest = $row['interest'];
                    $account_number = $row['account_number'];
                    $locker_number = $row['locker_number'];
                    $weight = $row['gold_weight'];
                    $email = $row['email'];
        }
        else
        {
            $error = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }
    }
?>