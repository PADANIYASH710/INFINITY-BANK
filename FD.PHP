<?php include'meta.php'; ?>
<?php include'header.php'; ?>
<?php include'BACK-END/FD.PHP';?>

	<section class="form-block">
		<div class="sub-form-block">
		<h2 align="center">FD ACCOUNT</h2>		
		<form method="POST">
			<label for="ac">Account Number ( Saving )<sup>*</sup></label>
			<div class="account_number">
				<input type="number" name="account_number" value="<?php echo $account_number; ?>" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" required>
			</div>
			<?php echo $error1;echo $error2;?>

			<br><label for="amount">Amount <sup>*</sup></label>
			<div class="editional">
					<span>₹</span>
					<input type="number" name="amount" value="<?php echo $amount; ?>" placeholder="amount" min="5000" max="10000000" oninput="if(this.value.length > 6) this.value = this.value.slice(0,6)" id="amount" required>
			</div>

			<br><label for="ac">Time ( Min 1 Year ) <sup>*</sup></label>
			<div class="time">
				<input type="number" name="time" value="<?php echo $time; ?>" placeholder="Time" min="1" max="10" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" required>
			</div>

			<br><label>Email Id<sup>*</sup></label>
			<div class="email">
				<input type="email" value="<?php echo $email;?>" placeholder="ex: myname@example.com" name="email" required >
			</div>

			<div class="button">
				<center><input type="submit" value="SUBMIT" name="s1"/></center>
			</div>
		</form>
		</div>
	</section>