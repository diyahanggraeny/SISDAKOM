<?php

require 'functions2.php';

$del = $_GET["del"];
$id = $_GET["id"];

if( isset($del)) {
    if( hapusplist($del) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href = 'admin-participant-plist.php?id= $id' ;
            </script>
        
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'admin-participant-plist.php?id= $id';
            </script>
    
    "; 
    }
} else {
    echo "
    <script>
        alert('Data gagal dihapus karena id tidak ditemukan!');
        document.location.href = 'admin-participant-plist.php?id= $id';
    </script>
"; 
}

?>