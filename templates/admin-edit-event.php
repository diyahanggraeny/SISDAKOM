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
            <h4 class="center typo-1"><b>EDIT EVENT</b></h4>
            <form>
                <div class="row">
                    <div class="col s12 m3 l3">
                    <img src="../static/img/logo-woc.png" class="responsive-img">
                    </div>
                    <div class="col s12 m9 l9">
                        <div class="file-field input-field">
                            <h5>Poster</h5>
                            <div class="btn">
                                <span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <button class="right btn waves-effect waves-light indigo" type="submit" name="action"><b>CHANGE</b>
                        </button>
                    </div>
                </div>
            </form>
            <form>
                <div class="row">
                    <div class="input-field col s12 m9 offset-m3 l9 offset-l3">
                        <h5>Event Name</h5>
                        <input id="nama_event" type="text" class="validate">
                        <h5>HTM</h5>
                        <input id="harga_event" type="text" class="validate">
                        <h5>Information</h5>
                        <textarea id="info_event" class="materialize-textarea"></textarea>
                        <h5>Date</h5>
                        <input id="tanggal_event" type="date" class="validate">
                        <h5>Time</h5>
                        <input id="waktu_event" type="time" class="validate">
                        <h5>Max Participants</h5>
                        <input id="jumlah_partisipan" type="number" class="validate">
                        <h5>Status Event</h5>
                        <select>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="On Process">On Process</option>
                            <option value="Done">Done</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                        <button class="right btn waves-effect waves-light indigo" type="submit" name="action"><b>UPDATE</b>
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