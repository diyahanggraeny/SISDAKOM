<?php

// koneksi ke database
$conn = mysqli_connect("localhost","root","","sisdakom");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM admin WHERE id_admin = $id");

    return mysqli_affected_rows($conn);
}


function tambahadmin($data) {
    global $conn;

    $admin_username = strtolower(stripcslashes($data["admin_username"]));
    $admin_name = htmlspecialchars($data["admin_name"]);
    $admin_email = htmlspecialchars($data["admin_email"]);
    $admin_password = mysqli_real_escape_string($conn, $data["admin_password"]);
    $admin_confpassword = mysqli_real_escape_string($conn, $data["admin_confpassword"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT admin_username from admin WHERE admin_username = '$admin_username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    
    //cek konfirmasi password
    if( $admin_password !== $admin_confpassword ) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    //enkripsi password
    $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);

    //tambahkan admin ke database
    mysqli_query($conn, "INSERT INTO admin VALUES('','$admin_name','$admin_email','$admin_username','$admin_password','')");

    return mysqli_affected_rows($conn);
}


?>