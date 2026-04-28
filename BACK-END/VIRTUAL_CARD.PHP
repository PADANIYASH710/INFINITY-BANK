<?php
    $account_number = "";$card_number = "";$pin = "";
    $error1 = "";$error2="";
    $temp = "";

    if(isset($_POST['s1'])){
        $service = $_POST['service'];
        $account_number = $_POST['account_number'];

        $con = mysqli_connect("localhost","root","","infinity_bank");
        $q = "select *from virtual_cards where account_number = '$account_number'";
        $result1 = mysqli_query($con,$q);
            
        $q = "select *from account where account_number = '$account_number'";
        $result2 = mysqli_query($con,$q);

        //  activate_card option then
        if($service == 'activate_card'){
            if(mysqli_num_rows($result1)==0 and mysqli_num_rows($result2)!=0){
                $temp = 1;
                //  Database connection
                $q = "insert into virtual_cards (account_number) value ($account_number)";      
                mysqli_query($con,$q);
                
                $id = mysqli_insert_id($con);
                $card_number = 1000 + (int)$id;
                $pin = 1100 + (int)$id;

                $q = "update virtual_cards set card_number = {$card_number} , pin = {$pin} where id = {$id}";
                mysqli_query($con,$q);
                
                include'CARD.PHP'; // CARD FILE
            }
            else{
                if(mysqli_num_rows($result1)!=0){
                    $error1 = "<p style='color: #e97063;'>The card was already added to your account earlier.</p>";
                }
            }
        }

        // block card option then
        if($service == 'block_card'){
            //  error of card is exist
            if(mysqli_num_rows($result1)==0){
                    $error1 = "<p style='color: #e97063;'>This account number does not have a card.</p>";
            }  
            else{
                $q = "delete from virtual_cards where account_number = $account_number";
                mysqli_query($con,$q);       
                echo "<script>
	            	    alert('✅ Debit card has been blocked.');
		                window.location.href='home.php';
	            </script>";

	            exit();
            }   
        }

        //  view card option then
        if($service == 'view_card'){
            //  error of card is exist
            if(mysqli_num_rows($result1)==0){
                $error1 = "<p style='color: #e97063;'>This account number does not have a card.</p>";
            }  
            else
            {
                $temp = 1;
                $row = mysqli_fetch_assoc($result1);
                $pin = $row['pin'];
                $card_number = $row['card_number'];
                include 'CARD.PHP';
            }
        }

        //  error of wrong account number 
        if(mysqli_num_rows($result2)==0){
                    $error2 = "<p style='color: #e97063;'>Incorrect Account Number</p>";
        }   
    }
?>