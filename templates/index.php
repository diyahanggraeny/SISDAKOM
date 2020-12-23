<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisdakom</title>
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
        <div class="col s12 l12">
            <div class="gradient1 center">
              <br>
              <a class="white-text"><h2 style="margin-bottom: 25px;"><b>Start Searching for Events</b></h2></a>
              <br>
              <a href="guest-events.php" class="blue-text btn" style="font-size: 25px; margin-bottom: 50px;"><b>Start Now</b></a>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col s12 l4 center">
                    <img class="image1" src="../static/img/search.png">
                    <br><br>
                    <a class="black-text" style="font-size: 25px;"><b>Search for Events</b></a>
                    <p class="black-text" style="font-size: 20px;">Search for on progress Computer Science events.</p>
                </div>
                <div class="col s12 l4 center">
                    <img class="image1" style="margin-bottom: 15px;" src="../static/img/register.png">
                    <br><br>
                    <a class="black-text" style="font-size: 25px;"><b>Register on Event</b></a>
                    <p class="black-text" style="font-size: 20px;">Register on event that you want to attend.</p>
                </div>
                <div class="col s12 l4 center">
                    <img class="image1" style="margin-bottom: 1px;" src="../static/img/e-certificate.png">
                    <br>
                    <a class="black-text" style="font-size: 25px;"><b>Save E-Certificate</b></a>
                    <p class="black-text" style="font-size: 20px;">Download your e-certificate after you attend the event.</p>
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
