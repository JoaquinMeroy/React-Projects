<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: index.php");
        } else {
            echo
            "<script>alert('Wrong password');</script>";
        }
    } else {
        echo
        "<script>alert('User not registered');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUKIDS</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {

            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            background-color: #ED7093;
        }

        .container {
            max-height: 100%;
            max-width: 100%;
        }

        .login-container {
            background-color: white;
            height: 500px;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 130px;
            border-radius: 20px;
            box-shadow: darkgrey;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            overflow: hidden;
        }

        .login-div {
            background-color: #F6F4ED;
            float: left;
            height: 100%;
            width: 60%;
            text-align: center;

        }

        .login-div h1 {
            margin-top: 50px;
            color: #376EA8;
        }

        .logo-div {
            text-align: center;
            padding-top: 50px;
            height: 100%;
        }

        .email-input,
        .password-input {
            font-size: 14px;
            border-radius: 6px;
            line-height: 1.5;
            padding: 5px 10px;
            transition: box-shadow 100ms ease-in, border 100ms ease-in, background-color 100ms ease-in;
            border: 2px solid #dee1e2;
            color: rgb(14, 14, 16);
            background: #dee1e2;
            display: block;
            height: 36px;

            :hover {
                border-color: #ccc;
            }

            :focus {
                border-color: #9147ff;
                background: #fff;
            }
        }

        h5 {
            opacity: 0.3;
            color: #376EA8;
        }

        .credential-inputs {
            margin-left: 32%;
            margin-top: 50px;
        }

        .email-input,
        .password-input {
            margin-top: 25px;
        }

        .login-button {
            margin-top: 10px;
        }

        .forgot-password a {
            color: #ED7093;
            text-decoration: none;
            margin-right: 80px;
            font-size: small;
        }

        .forgot-password :hover {
            color: #376EA8;
        }

        .button {
            height: 30px;
            width: 150px;
            border-style: none;
            border-radius: 50px;
            background-color: #ED7093;
            color: white;
            font-weight: bold;
        }

        .button:hover {
            background-color: #376EA8;
            color: white;
            font-weight: bold;
            border-color: #376EA8;
            border-style: solid;
        }

        h1 {
            font-size: 50px;
        }

        h6 a {
            color: #ED7093;
        }

        h6 a:hover {
            color: #376EA8;
        }

        h6 {
            color: #376EA8;
        }

        img {
            height: 360px;
            width: 360px;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="login-container">

            <div class="login-div">

                <h1>WELCOME</h1>
                <h5>Log into your account to Continue</h5>
                <form action="" method="post">
                    <div class="credential-inputs">
                        <label for="usernameemail"></label>
                        <input type="usernameemail" name="usernameemail" id="usernameemail" class="email-input" placeholder="username or email" required>

                        <label for="password"></label>
                        <input type="password" name="password" id="password" class="password-input" placeholder="password" required>
                        <p class="forgot-password"><a href="">forgot password?</a></p>
                    </div>

                    <div class="login-button">
                        <button type="submit" class="button" name="submit">LOGIN</button>
                    </div>
                    <h6>Dont have an account? <a href="registration.php">sign up</6>
                            </h5>
            </div>
            </form>

            <div class="logo-div">
                <img src="/EDUKIDS/images/EDUKIDS (2).png" alt="LOGO">
            </div>

        </div>
    </main>
</body>

</html>