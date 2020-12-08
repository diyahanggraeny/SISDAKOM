<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
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
            <h4 class="center"><b>MESSAGE</b></h4>
            <div class="row">
                <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1 center indigo">
                    <h5 class="valign-wrapper white-text"><i class="large material-icons grey-text">account_circle</i>Zulfan Afandi</h5>
                </div>
                <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1 green accent-2 chat-background">
                    <div>
                        <div class="col s12 m12 l12">
                            <br>
                            <div class="white col s6 m6 l6">
                                <p>Selamat siang Admin, untuk sertifikat kapan bisa didownload ya?</p>
                            </div>
                            <br>
                        </div>
                        <div class="col s12 m12 l12">
                            <br>
                            <div class="white-text indigo col s6 offset-s6 m6 offset-m6 l6 offset-l6">
                                <p>Selamat siang, untuk sertifikatnya dapat didownload setelah acara selesai dan jika kamu hadir ya</p>
                            </div>
                            <br>
                        </div>
                        <div class="col s12 m12 l12">
                            <br>
                            <div class="white col s6 m6 l6">
                                <p>Terima kasih infonya Admin</p>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1 center white send-box">
                    <form>
                        <div class="row">
                            <div class="file-field input-field col s1 m1 l1">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="hidden" placeholder="Upload one or more files">
                                </div>
                            </div>
                            <div class="input-field col s11 m11 l11">
                                <textarea id="textarea1" placeholder="Type your messages here" class="materialize-textarea"></textarea>
                                <a class="right btn waves-effect waves-light indigo" type="submit" name="action"><b>SEND</b>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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