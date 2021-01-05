<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$del = $_GET["del"];
$id = $_GET["id"];
$id_admin = $_SESSION["login"];
$mhs = query("SELECT * FROM admin WHERE id_admin = $id_admin")[0];

if( isset($del)) {
    if( hapusflist($del) > 0) {
        $log =  $mhs["admin_username"] .= " berhasil menghapus partisipan" ;
        act_log($log);
        echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href = 'admin-participant-flist.php?id= $id' ;
            </script>
        
        ";
    } else {
        $log =  $mhs["admin_username"] .= " gagal menghapus partisipan" ;
        act_log($log);
        echo "
            <script>
                alert('Data gagal dihapus!');
                window.location.href = 'admin-participant-flist.php?id= $id';
            </script>
    
    "; 
    }
} else {
    $log =  $mhs["admin_username"] .= " gagal menghapus partisipan" ;
    act_log($log);
    echo "
    <script>
        alert('Data gagal dihapus karena id tidak ditemukan!');
        window.location.href = 'admin-participant-flist.php?id= $id';
    </script>
"; 
}

?>