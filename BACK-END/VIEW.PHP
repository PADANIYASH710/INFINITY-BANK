<style>
body{
    font-family: Arial, sans-serif;
    background:#8159e7;
}

.container{
    width:800px;
    margin:20px auto;
    background:#6A11CB;
    border:2px solid white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

.profile-image{
    width:200px;
    height:200px;
    border:2px solid #fff;
    margin:0 auto 20px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.profile-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-bottom:20px;
}

table, td{
    border:1px solid #fff;
}

td{
    padding:8px;
}

.section-title{
    font-weight:bold;
    margin:15px 0 5px;
}

.virtual-card{
    margin-bottom:20px;
    background-color:#fff;
    padding:60px 200px 10px;
    border-radius:8px;
}
</style>
<body>
                
<div class="container">
    <h2>Account Details</h2>

    <div class="profile-image">
        <img src="DOCUMENTS\PHOTO\<?php echo $account_number.".jpg";?>" alt="Image">
    </div>
<?php   if($row = mysqli_fetch_assoc($result1)){  ?>
    <br><div class="section-title">Holder Details</div>
    <table>
        <tr>
            <td>Account Number</td>
            <td><?php echo $row['account_number'];?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $hname = $row['first_name']." ".$row['father_name']." ".$row['surname'];?></td>
        </tr>
        <tr>
            <td>DOB</td>
            <td><?php echo $row['dob'];?></td>
        </tr>
        <tr>
            <td>Mobile Number</td>
            <td><?php echo $row['mobile_no'];?></td>
        </tr>
        <tr>
            <td>Email Id</td>
            <td><?php echo $row['email_id'];?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $row['address'];?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $row['gender'];?></td>
        </tr>
        <tr>
            <td>Aadhaar Number</td>
            <td><?php echo $row['aadhaar_no'];?></td>
        </tr>
        <tr>
            <td>PAN Number</td>
            <td><?php echo $row['pan_no'];?></td>
        </tr>
    </table>
<?php } ?>

<?php if($row = mysqli_fetch_assoc($result3)){ ?>
    <br><div class="section-title">Virtual Card</div>
    
    <div class="virtual-card">
        <div class="card" style="width:395px;height:255px;border-radius:18px;padding:20px;color:#fff;box-shadow:0 10px 25px rgba(0,0,0,0.2);background: linear-gradient(135deg,#2b2b2b 0%,#1a1a1a 50%,#000000 100%);margin-bottom:50px;">
                <div class="logo" style="display:flex;align-items:center;gap:10px;font-weight:bold;font-size:18px;">
                    <img src="image/logo_title_tab.png" alt="Infinity Bank" height="40px" width="40px">
                    Infinity Bank
                </div>

                <div class="chip">
                    <img src="image/chip.jpg" alt="chip" style="border:2px solid white;width:55px;height:40px;border-radius:6px;margin:25px 0px;">
                </div>

                <div class="number" style="letter-spacing:3px;font-size:18px;margin-bottom:10px;">
                    7105 4546 8586 <?php echo $row['card_number']; ?>
                </div>

                <div class="footer" style="display:flex;justify-content:space-between;align-items:center;font-size:14px;">
                    <div><?php echo strtoupper($hname); ?></div>
                    <div>No Expire</div>
                </div>

                <div class="type" style="display:flex;flex-direction:row-reverse;font-weight:bold;font-size:14px;">DEBIT CARD</div>
                </div>
        </div>
    <!-- Card Details -->
    <table>
        <tr>
            <td>Card No</td>
            <td>7105 4546 8586 <?php echo $row['card_number'];?></td>
        </tr>
        <tr>
            <td>PIN</td>
            <td><?php echo $row['pin'];?></td>
        </tr>
    </table>
<?php } ?>

<?php if($row = mysqli_fetch_assoc($result2)){ ?>
    <br><div class="section-title">Nominee</div>
    <table>
        <tr>
            <td>Name</td>
            <td><?php echo $row['n_first_name']." ".$row['n_father_name']." ".$row['n_surname'];?></td>
        </tr>
        <tr>
            <td>Relationship</td>
            <td><?php echo $row['relationship'];?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $row['n_address'];?></td>
        </tr>
    </table>
<?php } ?>

    <!--    Signature    -->
    <br><div class="section-title">Signature</div>
        <div style="width:100%;">
            <img src="DOCUMENTS\SIGNATURE\<?php echo $account_number.".jpg";?>" style="width:100%;height:350px;" alt="Image">
        </div>
    </div>

</div>
</body>