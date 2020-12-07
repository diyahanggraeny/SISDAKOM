<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
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
            <h4 class="center typo-1"><b>ADMIN LIST</b></h4>
            <table class="centered responsive-table blue lighten-4">
                <div>
                    <a class="btn-floating btn-large waves-effect waves-light green accent-2 right"><i class="black-text material-icons">add</i></a>
                    <br>
                </div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>E-MAIL</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Admin 1</td>
                        <td>ilkom1.et.gmail.com</td>
                        <td><a class="black-text"><b>EDIT</b></a></td>
                        <td><a class="black-text"><b>DELETE</b></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Admin 1</td>
                        <td>ilkom1.et.gmail.com</td>
                        <td><a class="black-text"><b>EDIT</b></a></td>
                        <td><a class="black-text"><b>DELETE</b></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Admin 1</td>
                        <td>ilkom1.et.gmail.com</td>
                        <td><a class="black-text"><b>EDIT</b></a></td>
                        <td><a class="black-text"><b>DELETE</b></a></td>
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