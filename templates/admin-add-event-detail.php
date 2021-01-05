<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$id_user = $_GET["id_user"];
$id_event = $_GET["id_event"];

$id_admin = $_SESSION["login"];
$mhs = query("SELECT * FROM admin WHERE id_admin = $id_admin")[0];

// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
    // cek apakah data berhasil ditambahkan atau tidak
    if ( tambaheventdetail($_POST) > 0 ) {
        $log =  $mhs["admin_username"] .= " berhasil menambah event detail" ;
        act_log($log);
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'admin-event-detail.php?id_user=$id_user&id_event=$id_event';
            </script>
        
        ";
    } else {
        $log =  $mhs["admin_username"] .= " gagal menambah event detail" ;
        act_log($log);
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                window.location.href = 'admin-add-event-detail.php?id_user=$id_user&id_event=$id_event';
            </script>
    
    "; }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event Detail</title>
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
            <h4 class="center typo-1"><b>ADD EVENT DETAIL</b></h4>
            <form action="" method="post" enctype="multipart/form-data">
                <input  name="id_user" type="hidden" value="<?= $id_user ?>">
                <input  name="id_admin" type="hidden" value="<?= $_SESSION['login'] ?>">
                <input  name="id_event" type="hidden" value="<?= $id_event ?>">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input id="judul_pesan" name="judul_pesan" type="text" class="validate" required>
                        <label for="judul_pesan">Judul Pesan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <textarea id="isi_pesan" name="isi_pesan" class="materialize-textarea" data-length="1000" required></textarea>
                        <label for="isi_pesan">Isi Pesan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s12 m12 l12">
                        <div class="btn green accent-2 black-text">
                            <span>Files</span>
                            <input type="file" name="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="file" placeholder="Maks ukuran 5 MB">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s11 m11 l11">
                        <button class="right btn waves-effect waves-light black white-text" type="submit" name="submit"><b>SEND</b>
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
    <script>
        $(document).ready(function() {
        $('textarea#isi_pesan').characterCounter();
    });
    </script>
</body>
</html> 