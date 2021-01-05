<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$id = $_GET["id"];
$id_admin = $_SESSION["login"];

$mhs = query("SELECT * FROM admin WHERE id_admin = $id")[0];
$mhs2 = query("SELECT * FROM admin WHERE id_admin = $id_admin")[0];


// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
    // cek apakah data berhasil ditambahkan atau tidak
    if ( ubahadmin($_POST) > 0 ) {
        $log =  $mhs2["admin_username"] .= " berhasil mengubah data admin" ;
        act_log($log);
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'admin-list.php';
            </script>
        
        ";
    } else {
        $log =  $mhs2["admin_username"] .= " gagal mengubah data admin" ;
        act_log($log);
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'admin-list.php';
            </script>
    
    "; }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
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
            <h4 class="center typo-1"><b>EDIT ADMIN</b></h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input  name="id_admin" type="hidden" value="<?= $mhs["id_admin"]; ?>">
                        <input  name="admin_old_picture" type="hidden" value="<?= $mhs["admin_picture"]; ?>">
                        <h6>Username</h6>
                        <input id="admin_username" name="admin_username" type="text" class="validate" value="<?= $mhs["admin_username"]; ?>" required >
                        <h6>Name</h6>
                        <input id="admin_name" name="admin_name" type="text" class="validate" value="<?= $mhs["admin_name"]; ?>" required>
                        <h6>E-Mail</h6>
                        <input id="admin_email" name="admin_email" type="email" class="validate" value="<?= $mhs["admin_email"]; ?>" required>
                    </div>
                    <div class="col s12 m3 l3">
                        <?php if( $mhs["admin_picture"]) :?>
                            <img src="../static/img/<?= $mhs["admin_picture"]; ?>" width="150px" class="center">
                        <?php else: ?>
                            <h6 style="font-style:italic;">None Picture</h6>
                        <?php endif; ?>
                    </div>
                    <div class="col s12 m9 l9">
                        <div class="file-field input-field">
                            <h6>Profile Picture</h6>
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="admin_picture" >
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="admin_picture" type="text" value="<?= $mhs["admin_picture"]; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <button class="right btn waves-effect waves-light indigo" type="submit" name="submit"><b>EDIT ADMIN</b>
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

    <script type="text/javascript" src="../static/js/materialize.js"></script>
    <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
    </script>
</body>
</html> 