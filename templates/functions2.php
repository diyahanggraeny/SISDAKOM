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

function signup($data) {
    global $conn;

    $user_username = strtolower(stripslashes($data["user_username"]));
    $user_email = htmlspecialchars($data["user_email"]);
    $full_name = htmlspecialchars($data["full_name"]);
    $user_password = mysqli_real_escape_string($conn, $data["user_password"]);
    $confirmpassword = mysqli_real_escape_string($conn, $data["confirmpassword"]);

    // Cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT user_username FROM user WHERE user_username ='$user_username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar')
              </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($user_password !== $confirmpassword){
        echo "<script> 
                alert('Konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    // Enkripsi password
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);

    // Tambah data user ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$user_username', '$user_email', '$full_name', '', '', '', '$user_password', '')");

    return mysqli_affected_rows($conn);
}


function uploadadmin(){
    $namaFile = $_FILES['admin_picture']['name'];
    $ukuranFile = $_FILES['admin_picture']['size'];
    $error = $_FILES['admin_picture']['error'];
    $tmpName = $_FILES['admin_picture']['tmp_name'];

    //cek apakah tidak ada gambar yg diupload
    if( $error === 4 ) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    } 

    // cek apakah yg diupload gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
            <script>
                alert('File yang Anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek ukuran file
    if( $ukuranFile > 2000000 ) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    //siap diupload
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, '../static/img/' . $namaFileBaru);

    return $namaFileBaru;

}



function ubahadmin($data) {
    global $conn;

    $id_admin = $data["id_admin"];
    $admin_username = strtolower(stripcslashes($data["admin_username"]));
    $admin_name = htmlspecialchars($data["admin_name"]);
    $admin_email = htmlspecialchars($data["admin_email"]);
    $admin_old_picture = htmlspecialchars($data["admin_old_picture"]);

    //cek apa user memilih gambar atau tidak
    if( $_FILES['admin_picture']['error'] == 4 ) {
        $admin_picture = $admin_old_picture;
    }else {
        $admin_picture = uploadadmin();
    }

    $query = "UPDATE admin SET admin_username = '$admin_username',admin_name = '$admin_name',admin_email = '$admin_email',
                admin_picture = '$admin_picture' WHERE id_admin = $id_admin";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

?>
