<?php include'meta.php'; ?>
<?php include'header.php';

    $con = mysqli_connect("localhost","root","","infinity_bank");
    $q = "select *from statements ORDER BY id DESC;";
    $result = mysqli_query($con, $q);

    echo "
        <div class='contain' id='pdfContent'>";

        while ($row = mysqli_fetch_assoc($result)) {
            $account_number = $row['account_number'];
            $amount = $row['amount'];
            $type = $row['type'];
            $date = $row['date'];
            $time = $row['time'];
            $name = $row['name'];
            $sender = $row['from_no'];
            
    echo "
        <div class='record'>
            <div class='text1'>
                <h3>".$type."</h3><br>
                <h4>".$date."</h4>
                <h4>".$time."</h4>
            </div>
            <div class='text2' style='margin-right:30%;'>
                <p style='font-size: 25px;'><b>".$account_number."<b></p><br>
                <h3>".$name."</h3>  
            </div>
            <div class='text3' style='width:180px;'>";
                if($type=='Withdraw'){
                        echo "<p style='font-size: 30px;color:rgb(252, 103, 103);'>₹ -".$amount."</p><br>
                              From : ".$sender;
                }
                else {
                    echo "<p style='font-size: 30px;color:rgb(66, 237, 143);'>₹ +".$amount."</p><br>
                           From : ".$sender;
               }
                    echo "</div>
                </div>";

        }
        echo "</div>";
?> 