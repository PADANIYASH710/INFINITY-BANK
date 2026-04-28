<!--		Back-end		-->
<?php
    if(isset($_POST['s1'])){
        $service = $_POST['service'];

        if($service == 'Apply_for_Loan'){
           header("Location: LOAN_APPLY.php");
           exit;
        }
		else if($service == 'View_loan'){
			header("Location: VIEW_LOAN.php");
           exit;
		}
		else if($service == 'Deposit'){
			header("Location:DEPOSIT_LOAN.PHP");
            exit;
		}
    }
?>
<!--		Front-end		-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>
	<section class="form-block">
		<div class="sub-form-block">
		<h2 align="center">GOLD LOAD</h2>
		<form method="POST">
            <label>Service</label>
			<div class="dropdown">
				<select name="service" required>
					<option value="">- - SERVICES - -
					<option value="Apply_for_Loan">Apply for Loan
					<option value="Deposit">Deposit Interest & Loan Amount
					<option value="View_loan">View Loan
				</select>
			</div>

			<div class="button">
				<center><input type="submit" value="SUBMIT" name="s1"/></center>
			</div>
		</form>
		</div>
	</section>