<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$id = $_GET["id"];

$count = query("SELECT COUNT(*) FROM event_partisipan_bayar WHERE id_event = $id");

$event_data = query("SELECT * FROM event WHERE id_event = $id");

$event = query("SELECT * FROM event_partisipan_bayar
            INNER JOIN user ON event_partisipan_bayar.id_user = user.id_user
            INNER JOIN event ON event_partisipan_bayar.id_event = event.id_event 
            INNER JOIN pembayaran ON event_partisipan_bayar.id_pembayaran = pembayaran.id_pembayaran");


if( !isset($event)){
    echo "
            <script>
                alert('Event ini belum memiliki partisipan!');
                window.location.href = 'admin-manage-event.php';
            </script>
        
        ";
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant List</title>
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
            <h4 class="center typo-1"><b>PARTICIPANT LIST</b></h4>
            <div class="row">
                <?php foreach( $event_data as $row) : ?>
                    <?php if( $row["id_event"] == $id ) { ?>
                <div class="col s2 m2 l2">
                    <img src="../static/img/<?= $row["poster_event"] ?>" class="responsive-img">
                </div>
                <div class="col s10 m10 l10">
                    <p><?= $row["nama_event"] ?></p>
                    <p><?= $row["htm"] ?></p>
                    <p><?= $row["tanggal_event"] ?>  <?= $row["tempat_event"] ?></p>
                </div>
                    <?php } ?>
                <?php endforeach; ?>
                <?php foreach( $count as $row) : ?>
                <div class="col s12 m12 l12">
                    <a class="waves-effect waves-teal btn-flat grey right black-text"><?= $row["COUNT(*)"] ?> PARTICIPANTS</a>
                </div>
                <?php endforeach; ?> 
            </div>
            <table class="centered responsive-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>E-MAIL</th>
                        <th>NO.HP</th>
                        <th>INSTANSI</th>
                        <th>STATUS</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i =1; ?>
                    <?php foreach( $event as $row) : ?>
                        <?php if( $row["id_event"] == $id ) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["full_name"]; ?></td>
                        <td><?= $row["user_email"]; ?></td>
                        <td><?= $row["phone_number"]; ?></td>
                        <td><?= $row["instansi"]; ?></td>
                        <td><?= $row["status_pembayaran"]; ?></td>
                        <td><a href="admin-delete-plist.php?del=<?= $row["id_partisipan"]; ?>&id=<?= $id ?>" onclick="
                            return confirm('Apakah Anda yakin?');" class="black-text"><i class="green-text accent-2-text material-icons">delete</i></a></td>
                        <td><a href="admin-event-detail.php?id_user=<?= $row["id_user"]; ?>&id_event=<?= $id ?>" class="black-text"><b><i class="green-text accent-2-text material-icons">mail</i></b></a></td>
                        <td><a href="admin-status.php?bayar=<?= $row["id_pembayaran"]; ?>&id=<?= $id ?>">Check Payment</a></td>
                    </tr>
                        <?php } ?>
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