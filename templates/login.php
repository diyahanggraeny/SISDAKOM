<?php
session_start();
require 'functions2.php';

if (isset($_COOKIE["id"]) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // Ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT user_username FROM user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    // Cek cookie dan username
    if ($key === hash('sha256', $row['user_username'])){
        $_SESSION['loginsubmit'] = true;
    }
}

if (isset($_SESSION["loginsubmit"])) {
    header("Location: user-home.php");
    exit;
}

if (isset($_POST["loginsubmit"])) {
    
    $user_username = $_POST["user_username"];
    $user_password = $_POST["user_password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE user_username = '$user_username'");

    // Cek Username
    if ( mysqli_num_rows($result) === 1) {

        #Cek Password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($user_password, $row["user_password"])) {

            // Set session
            $_SESSION["loginsubmit"] = $row["id_user"];

            // Cek Remember Me
            if (isset($_POST["remember"])) {
                // Buat Cookie
                setcookie('id', $row['id_user'], time()+86400*30);
                setcookie('key', hash('sha256', $row['user_username']), time()+86400*30);
            }

            $log =  $row["user_username"] .= " berhasil login" ;
            act_log($log);

            header("Location: user-home.php");
            exit;
        }

    } 
    $log = "User gagal login" ;
    act_log($log);

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <div class="container">
                <div class="card border1" style="margin-top: 30px; border-radius: 20px;">
                    <br>
                    <h3 class="center blue-text"><b>Login</b></h3>
                    <div class="center">
                        <?php if (isset($error)): ?>
                            <br>
                            <h5 class="purple-text"> Username / Password salah </h5>
                        <?php endif; ?>
                        <div class="container">
                            <div class="card-content">
                            <form action="" method = "post">
                                <div class="input-field">
                                    <input id="user_username" type="text" name="user_username" class="validated" required>
                                    <label for="user_username">Username</label>
                                </div>
                                <div class="input-field">
                                    <input id="user_password" type="password" name="user_password" class="validated" required>
                                    <label for="user_password">Password</label>
                                </div>
                                <button type="submit" name="loginsubmit" class="waves-effect waves-light btn blue white-text link-button" style="border-radius: 10px;">
                                    <b>
                                        Login
                                    </b>
                                </button>
                                <br><br>
                                <p>
                                <label for="remember">
                                    <input type="checkbox" id="remember" name="remember" />
                                    <span>Remember Me</span>
                                </label>
                                </p>
                                <br><br>
                            </form>
                            <a href="admin-login.php" class="waves-effect waves-light btn blue white-text link-button" style="border-radius: 10px;"><b>Login as Admin</b></a>
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
