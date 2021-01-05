<?php
session_start();

if( !isset($_SESSION["loginsubmit"])){
    header("Location: login.php");
    exit;
}

require 'functions2.php';

$id_user = $_SESSION["loginsubmit"];
$id_event = $_GET["id_event"];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$result2 = mysqli_query($conn, "SELECT * FROM event WHERE id_event = '$id_event'");
$row = mysqli_fetch_assoc($result);


if( isset($_POST["submit"])) {
    if ( registbayar($_POST) > 0 ) {
      $log =  $row["user_username"] .= " berhasil melakukan registrasi pada event ";
      act_log($log);
      echo "
          <script>
              alert('Anda berhasil melakukan registrasi!');
              document.location.href = 'user-events.php';
          </script>
      
      ";
    } else {
      $log =  $row["user_username"] .= " gagal melakukan registrasi pada event ";
      act_log($log);
      echo "
          <script>
              alert('Anda gagal melakukan registrasi!');
              document.location.href = 'user-events.php';
          </script>
      "; 
    }
  $error = true;
}

?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../static/css/materialize.css" media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Register & Payments</title>
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

<!--Halaman Utama-->
<div class="container">
  <div class="row">
    <div class="col s12 m3 l3">
      <?php while( $row = mysqli_fetch_assoc($result2) ) : ?>
      <img class="responsive-img" src="../static/img/<?= $row["poster_event"]; ?>" style="margin-top: 20px;">
    </div>
    <div class="col s12 m4 l4">
      <h4 class="blue-text bold"><?= $row["nama_event"]; ?></h4>
      <h5 class="blue-text bold" style="font-size: 20px; margin-top: 20px;"><?= $row["tanggal_event"]; ?></h5>
      <h5 class="blue-text bold" style="font-size: 20px;"><?= $row["waktu_event"]; ?></h5>
      <h5 class="blue-text bold" style="font-size: 20px;"><?= $row["tempat_event"]; ?></h5>
    </div>
    <div class="col s12 m5 l5">
      <h5 class="black-text bold" style="font-size: 22px; margin-top: 20px;">
        Thank you for registering on this event. Pay for your event and submit the payment receipt. <br> Total : Rp<?= $row["htm"]; ?> <br> <br> GOPAY : 085100000000 <br> DANA : 085100000000 <br> OVO : 085100000000
      </h5>
      <br>
      <form action="" method="post" enctype="multipart/form-data">
        <input  name="id_user" type="hidden" value="<?= $id_user ?>">
        <input  name="id_event" type="hidden" value="<?= $id_event ?>">
        <input  name="max_partisipan" type="hidden" value="<?= $row['max_partisipan']; ?>">
        <div class="file-field input-field col s12 m12 l12">
          <div class="btn blue"  style="margin-top: 10px">
            <span>Upload File</span>
            <input type="file" name="bukti_pembayaran" required>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" name="bukti_pembayaran" type="text">
          </div>
        </div>
        <button class="right btn waves-effect waves-light indigo" type="submit" name="submit"><b>Submit</b></button>
      </form>
      <?php endwhile; ?>
      <br>
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
      <script type="text/javascript" src="../static/js/materialize.js"></script>
      <script>
        const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);
      </script> 
    </body>
  </html>
