<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
    // cek apakah data berhasil ditambahkan atau tidak
    if ( ubahevent($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'admin-manage-event.php';
            </script>
        
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'admin-edit-event.php';
            </script>
    
    "; }
}

$id = $_GET["id"];

$row = query("SELECT * FROM event WHERE id_event = $id")[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
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
            <h4 class="center typo-1"><b>EDIT EVENT</b></h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <input  name="id_event" type="hidden" value="<?= $row["id_event"]; ?>">
                    <input  name="event_old_picture" type="hidden" value="<?= $row["poster_event"]; ?>">
                    <div class="col s12 m3 l3">
                        <img src="../static/img/<?= $row["poster_event"]; ?>" class="responsive-img">
                    </div>
                    <div class="input-field col s12 m9 l9">
                        <div class="file-field input-field">
                            <h5>Poster</h5>
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="poster_event">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="poster_event" value="<?= $row["poster_event"]; ?>">
                            </div>
                        </div>
                        <h5>Event Name</h5>
                        <input name="nama_event" type="text" value="<?= $row["nama_event"]; ?>" class="validate">
                        <h5>HTM</h5>
                        <input name="htm" type="number" class="validate" value="<?= $row["htm"]; ?>" placeholder="Isi Biaya ( misal : 100000 ), isi 0 jika gratis">
                        <h5>Information</h5>
                        <textarea name="informasi_event" class="materialize-textarea"><?= $row["informasi_event"]; ?></textarea>
                        <h5>Kategori</h5>
                        <select name="kategori_event" value="<?= $row["kategori_event"]; ?>">
                            <option value="" disabled>PILIH KATEGORI</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                        <h5>Date</h5>
                        <input name="tanggal_event" type="date" value="<?= $row["tanggal_event"]; ?>" class="validate">
                        <h5>Time</h5>
                        <input name="waktu_event" type="time" value="<?= $row["waktu_event"]; ?>" class="validate">
                        <h5>Place</h5>
                        <input  name="tempat_event" value="<?= $row["tempat_event"]; ?>" type="text" class="validate">
                        <h5>Max Participants</h5>
                        <input name="max_partisipan" type="number" value="<?= $row["max_partisipan"]; ?>" class="validate">
                        <h5>Status Event</h5>
                        <select name="status_event" value="<?= $row["status_event"]; ?>">
                            <option value="<?= $row["status_event"]; ?>" selected>Data Lama : <?= $row["status_event"]; ?></option>
                            <option value="On Process">On Process</option>
                            <option value="Done">Done</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                        <button class="right btn waves-effect waves-light indigo" type="submit" name="submit"><b>UPDATE</b>
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