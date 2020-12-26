<?php

require 'functions2.php';

$del = $_GET["del"];
$id = $_GET["id"];

if( isset($del)) {
    if( hapusflist($del) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href = 'admin-participant-flist.php?id= $id' ;
            </script>
        
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                window.location.href = 'admin-participant-flist.php?id= $id';
            </script>
    
    "; 
    }
} else {
    echo "
    <script>
        alert('Data gagal dihapus karena id tidak ditemukan!');
        window.location.href = 'admin-participant-flist.php?id= $id';
    </script>
"; 
}

?>