<!--	Back-end code	-->
<?php include'back-end/create_account.php'; ?>

<!--	Front - end  Code	-->

<?php include'meta.php'; ?>
<?php include'header.php'; ?>

<section class="form-block">
		<form method="POST" enctype="multipart/form-data">	
		<div class="sub-form-block">	<!--	First Block		-->
			<h2 align="center">PERSONAL INFORMATION</h2>
				<label>Full Name<sup>*</sup></label>
				<div class="fullname">
					<input type="text" placeholder="First Name" name="t1" value="<?php echo $fname;?>" required />
					<input type="text" placeholder="Father's Name" name="t2" value="<?php echo $father;?>" required />
					<input type="text" placeholder="Surname" name="t3" value="<?php echo $surname;?>" required />
				</div>
				
				<br><label>Birth Date<sup>*</sup></label>
				<div class="dob">
					<input type="date" name="t4" value="<?php echo $dob;?>" required />
				</div>
				
				<br><label>Mobile Number<sup>*</sup></label>
				<div class="editional">
					<span for="number">+91</span>
					<input type="number" value="<?php echo $mobile;?>" placeholder="XXXXXXXXXX" min="1000000000" max="9999999999" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10)" id="number" name="t5" required>
				</div>
				
				<br><label>Email Id<sup>*</sup></label>
				<div class="email">
					<input type="email" value="<?php echo $email;?>" placeholder="ex: myname@example.com" name="t6" required >
				</div>
				
				<br><label>Address<sup>*</sup></label>
				<div class="address">
					<input type="text" value="<?php echo $address;?>" placeholder="address" required style="width:100%;" name="t7">
				</div>
				
				<br><label>Gender<sup>*</sup></label>
				<div class="radio">
					<label for="male">Male</label>
					<input type="radio" name="gender" style="width:50px;" id="male" value="male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male') echo "checked"; ?>>
					<label for="female">Female</label>
					<input type="radio" name="gender" style="width:50px;" id="female" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female') echo "checked"; ?>>
				</div>
		</div>

		<div class="sub-form-block">	<!--	Second Block 	-->
			<h2 align="center">KYC DETAILS</h2>	
				<label>Aadhaar Card Number<sup>*</sup></label>
				<div class="aadhaar">
					<input type="number" value="<?php echo $aadhaar;?>" placeholder="XXXX XXXX XXXX" min="100000000000" max="999999999999" oninput="if(this.value.length > 12) this.value = this.value.slice(0,12)"
 					id="number" name="t8" required>
				</div>
				
				<br><label>PAN Number<sup>*</sup></label>
				<div class="pan">
					<input type="text" value="<?php echo $pan;?>" placeholder="XXXXXXXXXX" maxlength="10" name="t9" required />
				</div>
				
				<br><label>Signature<sup>*</sup></label>
				<div class="document">
					<div class="container"></div>
					<div class="text_d">
						<label for="sign" aria-hidden>
						<i class="fa fa-solid fa-arrow-up-from-bracket" style="font-size:30px;"></i>
						</label>
						<input id="sign" type="file" accept="image/*" name="signature" onchange="change_back1()"/>
					</div>
				</div> 
				<?php echo $error1;?>

				<br><label>Photograph(Passport Size)<sup>*</sup></label>
				<div class="document">
					<div class="container"></div>
					<div class="text_d">
						<label for="photo" aria-hidden>
						<i class="fa fa-solid fa-arrow-up-from-bracket" style="font-size:30px;"></i>
						</label>
						<input id="photo" type="file" accept="image/*" name="photo" onchange="change_back2()" />
					</div>
				</div>
				<?php echo $error2;?>
		</div>

		<div class="sub-form-block">	<!--	Third Block		-->
		<h2 align="center">NOMINEE DETAILS</h2>
				<label>Full Name of Nominee</label>
				<div class="fullname">
					<input type="text" placeholder="First Name" name="nt1"/>
					<input type="text" placeholder="Father's Name" name="nt2"/>
					<input type="text" placeholder="Surname" name="nt3"/>
				</div>
				
				<br><label>Relationship</label>
				<div class="dropdown">
					<select name="nt4">
						<option value="">- - Relationship - -
						<option value="Son" <?php if(isset($_POST['nt4']) && $_POST['nt4'] == 'Son') echo "selected"; ?>>Son
						<option value="Daughter" <?php if(isset($_POST['nt4']) && $_POST['nt4'] == 'Daughter') echo "selected"; ?>>Daughter
						<option value="Sister" <?php if(isset($_POST['nt4']) && $_POST['nt4'] == 'Sister') echo "selected"; ?>>Sister
						<option value="Brother" <?php if(isset($_POST['nt4']) && $_POST['nt4'] == 'Brother') echo "selected"; ?>>Brother
						<option value="Wife" <?php if(isset($_POST['nt4']) && $_POST['nt4'] == 'Wife') echo "selected"; ?>>Wife
						<option value="Other" <?php if(isset($_POST['nt4']) && $_POST['nt4'] == 'Other') echo "selected"; ?>>Other
					</select>
				</div>

				<br><label>Address</label>
				<div class="address">
					<input type="text" placeholder="address" style="width:100%;" name="nt5">
				</div>
		</div>

		<div class="sub-form-block">		<!--	Fourth Block	-->
				<h2 align="center">IDENTITY PROOF</h2>
				
			    <label>Aadhaar Card<sup>*</sup></label>
				<div class="document">
					<div class="container"></div>
					<div class="text_d">
						<label for="aadhaar" aria-hidden>
						<i class="fa fa-solid fa-arrow-up-from-bracket" style="font-size:30px;"></i>
						</label>
						<input id="aadhaar" type="file" accept="image/*" name="aadhaar" onchange="change_back3()" />
					</div>
				</div>
				<?php echo $error3;?>

				<br><label>PAN Card<sup>*</sup></label>
				<div class="document">
					<div class="container"></div>
					<div class="text_d">
						<label for="PAN" aria-hidden>
						<i class="fa fa-solid fa-arrow-up-from-bracket" style="font-size:30px;"></i>
						</label>
						<input id="PAN" type="file" accept="image/*" name="pan" onchange="change_back4()"/>
					</div>
				</div>
				<?php echo $error4;?>

		</div>

		<div class="button">		<!--	Button 	-->
					<center><input type="submit" value="SUBMIT" name="s1"></center>
				</div>
		</form>

		<script>
				function change_back1(){
					var elements = document.getElementsByClassName("container");
					elements[0].innerHTML = "<img src='IMAGE//SIGNATURE.jpg' height='100%' width='100%' style='border:3px solid #6A11CB; border-radius:10px;'></img>";
				}

				function change_back2(){
					var elements = document.getElementsByClassName("container");
					elements[1].innerHTML = "<img src='IMAGE//PASSPORT.JPG' height='100%' width='100%' style='border:3px solid #6A11CB; border-radius:10px;'></img>";
				}

				function change_back3(){
					var elements = document.getElementsByClassName("container");
					elements[2].innerHTML = "<img src='IMAGE//AADHAAR.jpg' height='100%' width='100%' style='border:3px solid #6A11CB; border-radius:10px;'></img>";
				}

				function change_back4(){
					var elements = document.getElementsByClassName("container");
					elements[3].innerHTML = "<img src='IMAGE//PAN.jpg' height='100%' width='100%' style='border:3px solid #6A11CB; border-radius:10px;'></img>";
				}
		</script>
	</section>