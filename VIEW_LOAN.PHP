<!--		Back-end		-->
<?php include'BACK-END/VIEW_LOAN.PHP'; ?>
<!--		Front-end		-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>	
<?php if(!(isset($_POST['s1'])) or $temp != 1){ ?>
	<section class="form-block">
		<div class="sub-form-block">
		<h2 align="center">LOAN DETAILS</h2>
		<form method="POST">
			<label for="ac">Loan Account Number </label>
			<div class="account_number">
				<input type="number" value="<?php echo $loan_account_number;?>" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" value="<?php echo $account_number; ?>" name="account_number" required>
			</div>
			<?php echo $error;?>

			<div class="button">
				<center><input type="submit" value="VIEW" name="s1"/></center>
			</div>
		</form>
		</div>
</section>
<?php }?>

<?php 
		if($temp == 1){
			 echo "
            <div class ='exit'>
                    <a href='../INFINITY_BANK/HOME.PHP'><button name='e1'>EXIT</button></a>
            </div>
            <div class='contain' style='height: 512px;px;'>";

			echo "	<div style='width : 100%;border : 2px solid white;border-radius : 10px;padding:30px 17% 30px 17%;font-size :22px;line-height:5vh;'>
               			<pre><b>Name                                            ".$name."</b></pre>
            			<pre><b>Loan Account Number                ".$loan_account_number."</b></pre>
                        <pre><b>Start Date                                      ".date("d-M-Y", strtotime($start_date))."</b></pre>
                        <pre><b>Locker Number                             ".$locker_number."</b></pre>
                        <pre><b>Gold Weight(g)                             ".$weight."</b></pre>
                        <pre><b>Email                                             ".$email."</b></pre><br><br>
            			<pre><b>Loan Amount                                ₹ ".number_format($amount)."</b></pre>
                        <pre><b>Interest ( 11% annual )                 ₹ ".number_format($interest)."</b></pre>
        		</div>";
			}
?>