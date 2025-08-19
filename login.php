<?php
include('server.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <title>Hanz On Airsoft Supplies</title>
    <style>
       
        body {
            font-family: Arial, "Open Sans", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2962ff;
            color: white;
        }


        h2 {
            color: #333;
            text-align: center;
            text-transform: uppercase;
            font-family: "Roboto", sans-serif;
            font-weight: bold;
            position: relative;
            margin: 30px 0 60px;
        }
        h2::after {
            content: "";
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 3px;
            background: #8fbc54;
            left: 0;
            right: 0;
            bottom: -10px;
        }


        h3 {
            color: #ffffff;
            text-align: center;
            text-transform: uppercase;
            font-family: "Roboto", sans-serif;
            font-weight: bold;
            position: relative;
            margin: 30px 0 60px;
        }


        header {
            background-color: #232324ff;
            padding: 10px;
            text-align: center;
        }


        nav {
            background-color: #232324ff;
            padding: 10px;
            text-align: center;
        }


        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }


        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }


        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #5c5c5cff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .panel {
            flex: 1;
            padding: 40px;
            text-align: center;
        }
        .panel.left {
            background-color: #f7f7f7;
        }
        .panel h2 {
            margin-bottom: 20px;
        }
        .panel p {
            color: #252525ff;
            margin-bottom: 30px;
        }
        .panel button {
            background-color: #252525ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .panel input {
            width: 80%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .social-buttons {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            margin: 0 10px;
            border-radius: 50%;
            cursor: pointer;
            background-color: #ccc; /* Grey background */
        }
        .social-button img {
            width: 24px; /* Set the size of the icons */
            height: 24px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }
        .modal-content h2 {
            margin-bottom: 20px;
        }
        .modal-content input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .modal-content button {
            background-color: #252525ff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            margin-top: 30px;
        }
        .close {
            color: #050505ff;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
                width: 100%;
            }
            .panel {
                padding: 20px;
            }
        }
        .alert {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            padding: 15px;
            border-radius: 5px;
            display: none; /* Initially hidden */
        }
        .alert.success {
            background-color: #4caf50; /* Green */
        }
        .alert.error {
            background-color: #f44336; /* Red */
        }
        .logo {
            width: 150px; 
            height: auto; 
            margin: 0 auto 10px; 
            display: block; 
        }
    </style>
</head>
<body>
<div class="alert success" id="alertBoxSuccess" style="<?php echo !empty($success) ? 'display:block;' : ''; ?>">
    <?php echo $success; ?>
</div>
<div class="alert error" id="alertBoxError" style="<?php echo !empty($errors) ? 'display:block;' : ''; ?>">
    <?php foreach ($errors as $error) {
        echo ($error);
    } ?>
</div>
    <div class="container">
        <div class="panel left">
            <img src="Logo.png" alt="Logo" class="logo">
            <h2>Welcome Back to Hanz-On Airsoft Supplies</h2>
            <p>To keep connected with us please login with your personal info</p>
            <button onclick="openModal()">LOG IN</button>  
            
        </div>

        <div id="signInModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Login</h2>
                <button onclick="showLoginForm('member')">Member Login</button>
                <br>
                <button onclick="showLoginForm('admin')">Admin Login</button>

                <form id="memberLogin" style="display: none;" method="POST" action="">
                    <h3>Member Login</h3>
                    <input type="hidden" name="login_type" value="member">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Log In as Member</button>
                </form>

                <form id="adminLogin" style="display: none;" method="POST" action="">
                    <h3>Admin Login</h3>
                    <input type="hidden" name="login_type" value="admin">
                    <input type="text" name="username" placeholder="Admin Username" required>
                    <input type="password" name="password" placeholder="Admin Password" required>
                    <button type="submit" name="login">Log In as Admin</button>
                </form>

            </div>
        </div>

        <div class="panel right">
            <h2>Create Account</h2>
            <p>or use other platforms for registration</p>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit" name="register">SIGN UP</button>
            </form>

        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('signInModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('signInModal').style.display = 'none';
            document.getElementById('memberLogin').style.display = 'none';
            document.getElementById('adminLogin').style.display = 'none';
        }

        function showLoginForm(type) {
            document.getElementById('memberLogin').style.display = type === 'member' ? 'block' : 'none';
            document.getElementById('adminLogin').style.display = type === 'admin' ? 'block' : 'none';
        }

        window.onclick = function(event) {
            if (event.target === document.getElementById('signInModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>