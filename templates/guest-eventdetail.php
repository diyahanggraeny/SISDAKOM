<?php
require 'functions2.php';

$events = query("SELECT * FROM event");

$idevent = $_GET["idevent"];
$result = mysqli_query($conn, "SELECT * FROM event WHERE id_event = '$idevent'");

if (!isset($idevent)){
  header("Location: guest-events.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Walls Event</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../static/css/materialize.css">
</head>

<body class="white">

    <nav class="blue">
        <div class="nav-wrapper">
            <a><img class="first-logo" src="../static/img/profile.png"></a>
            <a href="#" class="brand-logo white-text" style="font-size: 25px;"><b>SISDAKOM</b></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php" class="white-text" style="font-size: 20px;"><b>Home</b></a></li>
                <li><a href="guest-events.php" class="white-text" style="font-size: 20px;"><b>Events</b></a></li>
                <li><a href="login.php" class="white-text" style="font-size: 20px;"><b>Login</b></a></li>
                <li><a href="signup.php" class="blue-text btn" style="font-size: 20px;"><b>Sign Up</b></a></li>
            </ul>
        </div>
    </nav>

    
    <ul class="sidenav" id="mobile-demo">
        <li><a href="index.php" class="black-text">Home</a></li>
        <li><a href="guest-events.php" class="black-text">Events</a></li>
        <li><a href="login.php" class="black-text">Login</a></li>
        <li><a href="signup.php" class="blue btn white-text"><b>Sign Up</b></a></li>
    </ul>


    <main class="main">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="row">
            <div class="col s12 l3 center-align">
                <img class="image3" src="../static/img/<?= $row['poster_event'];?>">
            </div>
            <div class="col s12 l5">
                <br><br>
                <a class="blue-text font1"><b><?= $row['nama_event'];?></b></a>
                <br>
                <a class="blue-text font2"><b><?= $row['tanggal_event'];?></b></a>
                <br>
                <a class="blue-text font2"><b><?= $row['waktu_event'];?></b></a>
                <br>
                <a class="blue-text font2"><b><?= $row['tempat_event'];?></b></a>
            </div>
        </div>
        <div class="row">
                <div class="col s12 l9">
                <p class="font2" style="margin-left: 50px;">
                <?= $row['informasi_event'];?>
                </div>

                <div class="col s12 l3">
                <a class="blue-text" style="font-size: 20px; float: right; margin-right: 40px;"><b><?= $row['htm'];?></b></a><br><br>
                <a href="login.php" class="white-text blue btn" style="font-size: 20px; float: right; margin-right: 30px;"><b>Register</b></a>
                </p>
                </div>
        </div>
        <?php endwhile; ?>
    </main>

    <footer class="blue">
        <div class="container">
          <div class="row">
            <div class="col l4 s12">
              <h5 class="white-text">About</h5>
              <p class="white-text">A website that provide platform for Computer Science events on State University of Jakarta</p>
            </div>
            <div class="col l4 s12">
              <h5 class="white-text">Address</h5>
              <p class="white-text">Jl. Rawamangun Muka, RT.11/RW.14 Rawamangun, Pulo Gadung, Kota Jakarta Timur, DKI Jakarta 13220</p>
            </div>
            <div class="col l4 s12">
              <h5 class="white-text">Contact</h5>
              <ul>
                <li><a class="white-text">+6285200000000</a></li>
                <li><a class="white-text">emailaddressexample@unj.ac.id</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright indigo">
          <div class="center">
              <a class="white-text"><b>Copyright © 2020 - Developed by Diyah, Izzat, Rachel</b></a>
          </div>
        </div>
    </footer>

<script type="text/javascript" src="../static/js/materialize.js"></script>
<script>
    const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);
</script>
</body>
</html> 
