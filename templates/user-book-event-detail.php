<?php
session_start();

if (!isset($_SESSION["loginsubmit"])) {
    header("Location: login.php");
    exit;
}

require 'functions2.php';
$id_user = $_SESSION["loginsubmit"];
$id_event = $_GET["id"];

$event = query("SELECT * FROM event_detail
                INNER JOIN user ON event_detail.id_user = user.id_user
                INNER JOIN event ON event_detail.id_event = event.id_event 
                INNER JOIN admin ON event_detail.id_admin = admin.id_admin");

if( !isset($event)){
    echo "
            <script>
                alert('Event ini belum memiliki detail!');
                window.location.href = 'user-profile-book-event.php';
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
    <title>Event Details</title>
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
                <li><a href="user-home.php" class="white-text" style="font-size: 20px;"><b>Home</b></a></li>
                <li><a href="user-events.php" class="white-text" style="font-size: 20px;"><b>Events</b></a></li>
                <li><a href="user-message.php" class="white-text" style="font-size: 20px;"><b>Message</b></a></li>
                <li><a href="user-profile-info.php" class="white-text" style="font-size: 20px;"><b>Profile</b></a></li>
            </ul>
        </div>
    </nav>

    
    <ul class="sidenav" id="mobile-demo">
        <li><a href="user-home.php" class="black-text" >Home</a></li>
        <li><a href="user-events.php" class="black-text" >Events</a></li>
        <li><a href="user-message.php" class="black-text" >Message</a></li>
        <li><a href="user-profile-info.php" class="black-text" >Profile</a></li>
    </ul>


    <main class="white">
        <br>
        <div class="container">
            <h4 class="center"><b>EVENT DETAILS</b></h4>
            <?php foreach( $event as $row) : ?>
                <?php if ( $row["id_user"] == $id_user and $row["id_event"] == $id_event) { ?>
                <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <p class="right"><?= $row["timedate"]?></p>
                                <p>From : <?= $row["admin_username"]?> </p>
                                <p><b><?= $row["judul_pesan"]?></b></p>
                            </div>
                            <div class="card-action">
                                <a href="user-message-detail.php?id=<?= $row["id_detail"]?>" class="indigo-text">See Message</a>
                        </div>
                    </div>
                </div>
            </div>
                <?php } else{
                    header("Location: user-book-event-detail-none.php");
                    exit();
                } ?>
            <?php endforeach; ?>
        </div>
        <br>
    </main>

    <footer class="blue">
        <br>
        <div class="center">
            <a class="white-text"><b>Copyright © 2020 - Developed by Diyah, Izzat, Rachel</b></a>
        </div>
        <br>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../static/js/materialize.js"></script>
    <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
    </script>
    <script>
        $(document).ready(function(){
        $('select').formSelect();
        });
    </script>
</body>
</html> 