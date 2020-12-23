<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../static/css//materialize.css" media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Profile - My Events (Booked)</title>
    </head>

    <body>

      <!--Navbar-->
         <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
              <a href="#" class="brand-logo white-text" style="font-size: 25px;"><b>SISDAKOM</b></a>
              <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Home</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Events</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Messages</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Profile</b></a></li>
              </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="#" class="black-text">Home</a></li>
            <li><a href="#" class="black-text">Events</a></li>
            <li><a href="#" class="black-text">Message</a></li>
            <li><a href="#" class="black-text">Profile</a></li>
        </ul>

<!--Main Page-->
<div class="container">
  <div class="row">
      <div class="col s3 card-panel blue lighten-4">
          <img class="responsive-img" src="img/profile.png" style="margin-top: 20px;">
          <h5 class="blue-text bold center">Rose Azalea</h5>
          <div class="collection">
            <a href="#!" class="collection-item white-text blue">Account Information</a>
            <a href="#!" class="collection-item active white-text blue">My Events</a>
            <a href="#!" class="collection-item white-text blue">Changed Password</a>
          </div>
            <div class="center">
              <a class="white-text btn blue" style="margin-bottom: 20px;">Logout</a>
            </div>
      </div>
      <div class="col s9">
          <ul class="tabs" style="margin-top: 15px;">
            <li class="tab col s3 black"><a href="#">Booked</a></li>
            <li class="tab col s3"><a href="user-profile-finish-event.html">Finished</a></li>
          </ul>
        </div>
        <div class="col s3">
          <img class="responsive-img" src="img/the_walls.jpeg" style="margin-top: 20px; margin-left: 20px;">
        </div>
        <div class="col s6">
          <h4 class="blue-text" style="margin-left: 10px;">The Walls Seminar</h4>
          <h5 class="blue-text" style="margin-left: 10px;">3 November 2020</h5>
          <h5 class="blue-text" style="margin-top: 0px; margin-left: 10px;">GDS 505, UNJ</h5>
          <h5 class="blue-text" style="margin-top: 0px; margin-left: 10px;">Rp 100.000</h5>
          <a class="center white-text btn blue" style="margin-top: 0px; margin-left: 10px;">Details</a>
        </div>
    </div>
</div>


        <!--Footer--> 
  <footer class="page-footer blue">
    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="white-text">CAbout</h5>
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