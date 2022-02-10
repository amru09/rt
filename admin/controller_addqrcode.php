<?php 

    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';

    $id_guru = $_POST['id_guru'];
    $id_mapel = $_POST['id_mapel'];
    $tgl = $_POST['tgl'];
    $waktu = $_POST['waktu'];

    $result = mysqli_query($mysqli, "INSERT INTO tb_qrcode SET 
                                        id_guru = '$id_guru',
                                        id_mapel = '$id_mapel',
                                        tgl = '$tgl',
                                        waktu = '$waktu'");
    if ($result) {
        echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=qrcode&val='.$id_guru.'||'.$id_mapel.'||'.$tgl.'||'.$waktu.'" </script>';
    } else {
        echo "gagal";
    }
    
?>