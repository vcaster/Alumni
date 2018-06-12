<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php
    function redirect($New_Location){
        
        header("Location:".$New_Location);
        exit();
    }
?>

