<?php include'BACK-END/LOGIN_AND_REGISTER.PHP';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFINITY BANK</title>
	
	<link rel="icon" type="image/png" href="IMAGE\\logo_title_tab.png">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color:#8159e7;
}

.container {
    position: relative;
    width: 880px;
    height: 520px;
    background: #fff;
    border:2px solid white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 25px rgba(0,0,0,0.25);
}

.container .form {
    width: 100%;
    height: 100%;
    position: absolute;
    padding: 60px 40px 60px 430px;
    transition: 0.5s ease;
}

header {
    font-size: 32px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 40px;
}

.form form input {
    width: 100%;
    height: 45px;
    margin-top: 15px;
    padding: 0 15px;
    font-size: 18px;
    border-radius: 8px;
    border: 1px solid #bbb;
    outline: none;
}

.form form input[type="submit"] {
    margin-top: 25px;
    background: #6A11CB;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    border: none;
	font-size:21px;
}

.form.login {
    transform: translateX(0);
}

.form.signup {
    transform: translateX(100%);
}

#check {
    display: none;
}

label {
    position: absolute;
    width: 300px;
    height: 100%;
    background-color: #6A11CB;
	border-radius:0px 70px 70px 0px;
    color: #fff;
    font-size: 24px;
	display:flex;
	justify-content:center;
	flex-direction:column;
	padding:0px 20px 0px 20px;
    cursor: pointer;
}

label::after {
    content: "Don't have an account? Register";
}

#check:checked ~ label::after {
    content: "Already have an account? Login";
}

#check:checked ~ .login {
    transform: translateX(-100%);
}

#check:checked ~ .signup {
    transform: translateX(0);
}
</style>
</head>

<body>
<div class="container">
    <input type="checkbox" id="check">
    <div class="form signup">
        <header>Register</header>
        <form method="POST" autocomplete="off">
					
            <input type="text" placeholder="User Name" name="t1" value="<?php echo $username_r;?>" required>
			
            <input type="password" placeholder="Password" name="t2" maxlength="8" required>
			
            <input type="password" placeholder="Confirm Password" name="t3" maxlength="8" required>
            <?php echo $error1;?>
			
            <input type="submit" value="Sign Up" name="s1">
        </form>
    </div>

    <div class="form login">
        <header>Login</header>
        <form method="POST" autocomplete="off">
		
			<input type="text" placeholder="User Name" name="t1" VALUE="<?php echo $username_l;?>" required>
            <?php echo $error2;?>
				
            <input type="password" placeholder="Password" name="t2" maxlength="8" required>
			<?php echo $error3;?>

            <input type="submit" value="Login" name="s2">
        </form>
    </div>

    <label for="check"></label>
</div>
</body>
</html>