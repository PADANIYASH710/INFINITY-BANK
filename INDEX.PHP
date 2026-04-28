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
            background: #8159E7;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: transparent;
        }

        .logo {
            display:flex;
            gap:10px;
        }

        .nav-buttons button {
            margin-left: 15px;
            padding: 8px 18px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .login-btn {
            background: #ffc107;;
            color: black;
        }

        .login-btn:hover {
            background: #e2e6ea;
        }   

        .hero {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            animation: fadeInDown 1.5s ease;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            animation: fadeInUp 1.5s ease;
        }

        .get-started-btn {
            padding: 14px 35px;
            font-size: 18px;
            border-radius: 30px;
            border: none;
            background: white;
            color: #0d6efd;
            cursor: pointer;
            font-weight: bold;
            animation: pulse 2s infinite;
            transition: 0.3s ease;
        }

        .get-started-btn:hover {
            background: #ffc107;
            color: black;
            transform: scale(1.05);
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1); }
        }

    </style>
</head>
<body>

<header>
    <div class="logo">
			<img src="IMAGE\LOGO_TITLE_TAB.PNG" alt="Infinity Bank logo" height="70px" width="70PX">
            <p style="color:white;font-size: 50px;margin-top:5px;"><b>Infinity Bank</b></p>
	</div>
    <div class="nav-buttons">
        <a href="LOGIN_AND_REGISTER.PHP"><button class="login-btn">Login & Register</button></a>
    </div>
</header>

<section class="hero">
    <h1>Secure & Smart Banking</h1>
    <p>Manage your money, loans, and investments easily.</p>
    <a href="LOGIN_AND_REGISTER.PHP"><button class="get-started-btn">Get Started</button></a>
</section>

</body>
</html>
