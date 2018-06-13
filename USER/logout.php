<?php include('Sessions.php'); ?>
<?php include('Functions.php'); ?>
<?php

    $_SESSION['User_id'] = null;
    
    session_destroy();
    
    redirect('../index.php');
?>
