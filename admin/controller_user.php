<?php 
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';
    
        $ID = $_POST['username'];
        $password = $_POST['password'];

        if (isset($password) || $password == '') {
            $pass = MD5($password);
            $result = mysqli_query($mysqli, "UPDATE tb_users SET password = '$pass' WHERE username = $ID"); 
        }

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=kelola-akun" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }
?>