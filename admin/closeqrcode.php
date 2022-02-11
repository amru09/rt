<?php 
    
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';

    $_SESSION['val'] = NULL;

    echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php" </script>';
?>