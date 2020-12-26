<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$bayar = $_GET["bayar"];
$id = $_GET["id"];

// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
    // cek apakah data berhasil ditambahkan atau tidak
    if ( ubahstatpembayaran($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                window.location.href = 'admin-participant-plist.php?id= $id' ;
            </script>
        
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                window.location.href = 'admin-participant-plist.php?id= $id';
            </script>
    
    ";  }
}

$row = query("SELECT * FROM pembayaran WHERE id_pembayaran = $bayar")[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Participant</title>
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
            <h4 class="center typo-1"><b>STATUS</b></h4>
            <form action="" method="post">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <h5>Nomor Pembayaran : <?= $row["id_pembayaran"]; ?> </h5>
                        <input id="id_pembayaran" type="hidden" class="validate" name="id_pembayaran" value="<?= $row["id_pembayaran"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <h5>Proof of Payment</h5>
                        <input id="bukti_pembayaran" type="hidden" class="validate" name="bukti_pembayaran" value="<?= $row["bukti_pembayaran"]; ?>">
                        <?php if( $row["bukti_pembayaran"]) : ?>
                            <img src="../static/img/<?= $row["bukti_pembayaran"]; ?>" width="300px">
                        <?php else: ?>
                            <h6 style="font-style:italic;">Belum melakukan pembayaran</h6>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <h5>Status Payment</h5>
                        <select value="<?= $row["status_pembayaran"]; ?>" name="status_pembayaran">
                            <option value="<?= $row["status_pembayaran"]; ?>" disabled selected><?= $row["status_pembayaran"]; ?></option>
                            <option value="On Confirmation">On Confirmation</option>
                            <option value="Paid">Paid</option>
                            <option value="Done">Done</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <button class="right btn waves-effect waves-light indigo" type="submit" name="submit"><b>UPDATE STATUS</b>
                        </button>
                    </div>
                </div>
            </form>
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