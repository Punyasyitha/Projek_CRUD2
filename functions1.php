<?php 
$conn = mysqli_connect("localhost","root","","db_temankelas");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data) {
	global $conn;

	$NRP = htmlspecialchars($data['NRP']);
	$Nama = htmlspecialchars($data['Nama']);
	$Jenis_Kelamin = htmlspecialchars($data['Jenis_Kelamin']);
	$Jurusan = htmlspecialchars($data['Jurusan']);
	$Email = htmlspecialchars($data['Email']);
	$Alamat = htmlspecialchars($data['Alamat']);
	$No_Handphone = htmlspecialchars($data['No_Handphone']);
	$Asal_Sekolah = htmlspecialchars($data['Asal_Sekolah']);
	$Matkul_Favorit = htmlspecialchars($data['Matkul_Favorit']);
    $Gambar = upload();
	if( !$Gambar ) {
		return false;
	}

	$query = "INSERT INTO tbl_mahasiswa
				VALUES
			  ('', '$NRP', '$Nama', '$Jenis_Kelamin', '$Jurusan','$Email', '$Alamat', '$No_Handphone', '$Asal_Sekolah', '$Matkul_Favorit', '$Gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['Gambar']['name'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_mahasiswa WHERE No = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
	$no = $_GET['id'];
	$NRP = htmlspecialchars($data['NRP']);
	$Nama = htmlspecialchars($data['Nama']);
	$Jenis_Kelamin = htmlspecialchars($data['Jenis_Kelamin']);
	$Jurusan = htmlspecialchars($data['Jurusan']);
	$Email = htmlspecialchars($data['Email']);
	$Alamat = htmlspecialchars($data['Alamat']);
	$No_Handphone = htmlspecialchars($data['No_Handphone']);
	$Asal_Sekolah = htmlspecialchars($data['Asal_Sekolah']);
	$Matkul_Favorit = htmlspecialchars($data['Matkul_Favorit']);
    $GambarLama = htmlspecialchars($data["GambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['Gambar']['error'] === 4 ) {
		$Gambar = $GambarLama;
	} else {
		$Gambar = upload();
	}

	$query = "UPDATE tbl_mahasiswa 
				SET
				 NRP='$NRP',
                 Nama='$Nama',
                 Jenis_Kelamin='$Jenis_Kelamin',
                 Jurusan='$Jurusan',
                 Email='$Email', 
                 Alamat='$Alamat', 
                 No_Handphone='$No_Handphone',
                Asal_Sekolah='$Asal_Sekolah', 
                Matkul_Favorit='$Matkul_Favorit', 
                Gambar='$Gambar'
                WHERE No='$no'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tampilan WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO tampilan VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

?>