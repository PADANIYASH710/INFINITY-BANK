<?php
	session_start();

	if (!isset($_SESSION['username'])) {
    header("Location: LOGIN_AND_REGISTER.PHP");
    exit();
	}

	if(isset($_POST['b1'])){
		session_unset();
		session_destroy();
		header('Location:index.php');
		exit();
	}
?>
<style>
.logout-btn {
  	background-color: #8120E7;      /* Red background */
  	color: white;                   /* White text */
  	padding: 9px 60px;             /* Space inside button */
  	border: none;                   /* Remove border */
  	border-radius: 5px;             /* Rounded corners */
  	cursor: pointer;                /* Pointer on hover */
  	font-size: 16px;
  	transition: 0.3s ease;          /* Smooth hover effect */
}

.logout-btn:active {
  	transform: scale(0.95);         /* Click effect */
}

.nav {
	margin-right:10%;
	display:flex;
	flex-direction:row;
	align-items:flex-end;
	gap:100px;
}

.nav h3{
	color:#5B21B6;
}

.nav h3:hover{
	color:#8159e7;
}

</style>
<header class="top-bar">
		<div class="logo">
			<img src="IMAGE\\logo_bank.png" alt="Infinity Bank logo">
		</div>

		<div class="nav">
			<a href="home.php"><h3>Home</h3></a>
			<a href="BANK_STATEMENT.php"><h3>Statement</h3></a>
			<a href="BANK_DETAIL.PHP"><h3>Bank Details</h3></a>
			<a href="#"><h3>Help</h3></a>
		</div>

		<form method="POST">
		<div>
			<h3 style="color:#5B21B6;">Hello, <?php echo $_SESSION['username']; ?></h3>
			<br><br><button type="submit" class="logout-btn" name="b1"><i class="fa-solid fa-right-from-bracket"></i>     Log Out</button>
		</div>
		</form>
</header>