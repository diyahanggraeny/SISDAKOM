<?php
session_start();

if( !isset($_SESSION["loginsubmit"])){
    header("Location: login.php");
    exit;
}

require 'functions2.php';

$id_user = $_SESSION["loginsubmit"];

if( isset($_POST["submit"])) {

  $user_password = $_POST["user_password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");

  // cek username
  if( mysqli_num_rows($result) == 1 ){
      // cek password
      $row = mysqli_fetch_assoc($result);
      if( password_verify($user_password, $row["user_password"]) ){
        if ( ubahpass($_POST) > 0 ) {
          $log =  $row["user_username"] .= " berhasil mengubah password";
          act_log($log);
          echo "
              <script>
                  alert('Data berhasil diubah!');
                  document.location.href = 'user-profile-info.php';
              </script>
          
          ";
        } else {
          $log =  $row["user_username"] .= " gagal mengubah password";
          act_log($log);
          echo "
              <script>
                  alert('Data gagal diubah!');
                  document.location.href = 'user-profile-changed-password.php';
              </script>
          "; 
        }
      } else {
        $log =  $row["user_username"] .= " gagal mengubah password";
        act_log($log);
        echo "
        <script>
            alert('Password lama salah!');
            document.location.href = 'user-profile-changed-password.php';
        </script>
    "; 
      }
  }
  $error = true;
}

$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");

$mhs = query("SELECT * FROM user WHERE id_user = $id_user")[0];

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
      <title>Profile - Change Password</title>
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
        <form action="" method="post">
          <div class="row">
              <input  name="id_user" type="hidden" value="<?= $mhs["id_user"]; ?>">
              <div class="input-field col s10" style="margin-left: 15px; margin-top: 20px;">
                <input id="user_password" name="user_password" type="password" class="validate" required>
              <label class="active" for="user_password">Current Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10" style="margin-left: 15px;">
              <input id="new_password" name="new_password" type="password" class="validate">
              <label class="active" for="new_password">New Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10" style="margin-left: 15px;">
              <input id="confirmpassword" name="confirmpassword" type="password" class="validate">
              <label class="active" for="confirmpassword">Confirm New Password</label>
            </div>
          </div>
          <button class="center btn waves-effect waves-light indigo" style="margin-left: 20px;" type="submit" name="submit"><b>Save</b>
        </button>
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
      <script>
        var instance = M.Tabs.init(el, options);
      </script>
    </body>
  </html>
