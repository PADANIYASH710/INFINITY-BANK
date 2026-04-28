<!--		Back-end		-->
<?php include'back-end/LOAN_APPLY.PHP'; ?>
<!--		Front-end		-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>
	<section class="form-block">
		<div class="sub-form-block">
		<h2 align="center">GOLD LOAD</h2>
		<form method="POST">
			<label>Full Name</label>
			<div class="fullname">
				<input type="text" placeholder="First Name" name="t1" value="<?php echo $fname;?>" required />
				<input type="text" placeholder="Father's Name" name="t2" value="<?php echo $father;?>" required />
				<input type="text" placeholder="Surname" name="t3" value="<?php echo $surname;?>" required />
			</div>

			<br><label>Email Id</label>
			<div class="email">
				<input type="email" value="<?php echo $email;?>" placeholder="ex: myname@example.com" name="email" required >
			</div>

			<br><label for="ac">Account Number </label>
			<div class="account_number">
				<input type="number" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" name="account_number" value="<?php echo $account_number;?>" required>
			</div>
			<?php echo $error1; ?>

			<br><label for="amount">Amount</label>
			<div class="editional">
					<span>₹</span>
					<input type="number" placeholder="amount" min="10000" max="1000000" oninput="if(this.value.length > 6) this.value = this.value.slice(0,7)" id="amount" name="amount" value="<?php echo $amount;?>" required>
			</div>
			<?php echo $error2;?>

			<br><label for="gold">Weight of Gold (g)</label>
			<div>
				<input type="number" placeholder="weight" min="5" max="100" oninput="if(this.value.length > 3) this.value = this.value.slice(0,3)" id="gold" name="weight" value="<?php echo $weight;?>" required>
			</div>

			<br><label for="locker">Locker Number</label>
			<div>
				<input type="number" placeholder="Locker Number" min="1" max="1000" oninput="if(this.value.length > 4) this.value = this.value.slice(0,4)" id="locker" name="locker" value="<?php echo $locker_number;?>" required>
			</div>

			<div class="button">
				<center><input type="submit" value="SUBMIT" name="s1"/></center>
			</div>
		</form>
		</div>
</section>