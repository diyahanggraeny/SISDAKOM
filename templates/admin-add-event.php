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
            <h4 class="center typo-1"><b>ADD EVENT</b></h4>
            <form>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input id="nama_event" type="text" class="validate">
                        <label for="nama_event">EVENT</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                    <label for="harga_event">HTM</label>
                    <p>
                        <label>
                            <input name="harga_event" type="radio" />
                            <span>Free</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="harga_event" type="radio" />
                            <span><input id="harga_event" type="text" class="validate" placeholder="ISI HARGA"></span>
                        </label>
                    </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <select>
                            <option value="" disabled selected>PILIH KATEGORI</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <textarea id="info_event" class="materialize-textarea"></textarea>
                        <label for="info_event">INFORMATION</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <input id="tempat_event" type="text" class="validate">
                        <label for="tempat_event">PLACE</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 m4 l4">
                        <input id="tanggal_event" type="date" class="validate">
                        <label for="tanggal_event">DATE</label>
                    </div>
                    <div class="input-field col s4 m4 l4">
                        <input id="waktu_event" type="time" class="validate">
                        <label for="waktu_event">TIME</label>
                    </div>
                    <div class="input-field col s4 m4 l4">
                        <input id="jumlah_partisipan" type="number" class="validate">
                        <label for="jumlah_partisipan">MAX PARTICIPANTS</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s12 m12 l12">
                        <div class="btn green accent-2 black-text">
                            <span>POSTER</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s11 m11 l11">
                        <button class="right btn waves-effect waves-light black white-text" type="submit" name="action"><b>ADD</b>
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