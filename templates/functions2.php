<?php

// koneksi ke database
$conn = mysqli_connect("localhost","root","","sisdakom");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
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


function uploadevent() {
    $namaFile = $_FILES['poster_event']['name'];
    $ukuranFile = $_FILES['poster_event']['size'];
    $error = $_FILES['poster_event']['error'];
    $tmpName = $_FILES['poster_event']['tmp_name'];

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
    if( $ukuranFile > 5000000 ) {
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


function ubahevent($data) {
    global $conn;

    $id_event = $data["id_event"];
    $nama_event = htmlspecialchars($data["nama_event"]);
    $htm = htmlspecialchars($data["htm"]);
    $kategori_event = htmlspecialchars($data["kategori_event"]);
    $informasi_event = htmlspecialchars($data["informasi_event"]);
    $tempat_event = htmlspecialchars($data["tempat_event"]);
    $tanggal_event = htmlspecialchars($data["tanggal_event"]);
    $waktu_event = htmlspecialchars($data["waktu_event"]);
    $max_partisipan = htmlspecialchars($data["max_partisipan"]);
    $status_event = htmlspecialchars($data["status_event"]);
    $event_old_picture = htmlspecialchars($data["event_old_picture"]);

    //cek apa user memilih gambar atau tidak
    if( $_FILES['poster_event']['error'] == 4 ) {
        $poster_event = $event_old_picture;
    }else {
        $poster_event = uploadevent();
    }

    $query = "UPDATE event SET nama_event = '$nama_event',htm = '$htm',kategori_event = '$kategori_event',
                informasi_event = '$informasi_event', tempat_event = '$tempat_event',tanggal_event = '$tanggal_event',
                waktu_event = '$waktu_event', max_partisipan = '$max_partisipan', status_event = '$status_event',
                poster_event = '$poster_event'  WHERE id_event = $id_event";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}



function tambahevent($data) {
    global $conn;

    $nama_event = htmlspecialchars($data["nama_event"]);
    $htm = htmlspecialchars($data["htm"]);
    $kategori_event = htmlspecialchars($data["kategori_event"]);
    $informasi_event = htmlspecialchars($data["informasi_event"]);
    $tempat_event = htmlspecialchars($data["tempat_event"]);
    $tanggal_event = htmlspecialchars($data["tanggal_event"]);
    $waktu_event = htmlspecialchars($data["waktu_event"]);
    $max_partisipan = htmlspecialchars($data["max_partisipan"]);
    $status_event = htmlspecialchars($data["status_event"]);

    //cek apa user memilih gambar atau tidak
    if( $_FILES['poster_event']['error'] == 4 ) {
        echo "
            <script>
                alert('Poster belum ditambahkan!');
            </script>";
        return false;
    }else {
        $poster_event = uploadevent();
    }

    $query = "INSERT INTO event VALUES('','$nama_event','$htm','$kategori_event','$informasi_event','$tanggal_event',
                '$waktu_event','$tempat_event',$max_partisipan,'$poster_event','$status_event')";
    
    $status = mysqli_query($conn, $query);

    if( !$status) {
        echo "
            <script>
                alert('Gagal insert data!');
            </script>";
        return false;
    }


    return mysqli_affected_rows($conn);

}

function hapusplist($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM event_partisipan_bayar WHERE id_partisipan = $id");

    return mysqli_affected_rows($conn);
}

function ubahuser($data) {
    global $conn;

    $id_user = $data["id_user"];
    $full_name = htmlspecialchars($data["full_name"]);
    $user_email = htmlspecialchars($data["user_email"]);
    $user_username = strtolower(stripcslashes($data["user_username"]));
    $instansi = htmlspecialchars($data["instansi"]);
    $angkatan = htmlspecialchars($data["angkatan"]);

    $query = "UPDATE user SET 
    user_username = '$user_username',
    full_name = '$full_name',
    user_email = '$user_email',
    user_picture = '$user_picture',
    instansi = '$instansi',
    angkatan = '$angkatan' 
    WHERE id_user = $id_user";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function ubahstatpembayaran($data) {
    global $conn;

    $id_partisipan = $data["id_partisipan"];
    $bukti_pembayaran = htmlspecialchars($data["bukti_pembayaran"]);
    $status_pembayaran = htmlspecialchars($data["status_pembayaran"]);

    $query = "UPDATE event_partisipan_bayar SET bukti_pembayaran = '$bukti_pembayaran',
                status_pembayaran = '$status_pembayaran' WHERE id_partisipan = $id_partisipan";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function hapusflist($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM event_partisipan_gratis WHERE id_partisipan = $id");

    return mysqli_affected_rows($conn);
}


function uploadeventdetail() {
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

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
    if( $ukuranFile > 5000000 ) {
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


function tambaheventdetail($data) {
    global $conn;

    $id_user = htmlspecialchars($data["id_user"]);
    $id_admin = htmlspecialchars($data["id_admin"]);
    $id_event = htmlspecialchars($data["id_event"]);
    $judul_pesan = htmlspecialchars($data["judul_pesan"]);
    $isi_pesan = htmlspecialchars($data["isi_pesan"]);

    //cek apa user memilih gambar atau tidak
    if( $_FILES['file']['error'] == 4 ) {
        $file = 'None';
    }else {
        $file = uploadeventdetail();
    }

    $query = "INSERT INTO event_detail VALUES('','$id_user','$id_admin','$id_event','$judul_pesan','$isi_pesan','$file',NOW())";
    
    $status = mysqli_query($conn, $query);

    if( !$status) {
        echo "
            <script>
                alert('Gagal insert data!');
            </script>";
        return false;
    }


    return mysqli_affected_rows($conn);

}

function hapuseventdetail($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM event_detail WHERE id_detail = $id");

    return mysqli_affected_rows($conn);
}

function ubahpass($data) {
    global $conn;

    $id_user = $data["id_user"];
    $new_password = mysqli_real_escape_string($conn, $data["new_password"]);
    $confirmpassword = mysqli_real_escape_string($conn, $data["confirmpassword"]);


    // Cek konfirmasi password
    if ($new_password !== $confirmpassword){
        echo "<script> 
                alert('Konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    // Enkripsi password
    $user_password = password_hash($new_password, PASSWORD_DEFAULT);


    $query = "UPDATE user SET 
    user_password = '$user_password'
    WHERE id_user = $id_user";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


?>
