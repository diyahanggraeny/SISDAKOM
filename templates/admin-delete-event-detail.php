<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: admin-login.php");
    exit;
}

require 'functions2.php';

$id_user = $_GET["id_user"];
$id_event = $_GET["id_event"];
$id = $_GET["id"];

$id_admin = $_SESSION["login"];
$mhs = query("SELECT * FROM admin WHERE id_admin = $id_admin")[0];

if( isset($id)) {
    if( hapuseventdetail($id) > 0) {
        $log =  $mhs["admin_username"] .= " berhasil menghapus event detail" ;
        act_log($log);
        echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href = 'admin-event-detail.php?id_user=$id_user&id_event=$id_event';
            </script>
        
        ";
    } else {
        $log =  $mhs["admin_username"] .= " gagal menghapus event detail" ;
        act_log($log);
        echo "
            <script>
                alert('Data gagal dihapus!');
                window.location.href = 'admin-event-detail.php?id_user=$id_user&id_event=$id_event';
            </script>
    
    "; 
    }
} else {
    $log =  $mhs["admin_username"] .= " gagal menghapus event detail" ;
    act_log($log);
    echo "
    <script>
        alert('Data gagal dihapus karena id tidak ditemukan!');
        window.location.href = 'admin-event-detail.php?id_user=$id_user&id_event=$id_event';
    </script>
"; 
}

?>