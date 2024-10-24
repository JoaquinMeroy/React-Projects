<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME</title>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      background-color: #ED7093;
      margin: 0;
      padding: 0;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background: #dee1e2;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #ED7093;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #376EA8;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }

    header {
      background-color: #dee1e2;
      max-width: 100%;
      height: 45px;
      box-shadow: 10px 10px;
    }
  </style>
  </style>
</head>

<body>
  <div>
    <h1>EDUKIDS</h1>
  </div>
  <!--<h1>WELCOME, <?php echo $row["name"]; ?></h1>-->


  <header>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="Pang-araw-araw na Buhay sa Pilipinas.html">Filipino Food and Snacks</a>
      <a href="Pamilya at Kaibigan.html">Family and Friends</a>
      <a href="#">Animals and Nature in the Philippines</a>
      <a href="#">Colors and Shapes</a>
      <a href="#">Daily Activities</a>
      <a href="#">Places in the Community</a>
      <a href="#">Filipino Festivals and Celebrations</a>
      <a href="#">Weather and Seasons</a>
      <button><a href="logout.php">LOGOUT</a></button>
    </div>


    <span style="font-size:30px;cursor:pointer;color: #376EA8;font-weight: bold;" onclick="openNav()">&#9776; Categories</span>
  </header>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>











</body>

</html>