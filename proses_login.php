<?php

//* Includde Koneksi Ke database
include_once("admin/config/connect-db.php");

//* Include Base Url
include_once("admin/config/base-url.php");


	$username = $_POST['username'];
	$pass     = md5($_POST['password']);
	$hak_akses = $_POST['hak_akses'];

	if ($hak_akses == 1) {
		$login = mysqli_query($mysqli, "SELECT * FROM tb_users a LEFT JOIN tb_guru b  ON a.username = b.id_guru WHERE a.username = '$username' AND a.password='$pass'");
		$row = mysqli_fetch_array($login);
		if ($row['username'] == $username && $row['password'] == $pass && $row['hak_akses'] == 1 || 
			$row['username'] == $username && $row['password'] == $pass && $row['hak_akses'] == 2 )
		{
			session_start();
			$_SESSION['id_user']    = $row['id_guru'];
			$_SESSION['nama']        = $row['nama'];

			if($row['hak_akses']==1){
					$_SESSION['status'] = 'ADMIN';
			}elseif($row['hak_akses']==2){
					$_SESSION['status'] = 'GURU';
			}

			// Jika Sukses, redirect halaman menggunakan javascript
			echo json_encode(array('status' => 'ok', 'url'=>$base_url_back.'/index.php'));
		}
		else  
		{
			// Jika Sukses, redirect halaman menggunakan javascript
			echo "error";
		}
	} else {
		$login = mysqli_query($mysqli, "SELECT * FROM tb_users a LEFT JOIN tb_siswa b  ON a.username = b.id_siswa WHERE a.username = '$username' AND a.password='$pass' AND b.id_siswa IS NOT NULL");
		$row = mysqli_fetch_array($login);
		if ($row['username'] == $username && $row['password'] == $pass && $row['hak_akses'] == 3)
		{
			session_start();
			$_SESSION['id_user']    = $row['id_siswa'];
			$_SESSION['nama']        = $row['nama'];
			$_SESSION['status'] = 'SISWA';

			// Jika Sukses, redirect halaman menggunakan javascript
			echo json_encode(array('status' => 'ok', 'url'=>$base_url_back.'/index.php'));
		}
		else  
		{
			// Jika Sukses, redirect halaman menggunakan javascript
			echo "error";
		}
	}

?>