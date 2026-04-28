<?php
    $error = "";
    $temp = "";
    $amount = "";
    $fname = "";
    $father = "";
    $surname = "";
    $account_number = "";

    if(isset($_POST["s1"])){
        $account_number = $_POST['account_number'];

        $con = mysqli_connect("localhost","root","","infinity_bank");

        $q = "SELECT * FROM account where account_number = {$account_number}";
        $result = mysqli_query($con, $q);

        if($row = mysqli_fetch_assoc($result)) {
                    $temp = 1;
                    $account_number = $row['account_number'];
                    $amount = $row['amount'];
                    $fname = $row['first_name'];
                    $father = $row['father_name'];
                    $surname = $row['surname'];
            
        }
        else
        {
            $error = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }
    }
?>