<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$id = $_GET["id"];
$id_admin = $_SESSION["login"];
$mhs = query("SELECT * FROM admin WHERE id_admin = $id_admin")[0];


if( isset($id)) {
    if( hapusevent($id) > 0) {
        $log =  $mhs["admin_username"] .= " berhasil menghapus event" ;
        act_log($log);
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'admin-manage-event.php';
            </script>
        
        ";
    } else {
        $log =  $mhs["admin_username"] .= " gagal menghapus event" ;
        act_log($log);
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'admin-manage-event.php';
            </script>
    
    "; 
    }
} else {
    $log =  $mhs["admin_username"] .= " gagal menghapus event" ;
    act_log($log);
    echo "
    <script>
        alert('Data gagal dihapus karena id tidak ditemukan!');
        document.location.href = 'admin-manage-event.php';
    </script>
"; 
}

?>