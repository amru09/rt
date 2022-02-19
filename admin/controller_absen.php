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

    // SELEKSI
    $exp = explode('-', $waktu);
    $date1 = date('Y-m-d');
    $date2 = $tgl;
    $waktu = $exp[1];
    $waktu = strtotime($waktu);
    $end = strftime("%X");
    $end = strtotime($end);
    $waktu_hasil = ($end - $waktu) / 60;

    if ($date1 <= $date2)
    {
        if ($waktu_hasil > 0)
        {
            echo "Waktu Absen Telah Lewat";
        }else {
            $result = mysqli_query($mysqli, "INSERT INTO tb_kehadiran SET id_guru='$id_guru', id_siswa='$id_siswa', id_mapel='$id_mapel', kelas='$kelas', tgl='$tgl', waktu='$waktu'") or die(mysqli_error($mysqli));

            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        }
    }else {
        echo "Tanggal Absen Telah Lewat";
    }
		  