<!--		Back-end		-->
<?php include'back-end/WITHDRAW.php'; ?>

<!--		Front-end 		-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>
	
	<section class="form-block">
		<div class="sub-form-block">
		<h2 align="center">WITHDRAW</h2>		
		<form method="POST"> 
			<label for="ac">Account Number </label>
			<div class="account_number">
				<input type="number" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" value="<?php echo $account_number;?>" name="account_number" required>
			</div>
			<?php echo $error1; ?>

			<br><label for="amount">Amount</label>
			<div class="editional">
					<span>₹</span>
					<input type="number" placeholder="amount" min="1" max="10000" oninput="if(this.value.length > 5) this.value = this.value.slice(0,5)" id="amount" required value="<?php echo $amount;?>" name="amount"/>
			</div>
			<?php echo $error2; ?>
			
			<div class="button">
				<center><input type="submit" value="WITHDRAW" name="s1"/></center>
			</div>
		</form>
		</div>
	</section>