 <?php
    
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';
 
	$action  = $_GET['action'];

	/* DATA MAPEL */
	if($action == "insert")
	{	
		$kode = $_POST['kode'];
		$nama_mapel = $_POST['nama_mapel'];

			$result = mysqli_query($mysqli, "INSERT INTO tb_mapel SET
										   id_mapel = '$kode',
										   nama_mapel = '$nama_mapel'") or die (mysqli_error($mysqli)); 
		
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-mapel" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($action == "update")
	{

		$ID = $_POST['kode'];
		$nama_mapel = $_POST['nama_mapel'];

			$result = mysqli_query($mysqli, "UPDATE tb_mapel SET
										   nama_mapel = '$nama_mapel' WHERE id_mapel=$ID ") or die (mysqli_error($mysqli)); 
		
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-mapel" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }
	}elseif($action == "delete")
	{

		  $ID = $_GET['id'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_mapel WHERE id_mapel = $ID") or die(mysqli_error($mysqli));
      
		  
		 if($result){ 
			echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-mapel" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

?>