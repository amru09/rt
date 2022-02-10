<?php

	//* Includde Koneksi Ke database
	include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';

	// Memisahkan Nama dan Nomor identitas
    $p   = $_POST['val'];
    $ext = explode('||', $p);
    $id_guru = $ext[0];
    $id_mapel = $ext[1];
    $tgl = $ext[2];
    $waktu = $ext[3];
    $id_siswa = $_POST['id_siswa'];
    $kelas = $_POST['kelas'];

	$result = mysqli_query($mysqli, "INSERT INTO tb_kehadiran SET id_guru='$id_guru', id_siswa='$id_siswa', id_mapel='$id_mapel', kelas='$kelas', tgl='$tgl', waktu='$waktu'") or die(mysqli_error($mysqli));

    if ($result) {
        echo json_encode(array('status' => 'ok', 'url'=>$base_url_back.'/index.php'));
    } else {
        echo "error";
    }
		  