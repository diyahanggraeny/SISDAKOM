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
    if ( tambahevent($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'admin-manage-event.php';
            </script>
        
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'admin-add-event.php';
            </script>
    
    "; }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
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
            <h4 class="center typo-1"><b>ADD EVENT</b></h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input id="nama_event" name="nama_event" type="text" class="validate" required>
                        <label for="nama_event">EVENT</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                    <label for="htm">HTM</label>
                    <p>
                        <label>
                            <input name="htm" type="radio" value="Free" required />
                            <span>Free</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="htm" type="radio" required />
                            <span><input name="htm" type="text" class="validate" placeholder="Isi biaya (misal : 100000) "></span>
                        </label>
                    </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <select name="kategori_event" required>
                            <option value="" disabled selected>PILIH KATEGORI</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <textarea id="informasi_event" name="informasi_event" class="materialize-textarea" required></textarea>
                        <label for="informasi_event">INFORMATION</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input id="tempat_event" name="tempat_event" type="text" class="validate" required>
                        <label for="tempat_event">PLACE</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 m4 l4">
                        <input id="tanggal_event" name="tanggal_event" type="date" class="validate" required>
                        <label for="tanggal_event">DATE</label>
                    </div>
                    <div class="input-field col s4 m4 l4">
                        <input id="waktu_event" name="waktu_event" type="time" class="validate" required>
                        <label for="waktu_event">TIME</label>
                    </div>
                    <div class="input-field col s4 m4 l4">
                        <input id="max_partisipan" name="max_partisipan" type="number" class="validate" required>
                        <label for="max_partisipan">MAX PARTICIPANTS</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s12 m12 l12">
                        <div class="btn green accent-2 black-text">
                            <span>POSTER</span>
                            <input type="file" name="poster_event" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="poster_event" placeholder="Maks ukuran 5 MB" required>
                        </div>
                        </div>
                    </div>
                </div>
                <input  name="status_event" type="hidden" value="On Process">
                <div class="row">
                    <div class="col s11 m11 l11">
                        <button class="right btn waves-effect waves-light black white-text" type="submit" name="submit"><b>ADD</b>
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