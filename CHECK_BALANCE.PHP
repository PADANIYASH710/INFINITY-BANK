<!--		Back-end		-->
<?php include'BACK-END/CHECK_BALANCE.PHP'; ?>
<!--		Front-end		-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>	
<?php if(!(isset($_POST['s1'])) or $temp != 1){ ?>
	<section class="form-block">
		<div class="sub-form-block">
		<h2 align="center">CHECK BALANCE</h2>
		<form method="POST">
			<label for="ac">Account Number </label>
			<div class="account_number">
				<input type="number" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="ac" value="<?php echo $account_number; ?>" name="account_number" required>
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
               			<pre><b>Name                                ".$fname."  ".$father."  ".$surname."</b></pre><br>
            			<pre><b>Account Number             ".$account_number."</b></pre><br><br>
            			<pre><b>Amount                            ₹ ".number_format($amount)."</b></pre>
        		</div>";
			}
?>