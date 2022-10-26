<?php 
$db = mysqli_connect("localhost", "root", "", "mahasiswa");

// tampil data
function tampilData($query) {
	global $db;

	$result = mysqli_query($db, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

// tampil kontak
function tampilKontak($query) {
	global $db;

	$result = mysqli_query($db, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

// tambah data
function tambahData($data) {
	global $db;

	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$email = htmlspecialchars($data["email"]);

	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO tbl_mahasiswa
				VALUES
			('', '$nama', '$nim', '$jurusan', '$email', '$gambar')
	";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ( $error === 4 ) {
		echo "
			<script>
				alert('Pilih Gambar Terlebih Dahulu!');
			</script>
		";

		return false;
	}

	// cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "
			<script>
				alert('Yang Anda Upload Bukan Gambar!');
			</script>
		";

		return false;
	}

	// cek jika ukuran gambar terlalu besar
	if ( $ukuranFile > 5000000 ) {
		echo "
			<script>
				alert('Ukuran Gambar Terlalu Besar!');
			</script>
		";

		return false;
	}

	// lolos pengecekan, gambar siap diupload
	//generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

// hapus data
function hapusData($id) {
	global $db;

	$query = "DELETE FROM tbl_mahasiswa WHERE id = $id";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

// ubah data
function ubahData($data) {
	global $db;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$email = htmlspecialchars($data["email"]);

	$gambarLama = $data["gambarLama"];

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	} 

	$query = "UPDATE tbl_mahasiswa
				SET
			nama = '$nama',
			nim = '$nim',
			jurusan = '$jurusan',
			email = '$email',
			gambar = '$gambar'
			WHERE id = $id
	";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

// ubah kontak
function ubahKontak($data) {
	global $db;

	$id = $data["id"];
	$alamat = htmlspecialchars($data["alamat"]);
	$sekretariat = htmlspecialchars($data["sekretariat"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$email = htmlspecialchars($data["email"]);

	$query = "UPDATE tbl_kontak
				SET
			alamat = '$alamat',
			sekretariat = '$sekretariat',
			telepon = '$telepon',
			email = '$email'
			WHERE id = $id
	";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

// daftar
function registrasi($data) {
	global $db;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek konfirmasi password
	if ( $password !== $password2 ) {
		echo "
			<script>
				alert('Konfirmasi Password Tidak Sesuai!');
			</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($db, "INSERT INTO tbl_user VALUES ('', '$username', '$password')");

	return mysqli_affected_rows($db);
	
}

// pesan
function komentar($data) {
	global $db;

	$pengirim = htmlspecialchars($data["pengirim"]);
	$sms = htmlspecialchars($data["sms"]);

	$query = "INSERT INTO tbl_pesan
				VALUES
				('', '$pengirim', '$sms')
			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

// tampil pesan user
function tampilPesan($query) {
	global $db;

	$result = mysqli_query($db, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

// tampil pesan admin
function tampilPesanAdmin($query) {
	global $db;

	$result = mysqli_query($db, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

// balas pesan
function balasPesanUser($data) {
	global $db;

	$balaspesan = htmlspecialchars($data["balaspesan"]);

	$query = "INSERT INTO tbl_balaspesan
				VALUES
				('', '$balaspesan')
			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

// hapus pesan 
function hapusPesan($id) {
	global $db;

	$query = "DELETE FROM tbl_pesan WHERE id = $id";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

// hapus pesan admin
function hapusPesanAdmin($id) {
	global $db;

	$query = "DELETE FROM tbl_balaspesan WHERE id = $id";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}


?>