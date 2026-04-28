<?php include'meta.php'; ?>
<?php include'header.php'; ?>
<?php include'BACK-END/ACCOUNT_SETTING.PHP';?>	
<?php if(!(isset($_POST['s1'])) or $temp != 1){ ?>
	<section class="form-block">
	<div class="sub-form-block">
	<h2 align="center">ACCOUNT SETTING</h2>		
		<form method="POST">
			<label for="ac">Account Number </label>
			<div class="account_number">
				<input type="number" name="account_number" value="<?php echo $account_number;?>" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" required>
			</div>
			<?php echo $error1;?>

			<div class="button">
				<center><input type="submit" value="SUBMIT" name="s1"/></center>
			</div>
		</form>
	</div>
	</section>
<?php } ?>