<?php
session_start();

if( !isset($_SESSION["loginsubmit"])){
    header("Location: login.php");
    exit;
}

require 'functions2.php';

$id_user = $_SESSION["loginsubmit"];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");

$events = query("SELECT * FROM event");

$eventbayar = query("SELECT * FROM event_partisipan_bayar
                  INNER JOIN event ON event_partisipan_bayar.id_event = event.id_event WHERE status_event = 'Done'");

$eventgratis = query("SELECT * FROM event_partisipan_gratis
                  INNER JOIN event ON event_partisipan_gratis.id_event = event.id_event WHERE status_event = 'Done'");
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../static/css//materialize.css" media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Profile - My Events (Finish)</title>
    </head>

    <body class="white">

      <!--Navbar-->
      <nav class="blue">
        <div class="nav-wrapper">
            <a><img class="first-logo" src="../static/img/profile.png"></a>
            <a href="#" class="brand-logo white-text" style="font-size: 25px;"><b>SISDAKOM</b></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="user-home.php" class="white-text" style="font-size: 20px;"><b>Home</b></a></li>
                <li><a href="user-events.php" class="white-text" style="font-size: 20px;"><b>Events</b></a></li>
                <li><a href="user-message.php" class="white-text" style="font-size: 20px;"><b>Messages</b></a></li>
                <li><a href="user-profile-info.php" class="white-text" style="font-size: 20px;"><b>Profile</b></a></li>
            </ul>
        </div>
    </nav>
    
    <ul class="sidenav" id="mobile-demo">
        <li><a href="user-home.php" class="black-text">Home</a></li>
        <li><a href="user-events.php" class="black-text">Events</a></li>
        <li><a href="user-message.php" class="black-text">Messages</a></li>
        <li><a href="user-profile-info.php" class="black-text">Profile</a></li>
    </ul>

<!--Main Page-->
<div class="container">
  <div class="row">
      <div class="col s12 l3 card-panel blue lighten-4 center-align">
        <?php while( $row = mysqli_fetch_assoc($result) ) : ?>
          <img class="responsive-img" src="../static/img/profile.png" style="margin-top: 20px;">
          <h5 class="blue-text bold center"><?= $row["full_name"]; ?></h5>
          <div class="collection">
            <a href="user-profile-info.php" class="collection-item white-text blue">Account Information</a>
            <a href="user-profile-book-event.php" class="collection-item active white-text blue">My Events</a>
            <a href="user-profile-changed-password.php" class="collection-item white-text blue">Changed Password</a>
          </div>
            <div class="center">
              <a href="logout.php" class="white-text btn blue" style="margin-bottom: 20px;">Logout</a>
            </div>
            <?php endwhile; ?>
      </div>
      <div class="col s12 l9">
          <ul class="tabs" style="margin-top: 15px;">
            <li class="tab col s12 l3"><a href="user-profile-book-event.php">Booked</a></li>
            <li class="tab col s12 l3  black"><a href="user-profile-finish-event.php">Finished</a></li>
          </ul>
          <?php foreach($eventbayar as $event) : ?>
          <div class="col s12 l4">
            <img class="responsive-img" src="../static/img/<?= $event['poster_event'];?>" style="margin-top: 20px; margin-left: 20px;">
          </div>
          <div class="col s12 l8" style="margin-bottom: 100px">
            <h5 class="blue-text" style="margin-left: 10px;"><b><?= $event['nama_event'];?></b></h5>
            <h5 class="blue-text" style="margin-left: 10px;"><?= $event['tanggal_event'];?></h5>
            <h5 class="blue-text" style="margin-top: 0px; margin-left: 10px;"><?= $event['tempat_event'];?></h5>
            <h5 class="blue-text" style="margin-top: 0px; margin-left: 10px;"><?= $event['waktu_event'];?></h5>
            <a href="user-finish-event.php" class="center white-text btn blue" style="margin-top: 0px; margin-left: 10px;">Details</a>
          </div>
          <?php endforeach; ?>
          <?php foreach($eventgratis as $event2) : ?>
          <div class="col s12 l4">
            <img class="responsive-img" src="../static/img/<?= $event2['poster_event'];?>" style="margin-top: 20px; margin-left: 20px;">
          </div>
          <div class="col s12 l8" style="margin-bottom: 100px">
            <h5 class="blue-text" style="margin-left: 10px;"><b><?= $event2['nama_event'];?></b></h5>
            <h5 class="blue-text" style="margin-left: 10px;"><?= $event2['tanggal_event'];?></h5>
            <h5 class="blue-text" style="margin-top: 0px; margin-left: 10px;"><?= $event2['tempat_event'];?></h5>
            <h5 class="blue-text" style="margin-top: 0px; margin-left: 10px;"><?= $event2['waktu_event'];?></h5>
            <a href="user-finish-event.php" class="center white-text btn blue" style="margin-top: 0px; margin-left: 10px;">Details</a>
          </div>
          <?php endforeach; ?>
          </div>
      </div>
    </div>
</div>


        <!--Footer--> 
  <footer class="page-footer blue">
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
      <div class="container center">
        <a class="white-text"><b>Copyright © 2020 - Developed by Diyah, Izzat, Rachel</b></a>
      </div>
    </div>
  </footer>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>
        const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);
      </script> 
      <script>
        var instance = M.Tabs.init(el, options);
      </script>
    </body>
  </html>
