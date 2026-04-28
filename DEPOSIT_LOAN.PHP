<!--		Back-end		-->
<?php include'back-end/DEPOSIT_LOAN.php'; ?>
<!--		Front-end		-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>
	<section class="form-block">
		<div class="sub-form-block">
		<h2 align="center">DEPOSIT</h2>
		<form method="POST">
			<label for="ac">Loan Account Number </label>
			<div class="account_number">
				<input name="account_number" type="number" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" value="<?php echo $account_number;?>" required>
			</div>
			<?php echo $error1; ?>

            <br><label for="type">Type Of DEPOSIT</label>
			<div class="dropdown">
				<select id="type" name="type_d" required>
					<option value="">- - Type - -
					<option value="interest">INTEREST
					<option value="loan_amount">LOAN AMOUNT
				</select>
			</div>
			<?php echo $error2;?>
			
			<div class="button">
				<center><input type="submit" value="SUBMIT" name="s1"/></center>
			</div>
		</form>
		</div>
	</section>