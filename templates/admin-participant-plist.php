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
        <br>
        <div class="container">
            <h4 class="center typo-1"><b>PARTICIPANT LIST</b></h4>
            <div class="row">
                <div class="col s2 m2 l2">
                    <img src="../static/img/logo-woc.png" class="responsive-img">
                </div>
                <div class="col s10 m10 l10">
                    <p>Words of Courage</p>
                    <p>Free</p>
                    <p>20 September 2020 Zoom meeting</p>
                </div>
                <div class="col s12 m12 l12">
                    <a class="waves-effect waves-teal btn-flat grey right black-text">10 PARTICIPANTS</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <a class="waves-effect waves-teal btn-flat green accent-2 right black-text"><i class="right material-icons">mail</i>Message All</a>
                </div>
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
                    <tr>
                        <td>1</td>
                        <td>Zulfan Afandi</td>
                        <td>fazul.et.gmail.com</td>
                        <td>082376548977</td>
                        <td>BINUS</td>
                        <td>Paid</td>
                        <td><a class="black-text"><i class="green-text accent-2-text material-icons">delete</i></a></td>
                        <td><a class="black-text"><i class="green-text accent-2-text material-icons">mail</i></a></td>
                        <td><a>Check Payment</a></td>
                    </tr>
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