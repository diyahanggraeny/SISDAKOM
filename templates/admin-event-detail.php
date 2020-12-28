<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$id_user = $_GET["id_user"];
$id_event = $_GET["id_event"];


$event = query("SELECT * FROM event_detail
            INNER JOIN user ON event_detail.id_user = user.id_user
            INNER JOIN event ON event_detail.id_event = event.id_event 
            INNER JOIN admin ON event_detail.id_admin = admin.id_admin");


if( !isset($event)){
    header("Location: admin-add-event-detail.php?id_user=$id_user&id_event=$id_event");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Detail</title>
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
        <li><a href="admin-dashboard.php" class="black-text" >Dashboard</a></li>
        <li><a href="admin-list.php" class="black-text" >Manage Admin</a></li>
        <li><a href="admin-userlist.php" class="black-text" >Manage User</a></li>
        <li><a href="admin-manage-event.php" class="black-text" >Manage Event</a></li>
    </ul>


    <main class="white">
        <br>
        <div class="container">
            <h4 class="center typo-1"><b>EVENT DETAIL</b></h4>
            <div>
                <a href="admin-add-event-detail.php?id_user=<?= $id_user ?>&id_event=<?= $id_event ?>" class="btn-floating btn-large waves-effect waves-light green accent-2 right"><i class="black-text material-icons">add</i></a>
            </div>
            <table class="centered responsive-table">
                <thead>
                    <tr>
                        <th>WAKTU</th>
                        <th>JUDUL</th>
                        <th>ISI PESAN</th>
                        <th>ISI FILE</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach( $event as $row) : ?>
                        <?php if( $row["id_event"] == $id_event and $row["id_user"] == $id_user and $row["id_admin"] == $_SESSION["login"] ) { ?>
                    <tr>
                        <td><?= $row["timedate"]; ?></td>
                        <td><?= $row["judul_pesan"]; ?></td>
                        <td><?= $row["isi_pesan"]; ?></td>
                        <td><?= $row["file"]; ?></td>
                        <td><a href="admin-delete-event-detail.php?id_user=<?= $id_user ?>&id_event=<?= $id_event ?>&id=<?= $row["id_detail"]; ?>" onclick="
                            return confirm('Apakah Anda yakin?');" class="black-text"><b><i class="green-text accent-2-text material-icons">delete</i></b></a></td>
                    </tr>
                        <?php } ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>
    </main>

    <footer class="blue">
        <br>
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