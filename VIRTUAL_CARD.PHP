<!--	FRONT-END	-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>
<!--	BACK-END	-->
<?php include'BACK-END/VIRTUAL_CARD.PHP';?>

<?php if(!(isset($_POST['s1'])) or $temp != 1){ ?>
	<section class="FORM-BLOCK">
		<div class="sub-form-block">
		<h2 align="center">VIRTUAL CARD</h2>
		<form method="POST">
			<label for="ser">Services</label>
			<div class="dropdown">
				<select id="ser" name="service" required>
					<option value="">- - Services - -
					<option value="block_card">Block Card
					<option value="activate_card">Activate Card
					<option value="view_card">View Card 
				</select>
			</div>
			<?php echo $error1; ?>
	
			<br><label for="ac">Account Number </label>
			<div class="account_number">
				<input type="number" name="account_number" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" value="<?php echo $account_number;?>" required>
			</div>
			<?php echo $error2; ?>

			<div class="button">
					<center><input type="submit" value="SUBMIT" name="s1" /></center>
			</div>
		</form>
	</div>
</section>
<?php }?>