<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Dashboard</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Manage Admin</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Manage User</b></a></li>
                <li><a href="#" class="white-text" style="font-size: 20px;"><b>Manage Event</b></a></li>
            </ul>
        </div>
    </nav>

    
    <ul class="sidenav" id="mobile-demo">
        <li><a href="#" class="black-text" >Dashboard</a></li>
        <li><a href="#" class="black-text" >Manage Admin</a></li>
        <li><a href="#" class="black-text" >Manage User</a></li>
        <li><a href="#" class="black-text" >Manage Event</a></li>
    </ul>


    <main class="white">
        <div class="row">
            <div class="center blue lighten-4 col s12 m3 l3">
                <br>
                <br>
                <div class="center">
                    <i class="center large material-icons icon-acc2">account_circle</i>
                </div>
                <h5>ADMIN 1</h5>
                <p>hahahihi@gmail.com</p>
                <p>ILKOM-XX</p>
                <a class="waves-effect waves-light btn-small grey lighten-2 black-text">Edit Profile</a>
                <br>
                <br>
                <h6><b>LOGOUT</b></h6>
                <br>
                <br>
                <br>
            </div>
            <div class="col s12 m9 l9">
                <br>
                <div class="center col s12 m4 l6">
                    <div class="card green accent-2">
                        <div class="card-content black-text">
                            <br>
                            <span class="card-title"><b>ADMIN</b></span>
                            <br>
                            <a href="#">
                                <btn class="waves-effect waves-light btn-small grey lighten-2 black-text" style="margin-bottom: 10px;">
                                    Manage Admin
                                </btn>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="center col s12 m4 l6">
                    <div class="card green accent-2">
                        <div class="card-content black-text">
                            <br>
                            <span class="card-title"><b>USER</b></span>
                            <br>
                            <a href="#">
                                <btn class="waves-effect waves-light btn-small grey lighten-2 black-text" style="margin-bottom: 10px;">
                                    Manage User
                                </btn>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="center col s12 m4 l6">
                    <div class="card green accent-2">
                        <div class="card-content black-text">
                            <br>
                            <span class="card-title"><b>EVENT</b></span>
                            <br>
                            <a href="#">
                                <btn class="waves-effect waves-light btn-small grey lighten-2 black-text" style="margin-bottom: 10px;">
                                    Manage Event
                                </btn>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="blue">
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