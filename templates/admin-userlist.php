<?php
require 'functions2.php';

$users = query("SELECT * FROM user");

?>

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
                <li><a href="admin-dashboard.php" class="white-text" style="font-size: 20px;"><b>Dashboard</b></a></li>
                <li><a href="admin-list.php" class="white-text" style="font-size: 20px;"><b>Manage Admin</b></a></li>
                <li><a href="admin-userlist.php" class="white-text" style="font-size: 20px;"><b>Manage User</b></a></li>
                <li><a href="admin-manage-event.php" class="white-text" style="font-size: 20px;"><b>Manage Event</b></a></li>
            </ul>
        </div>
    </nav>

    
    <ul class="sidenav" id="mobile-demo">
        <li><a href="admin-dashboard.php" class="black-text">Dashboard</a></li>
        <li><a href="admin-list.php" class="black-text">Manage Admin</a></li>
        <li><a href="admin-userlist.php" class="black-text">Manage User</a></li>
        <li><a href="admin-manage-event.php" class="black-text">Manage Event</a></li>
    </ul>


    <main class="white">
        <br>
        <div class="container">
            <h3><center><b> User List</b></center></h3>
            <table class="cyan lighten-4 responsive-table centered">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Picture</th>
                      <th>Username</th>
                      <th>E-mail</th>
                      <th>Full Name</th>
                      <th>Angkatan</th>
                      <th>Instansi</th>
                      <th></th>
                  </tr>
                </thead>
        
                <tbody>
                <?php $i = 1; ?>
                <?php foreach($users as $row) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td> 
                    <?php if( $row["user_picture"]) :?>
                        <img src="../static/img/<?= $row["user_picture"]; ?>" width="80px" class="center">
                    <?php else: ?>
                        <h7 class="center" style="font-style:italic;">None</h7>
                    <?php endif; ?>
                    </td>
                    <td><?= $row["user_username"]; ?></td>
                    <td><?= $row["user_email"]; ?></td>
                    <td><?= $row["full_name"]; ?></td>
                    <td><?= $row["angkatan"]; ?></td>
                    <td><?= $row["instansi"]; ?></td>
                    <td><a class="purple-text" href="#"><b>Remove Account</b></a></td>
                  </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
