<?php
require 'functions2.php';

// Konfigurasi Pagination
$JumlahDataperHalaman = 4;
$JumlahData = count(query("SELECT * FROM event"));
$JumlahHalaman = ceil($JumlahData / $JumlahDataperHalaman);
$ActivePage = (isset($_GET["page"])) ? $_GET["page"]:1 ;
$AwalData = ($JumlahDataperHalaman * $ActivePage) - $JumlahDataperHalaman;

$events = query("SELECT * FROM event LIMIT $AwalData, $JumlahDataperHalaman");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
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
        <div class="row">
        <?php foreach($events as $row) : ?>
            <div class="col l3 s12" style="margin-top: 25px;">
                <div class="card border1 center-align">
                    <img src="../static/img/<?= $row["poster_event"] ?>" style="margin-top: 5px" width="170px" height="250px"><br>
                    <a class="blue-text font3"><b><?= $row["nama_event"]; ?></b></a>
                    <br><br>
                    <a class="blue-text font4 center"><b><?= $row["tanggal_event"]; ?></b></a>
                    <br>
                    <a class="blue-text font4 center"><b><?= $row["tempat_event"]; ?></b></a>
                    <br>
                    <a class="blue-text font4 center">Rp <?= $row["htm"]; ?></a>
                    <br><br>
                    <a href="guest-eventdetail.php?idevent=<?= $row['id_event'];?>" class="blue btn white-text" style="margin-top: 10px; width: 100px; border-radius: 10px;"><b>Details</b></a>
                    <br>
                    <a href="user-register-and-payment.php?" class="blue btn white-text" style="margin-top: 5px; margin-bottom: 10px; width: 100px; border-radius: 10px;"><b>Register</b></a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>

        <div class="row">
            <ul class="pagination center-align">
            <?php if($ActivePage == 1): ?>
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <?php else: ?>
                <li><a href="?page=<?= $ActivePage - 1; ?>"><i class="material-icons">chevron_left</i></a></li>
            <?php endif; ?>
            <?php for($i = 1; $i <= $JumlahHalaman; $i++): ?>
                <?php if( $i == $ActivePage): ?>
                    <li class="active blue"><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else: ?>
                    <li class="waves-effect"><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if($ActivePage == $JumlahHalaman): ?>
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            <?php else: ?>
                <li><a href="?page=<?= $ActivePage + 1; ?>"><i class="material-icons">chevron_right</i></a></li>
            <?php endif; ?>
            </ul>
        </div>
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
