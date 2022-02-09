<?php 
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';
 
	$action  = $_GET['action'];

	/* DATA SISWA */
	if($action == "insert")
	{	
		$id_siswa = $_POST['id_siswa'];
		$nama = $_POST['nama'];
		$jkel = $_POST['jkel'];
		$kelas = $_POST['kelas'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tgl_lahir = $_POST['tgl_lahir'];

			$result = mysqli_query($mysqli, "INSERT INTO tb_siswa SET
										   id_siswa = '$id_siswa',
										   nama = '$nama',
										   jkel = '$jkel',
										   kelas = '$kelas',
										   tempat_lahir = '$tempat_lahir',
										   tgl_lahir = '$tgl_lahir'") or die (mysqli_error($mysqli)); 
		
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-siswa" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($action == "update")
	{

		$ID = $_POST['id_siswa'];
		$nama = $_POST['nama'];
		$jkel = $_POST['jkel'];
		$kelas = $_POST['kelas'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tgl_lahir = $_POST['tgl_lahir'];

			$result = mysqli_query($mysqli, "UPDATE tb_siswa SET
										   nama = '$nama',
										   jkel = '$jkel',
										   kelas = '$kelas',
										   tempat_lahir = '$tempat_lahir',
										   tgl_lahir = '$tgl_lahir'
										   WHERE id_siswa = $ID") or die (mysqli_error($mysqli)); 
		
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-siswa" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }
	}elseif($action == "delete")
	{

		  $ID = $_GET['id'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_siswa WHERE id_siswa = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
			echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-siswa" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}
?>