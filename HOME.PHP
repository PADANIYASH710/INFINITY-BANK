<?php include'meta.php'; ?>
<?php include'header.php';
//   count total number of account
	$count_fd = 0;
	$count_loan = 0;
	$count_saving = 0;
	$total_amount = 0;
?>

<!-- 		Saving Account		-->
<?php 
	$con = mysqli_connect("localhost","root","","infinity_bank");
	$q = "select *from account";
	$result = mysqli_query($con,$q);

	while($row = mysqli_fetch_assoc($result)){
		$count_saving = $count_saving + 1;
		$total_amount = $total_amount + $row['amount'];
	}

?>

<!-- 		FD PAYMENT MANAGEMENT		-->
<?php
	$q = "select *from fd_account";
	$result = mysqli_query($con,$q);
	date_default_timezone_set("Asia/Kolkata");
	$current_date = strtoupper(date("d-M-Y"));
	$time = date("h:i:s A");

//  for email
$fd_account_number = "";
$email = "";

	while($row = mysqli_fetch_assoc($result)){
			$count_fd = $count_fd + 1;
		if($row['end_date']<=$current_date){
			$transfer_amount = $row['amount'] + $row['interest'];
			$fd_account_number = $row['fd_account_number'];
			$email = $row['email'];

			$q = "DELETE FROM fd_account WHERE account_number = '".$row['account_number']."'";
			mysqli_query($con,$q);
			$q = "UPDATE account SET amount = amount + $transfer_amount WHERE account_number = '".$row['account_number']."'";
			mysqli_query($con,$q);

			//    statement table insert the data.....
			$account_number = $row['account_number'];			
			$q = "select *from account where account_number = $account_number";
			$result = mysqli_query($con,$q);
			if($row = mysqli_fetch_assoc($result)){
				$name = $row['first_name']." ".$row['father_name']." ".$row['surname']; 

//     email   
$body = "Dear Customer,

This is to inform you that the Fixed Deposit (FD) for the below-mentioned account has matured on the specified date. As per the bank's process, the principal amount along with the applicable interest has been transferred to the respective account.

FD Details:

FD Account Number	: 
".$fd_account_number."

Customer Name		: 
".$name."

Maturity Date		:
".date("d-M-Y")."

Total Amount Transferred	:
".$transfer_amount."

Kindly verify the transaction and update the records accordingly. Please feel free to contact us if any clarification is required.

Thank you.

Regards,
[Your Name]
[Your Designation]
[Branch / Company Name]";
include 'EMAIL/test.php';

				$q = "insert into statements (type,date,time,name,amount,account_number) value ('Deposit','$current_date','$time','$name',$transfer_amount,'$account_number')";
          	    mysqli_query($con,$q);
			}
		}
	}
?>
<!-- 	Gold Loan	-->
<?php 
	$q = "select *from gold_loan";
	$result = mysqli_query($con,$q);
	date_default_timezone_set("Asia/Kolkata");
	$current_date = date("Y-m-d");

	while($row = mysqli_fetch_assoc($result)){
			$count_loan = $count_loan + 1;
		$date = $row['start_date'];
		$new_date = date('Y-m-d', strtotime($date . ' +1 year'));

		if($new_date<=$current_date){
			$interest = $row['loan_amount'] * 0.11;
			$q = "UPDATE gold_loan SET interest = interest + {$interest} , start_date = '{$new_date}' WHERE loan_account_number = {$row['loan_account_number']}";
			mysqli_query($con,$q);

//   email 
$email = $row['email'];
$body = "Dear Customer,

We hope you are doing well.

This is to inform you that the interest for your Gold Loan has been successfully added to your loan account.

Loan Details

Customer Name      : 
".$row['name']."

Account Number     : 
".$row['loan_account_number']."

Loan Type          :
Gold Loan

Interest Amount    : 
₹".$interest."

Date               : 
".date("d-M-Y")."

The above interest amount has been added to your outstanding loan balance.

Please ensure timely repayment to avoid additional charges.

If you have any questions or need assistance, feel free to contact our customer support team.

Thank you for banking with Infinity Bank.

Best Regards,
Infinity Bank
Customer Support Team";
include 'EMAIL/test.php';

		}
	}
?>


