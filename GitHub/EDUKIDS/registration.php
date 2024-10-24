<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm-password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script>alert('Username or Email Has Already Taken');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES ('','$name', '$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script>alert('Registration successfull');</script>";
        } else {
            echo
            "<script>alert('Password Does Not Match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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

        .register-container {
            background-color: white;
            height: 555px;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 110px;
            border-radius: 20px;
            box-shadow: darkgrey;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            overflow: hidden;
        }

        .register-div {
            background-color: #F6F4ED;
            float: left;
            height: 100%;
            width: 60%;
            text-align: center;

        }

        .register-div h1 {
            margin-top: 50px;
            color: #376EA8;
        }

        .logo-div {
            text-align: center;
            padding-top: 50px;
            height: 100%;
        }

        .name-input,
        .username-input,
        .email-input,
        .password-input,
        .confirm-password-input {
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
            margin-top: 25px;
        }

        .name-input,
        .username-input,
        .email-input,
        .password-input,
        .confirm-password-input {
            margin-top: 25px;
        }

        .register-button {
            margin-top: 10px;
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

        .register-button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="register-container">

            <div class="register-div">

                <h1>REGISTER</h1>
                <h5>Register an account to Continue</h5>
                <form action="" method="post">
                    <div class="credential-inputs">
                        <label for="name"></label>
                        <input type="text" name="name" id="name" class="name-input" placeholder="name" required>

                        <label for="username"></label>
                        <input type="text" name="username" id="username" class="username-input" placeholder="username" required>

                        <label for="email"></label>
                        <input type="email" name="email" id="email" class="email-input" placeholder="email" required>

                        <label for="password"></label>
                        <input type="password" name="password" id="password" class="password-input" placeholder="password" required>

                        <label for="confirm-password"></label>
                        <input type="password" name="confirm-password" id="confirm-password" class="confirm-password-input" placeholder="confirm password" required>


                    </div>

                    <div class="register-button">
                        <button type="submit" class="button" name="submit">REGISTER</button>

                    </div>
                    <div class="register-button">
                        <button type="submit" class="button" name="submit"><a href="login.php">PROCEED TO LOGIN</a></button>
                    </div>

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