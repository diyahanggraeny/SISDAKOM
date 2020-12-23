<?php
require 'functions2.php';

// Pemberitahuan Sign Up berhasil atau tidak
if (isset($_POST["signup"])) {
    if(signup($_POST) > 0) {
        echo "<script> 
                alert('Sign Up berhasil!')
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../static/css//materialize.css">
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
            <div class="container">
                <div class="card border1" style="margin-top: 30px; border-radius: 20px;">
                    <br>
                    <h3 class="center blue-text"><b>Sign Up</b></h3>
                    <div class="center">
                        <div class="container">
                            <div class="card-content">
                            <form action="" method="post">
                                <div class="input-field">
                                    <input id="full_name" type="text" name="full_name" class="validated" required>
                                    <label for="full_name">Full Name</label>
                                </div>
                                <div class="input-field">
                                    <input id="user_email" type="email" name="user_email" class="validated" required>
                                    <label for="user_email">E-mail</label>
                                </div>
                                <div class="input-field">
                                    <input id="user_username" type="text" name="user_username" class="validated" required>
                                    <label for="user_username">Username</label>
                                </div>
                                <div class="input-field">
                                    <input id="user_password" type="password" name="user_password" class="validated" required>
                                    <label for="user_password">Password</label>
                                </div>
                                <div class="input-field">
                                    <input id="confirmpassword" type="password" name="confirmpassword" class="validated" required>
                                    <label for="confirmpassword">Confirm Password</label>
                                </div>
                                <button type="submit" name="signup"  class="waves-effect waves-light btn blue white-text link-button" style="border-radius: 10px;">
                                    <b>
                                        Sign Up
                                    </b>
                                </button>
                            </form>
                            <br><br>
                            <div class="center">
                              <a class="blue-text">Already have an account?</a>
                              <a href="login.php" class="purple-text"><u>Login</u></a>
                            </div>
                            <br><br>                        
                        </div>
                    </div>
                </div>
            </div>
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
