<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$event = query("SELECT * FROM event");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
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
            <h4 class="center typo-1"><b>MANAGE EVENT</b></h4>
            <table class="centered responsive-table">
                <div>
                    <a href="admin-add-event.php" class="btn-floating btn-large waves-effect waves-light green accent-2 right"><i class="black-text material-icons">add</i></a>
                    <br>
                </div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>EVENT</th>
                        <th>POSTER</th>
                        <th>PRICE</th>
                        <th>INFORMATION</th>
                        <th>KATEGORI</th>
                        <th>STATUS</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i =1; ?>
                    <?php foreach( $event as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["nama_event"]; ?></td>
                        <td><img src="../static/img/<?= $row["poster_event"]; ?>" width="70px"></td>
                        <td><?php if( $row["htm"] === '0') : ?>
                                Gratis
                            <?php else :?>
                                <?= $row["htm"]; ?>
                            <?php endif; ?>
                        </td>
                        <td><?= $row["tanggal_event"];?><br>
                            <?= $row["waktu_event"];?><br>
                            <?=$row["tempat_event"]; ?><br>
                            Maks : <?=$row["max_partisipan"]; ?>
                        </td>
                        <td><?= $row["kategori_event"]; ?></td>
                        <td><?= $row["status_event"]; ?></td>
                        <td><a class="black-text" href="admin-edit-event.php?id=<?= $row["id_event"]; ?>"><b>EDIT</b></a></td>
                        <td><a class="black-text" href="admin-delete-event.php?id=<?= $row["id_event"]; ?>" 
                                onclick="return confirm('Apakah Anda yakin?');"><b>DELETE</b></a></td>
                        <td><button  class="btn-flat waves-effect waves-light grey"><a href="admin-participant-list.php?id=<?= $row["id_event"]; ?>" class="white-text">Participant List</a></button></td>
                    </tr>
                    <?php $i++; ?>
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