<style>
/* Hero Section */
.hero {
    background: linear-gradient(rgba(129, 89, 231, 0.5), rgba(129, 89, 231, 0.2)), 
                url('https://images.unsplash.com/photo-1501167786227-4cba60f6d58f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    padding: 0 20px;
}

.hero-content h1 {
    font-size: 3.5rem;
    margin-bottom: 20px;
}

.hero-content p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-button {
    background: rgba(129, 89, 231, 0.8);
    color: white;
    padding: 15px 35px;
    text-decoration: none;
    font-weight: bold;
    border-radius: 10px;
    transition: transform 0.3s;
}

.cta-button:hover {
    transform: scale(1.05);
}
</style>


<section class="main-section">
		<div class="hero">
       		 <div class="hero-content">
           		 <h1>Welcome to Infinity Bank</h1>
            	 <p>Manage your finances with military-grade security and intuitive tools designed to help you grow your wealth.</p>
           		 <a href="create_account.php"><button class="cta-button">Open an Account Today</button></a>
       		 </div>
		</div>

		<h2>OVERVIEW</h2>
        <div style="border:2px solid white;border-radius:8px;padding:20px 30px;margin:0px 0px 20px 50px;width:50%;line-height: 2;background-color:#6A11CB;">
				<p>Availabel balance</p>
                <p style="font-size:35px;"><b>₹ <?php echo number_format($total_amount,2,'.',',');?></b></p>
		</div>

        <div style="border:2px solid white;border-radius:8px;padding:20px 30px;margin:0px 0px 20px 50px;width:50%;line-height: 2;background-color:#6A11CB;">
				<p>Number of Account</p>
                <div style="display:flex;justify-content:space-around;">
                    <div><p style="font-size:22px;">Saving</p><p style="font-size:25px;"><?php echo $count_saving;?></p></div>
                    <div><p style="font-size:22px;">Fixed Deposit</p><p style="font-size:25px;"><?php echo $count_fd;?></p></div>
                    <div><p style="font-size:22px;">Gold Loan</p><p style="font-size:25px;"><?php echo $count_loan;?></p></div>
                </div>
		</div>

		<h2>ACCOUNT MANAGEMENT</h2>		
		<div class="menu">
			    <a href="CREATE_ACCOUNT.PHP"><div class="property">
					<div class="text">
						<h3>CREATE ACCOUNT</h3>
						<p>Savings <p>
					</div>
					<img src="IMAGE\\CREATE_ACCOUNT.jpg">
			   </div></a>
			   
			   <a href="CHECK_BALANCE.PHP"><div class="property">
					<div class="text">
						<h3>CHECK BALANCE</h3>
					</div>
					<img src="IMAGE\\check_balance.jpg">
			   </div></a>
			   
			   <a href="WITHDRAW.PHP"><div class="property">
					<div class="text">
						<h3>WITHDRAW</h3>
					</div>
					<img src="IMAGE\\WITHDRAW.jpg">
			   </div></a>
			   
			   <a href="DEPOSIT.PHP"><div class="property">
					<div class="text">
						<h3>DEPOSIT</h3>
					</div>
					<img src="IMAGE\\DEPOSIT.jpg">
			   </div></a>

				<a href="DELETE_ACCOUNT.PHP"><div class="property">
					<div class="text">
						<h3>DELETE ACCOUNT</h3>
					</div>
					<img src="IMAGE\\DELETE_ACCOUNT.JPG">
			   </div>
			   
			   <a href="STATEMENTS.PHP"><div class="property">
					<div class="text">
						<h3>STATEMENTS</h3>
					</div>
					<img src="IMAGE\\HISTORY.jpg">
			   </div></a>
			   
			   <a href="VIRTUAL_CARD.PHP"><div class="property">
					<div class="text">
						<h3>VIRTUAL CARD</h3>
						<p>Debit card & Credit card</p>
					</div>
					<img src="IMAGE\\CARD.jpg">
			   </div></a>
			   
			   <a href="ACCOUNT_SETTING.PHP"><div class="property">
					<div class="text">
						<h3>ACCOUNT SETTINGS</h3>
					</div>
					<img src="IMAGE\\setting.jpg">
			   </div></a>
		</div>
		
		<h2>SERVICES</h2>		
		<div class="menu">

			<a href="GOLD_LOAN.PHP"><div class="property">
				<div class="text">
					<h3>LOANS</h3>
					<p>Personal loans<p>
				</div>
				<img src="IMAGE\\loans.jpg">
			</div></a>
			
			<a href="FD.PHP"><div class="property">
				<div class="text">
					<h3>FD</h3>
					<p>Investments<p>
				</div>
				<img src="IMAGE\\fd.jpg">
			</div></a>
		</div>
		
<?php include'footer.php'; ?>