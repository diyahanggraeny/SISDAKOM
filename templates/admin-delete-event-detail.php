<?php

require 'functions2.php';

$id_user = $_GET["id_user"];
$id_event = $_GET["id_event"];
$id = $_GET["id"];

if( isset($id)) {
    if( hapuseventdetail($id) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href = 'admin-event-detail.php?id_user=$id_user&id_event=$id_event';
            </script>
        
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                window.location.href = 'admin-event-detail.php?id_user=$id_user&id_event=$id_event';
            </script>
    
    "; 
    }
} else {
    echo "
    <script>
        alert('Data gagal dihapus karena id tidak ditemukan!');
        window.location.href = 'admin-event-detail.php?id_user=$id_user&id_event=$id_event';
    </script>
"; 
}

?>