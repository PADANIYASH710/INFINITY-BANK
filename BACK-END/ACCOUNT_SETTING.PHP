<?php 
    $error1 = "";$account_number="";$temp = "";

    if(isset($_POST['s1'])){
        $account_number = $_POST['account_number'];

        $con = mysqli_connect("localhost","root","","infinity_bank");
        $q = "select *from account where account_number = $account_number";
        $result1 = mysqli_query($con,$q);

        $q = "select *from nominee where account_number = $account_number";
        $result2 = mysqli_query($con,$q);
        
        $q = "select *from virtual_cards where account_number = $account_number";
        $result3 = mysqli_query($con,$q);

        if(mysqli_num_rows($result1)!=0){
            $temp = 1;
            include 'VIEW.PHP';
        }

        
        //  error of wrong account number 
        if(mysqli_num_rows($result1)==0){
            $error1 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }   
    }
?>
