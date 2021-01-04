<?php

require 'functions2.php';

$id = $_GET["id"];
if( isset($id)) {
    if( hapusevent($id) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'admin-manage-event.php';
            </script>
        
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'admin-manage-event.php';
            </script>
    
    "; 
    }
} else {
    echo "
    <script>
        alert('Data gagal dihapus karena id tidak ditemukan!');
        document.location.href = 'admin-manage-event.php';
    </script>
"; 
}

?>