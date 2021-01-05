<?php

session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$id_admin = $_SESSION["login"];
$mhs = query("SELECT * FROM admin WHERE id_admin = $id_admin")[0];

// cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
    // cek apakah data berhasil ditambahkan atau tidak
    if ( tambahadmin($_POST) > 0 ) {
        $log =  $mhs["admin_username"] .= " berhasil menambah admin" ;
        act_log($log);
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'admin-add.php';
            </script>
        
        ";
    } else {
        $log =  $mhs["admin_username"] .= " gagal menambah admin" ;
        act_log($log);
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'admin-add.php';
            </script>
    
    "; }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
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
            <h4 class="center typo-1"><b>ADD ADMIN</b></h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <h6>Username</h6>
                        <input id="admin_username" name="admin_username" type="text" class="validate" required>
                        <h6>Name</h6>
                        <input id="admin_name" name="admin_name" type="text" class="validate" required>
                        <h6>E-Mail</h6>
                        <input id="admin_email" name="admin_email" type="email" class="validate" required>
                        <h6>Password</h6>
                        <input id="admin_password" name="admin_password" type="password" class="validate" required>
                        <h6>Confirm Password</h6>
                        <input id="admin_confpassword" name="admin_confpassword" type="password" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <button class="right btn waves-effect waves-light indigo" type="submit" name="submit"><b>ADD ADMIN</b>
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