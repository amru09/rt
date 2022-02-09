<?php 

    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';

	$action  = $_GET['action'];

/* DATA GURU */
if($action == "insert")
{	
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $jkel = $_POST['jkel'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];

        $result = mysqli_query($mysqli, "INSERT INTO tb_guru SET
                                       id_guru = '$id_guru',
                                       nama = '$nama',
                                       jkel = '$jkel',
                                       tempat_lahir = '$tempat_lahir',
                                       tgl_lahir = '$tgl_lahir'") or die (mysqli_error($mysqli)); 
    
      if($result){ 
          echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-guru" </script>';
      }else{
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      }

}elseif($action == "update")
{
    $ID = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $jkel = $_POST['jkel'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];

        $result = mysqli_query($mysqli, "UPDATE tb_guru SET
                                       nama = '$nama',
                                       jkel = '$jkel',
                                       tempat_lahir = '$tempat_lahir',
                                       tgl_lahir = '$tgl_lahir'
                                       WHERE id_guru = '$ID'") or die (mysqli_error($mysqli)); 
    
      if($result){ 
          echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-guru" </script>';
      }else{
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      }
}elseif($action == "delete")
{

      $ID = $_GET['id'];

              $result = mysqli_query($mysqli, "DELETE FROM tb_guru WHERE id_guru = '$ID'") or die(mysqli_error($mysqli));
  
      
     if($result){ 
        echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-guru" </script>';
      }else{
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      }

}
?>