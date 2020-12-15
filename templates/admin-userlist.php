<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>
      User List
    </title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css//materialize.css">
</head>

<body class="blue">

    <nav class="blue">
        <div class="nav-wrapper">
            <a></a>
            <a href="#" class="brand-logo white-text" style="font-size: 25px;"><b>SISDAKOM</b></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Dashboard</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Manage Admin</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Manage User</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Manage Event</b></a></li>
            </ul>
        </div>
    </nav>

    
    <ul class="sidenav" id="mobile-demo">
        <li><a href="#" class="black-text" >Dashboard</a></li>
        <li><a href="#" class="black-text" >Manage Admin</a></li>
        <li><a href="#" class="black-text" >Manage User</a></li>
        <li><a href="#" class="black-text" >Manage Event</a></li>
    </ul>


    <main class="white">
        <br>
        <div class="container">
            <h3><center><b> User List</b></center></h3>
        </div>
        <center>
        <table class="cyan lighten-4 responsive-table centered" style="width: 1000px;">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th>Full Name</th>
                  <th>Angkatan</th>
                  <th>Instansi</th>
                  <th></th>
              </tr>
            </thead>
    
            <tbody>
              <tr>
                <td>1</td>
                <td>Sarah</td>
                <td>Sarah@gmail.com</td>
                <td>Sarah</td>
                <td>2018</td>
                <td>UNJ</td>
                <td><b>Remove Account</b></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jonathan</td>
                <td>Jonathan@gmail.com</td>
                <td>Jonathan</td>
                <td>2018</td>
                <td>ITB</td>
                <td><b>Remove Account</b></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Risya</td>
                <td>Risya@gmail.com</td>
                <td>Risya</td>
                <td>2019</td>
                <td>UGM</td>
                <td><b>Remove Account</b></td>
              </tr>
            </tbody>
        </table>
        </center>
        <br>
    </main>

    <footer class="footer-copyright">
        <div class="center">
            <a class="white-text"><b>Copyright © 2020 - Developed by Diyah, Izzat, Rachel</b></a>
        </div>
    </footer>

    <script type="text/javascript" src="../static/js/materialize.js"></script>
    <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
    </script>
</body>
</html> 
