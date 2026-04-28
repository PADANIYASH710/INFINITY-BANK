<!--	Front-end	 	-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>

<!--	Back-end	-->
<?php include'BACK-END/STATEMENTS.PHP'; ?>

<?php if(!(isset($_POST['s1'])) or $temp == 0){  ?>
<section class="form-block">
	<div class="sub-form-block">
	<h2 align="center">STATEMENTS</h2>		
		<form method="POST" action = "STATEMENTS.php">
			<label for="ac">Account Number </label>
			<div class="account_number">
				<input type="number" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" name="account_number" value="<?php echo $account_number;?>" required>
			</div>
			<?php echo $error1;?>

			<div class="button">
				<center><input type="submit" value="VIEW" name="s1"/></center>
			</div>
		</form>
	</div>
</section>
<?php }  ?>