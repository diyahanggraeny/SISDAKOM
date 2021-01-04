<?php

$id = $_GET["id"];

if(!empty($_GET['file'])){

    $filename = basename($_GET['file']);
    $filepath = '../static/img/' . $filename;

    if( !empty($filename) && file_exists($filepath)){

        header("Cache-control: public");
        header("Content-description: file transfer");
        header("Content-disposition: attachment; filename=$filename");
        header('Content-Length: ' . filesize($filepath));

        readfile($filepath);
        exit;
    }
    else{
        echo "
            <script>
                alert('File tidak ditemukan!');
                window.location.href = 'user-message-detail.php?id=$id';
            </script>
        
        ";
    }

}


?>