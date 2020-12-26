<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';


$id_admin = $_SESSION["login"];
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '$id_admin'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="../static/css//materialize.css">
</head>

<body class="blue">

    <nav class="blue">
        <div class="nav-wrapper">
            <a></a>
            <a class="brand-logo white-text" style="font-size: 25px;"><b>SISDAKOM</b></a>
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
        <li><a href="admin-dashboard.php" class="black-text" >Dashboard</a></li>
        <li><a href="admin-list.php" class="black-text" >Manage Admin</a></li>
        <li><a href="admin-userlist.php" class="black-text" >Manage User</a></li>
        <li><a href="admin-manage-event.php" class="black-text" >Manage Event</a></li>
    </ul>


    <main class="white">
        <div class="row">
            <?php while( $row = mysqli_fetch_assoc($result) ) : ?>
            <div class="center blue lighten-4 col s12 m3 l3">
                <br>
                <br>
                <br>
                <br>
                <div class="center">
                <?php if( $row["admin_picture"]) :?>
                    <img src="../static/img/<?= $row["admin_picture"]; ?>" width="100px" class="center">
                <?php else: ?>
                    <img src="../static/img/profile.PNG" width="100px" class="center">
                <?php endif; ?>
                </div>
                <h5><?= $row["admin_name"]; ?></h5>
                <p><?= $row["admin_email"]; ?></p>
                <a href="admin-edit.php?id=<?= $row["id_admin"]; ?>" class="waves-effect waves-light btn-small grey lighten-2 black-text">Edit Profile</a>
                <br>
                <br>
                <h6><a href="admin-logout.php" class="black-text"><b>LOGOUT</b></a></h6>
                <br>
                <br>
                <br>
                <br>
            </div>
            <?php endwhile; ?>
            <div class="col s12 m9 l9">
                <br>
                <div class="center col s12 m4 l6">
                    <div class="card green accent-2">
                        <div class="card-content black-text">
                            <br>
                            <span class="card-title"><b>ADMIN</b></span>
                            <br>
                            <a href="admin-list.php">
                                <btn class="waves-effect waves-light btn-small grey lighten-2 black-text" style="margin-bottom: 10px;">
                                    Manage Admin
                                </btn>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="center col s12 m4 l6">
                    <div class="card green accent-2">
                        <div class="card-content black-text">
                            <br>
                            <span class="card-title"><b>USER</b></span>
                            <br>
                            <a href="admin-userlist.php">
                                <btn class="waves-effect waves-light btn-small grey lighten-2 black-text" style="margin-bottom: 10px;">
                                    Manage User
                                </btn>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="center col s12 m4 l6">
                    <div class="card green accent-2">
                        <div class="card-content black-text">
                            <br>
                            <span class="card-title"><b>EVENT</b></span>
                            <br>
                            <a href="admin-manage-event.php">
                                <btn class="waves-effect waves-light btn-small grey lighten-2 black-text" style="margin-bottom: 10px;">
                                    Manage Event
                                </btn>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="blue">
        <div class="center">
            <a class="white-text"><b>Copyright © 2020 - Developed by Diyah, Izzat, Rachel</b></a>
        </div>
        <br>
    </footer>

    <script type="text/javascript" src="../static/js/materialize.js"></script>
    <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
    </script>
</body>
</html> 