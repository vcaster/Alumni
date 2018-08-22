<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login(); $userid = $_SESSION['User_id']; ?>
<?php Confirm_User(); $user = $_SESSION['User_Username']; ?>
<?php
//    if(isset($_POST['SubmitReg'])){
        $database = "alumni_cms";
        $conn= mysqli_connect('localhost', 'root', '',$database);
        $address = $_POST['address'];
                
        date_default_timezone_set("Africa/Lagos");
            $CurrentTime=time();
            //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
            $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
            $DateTime;
            $Admin=$_SESSION['User_Username'];
            $matric= $_SESSION['matric'];
            global $conn;
            $sql="INSERT INTO transcriptsreq(datetime,address,status,type,addedby,matric,category)
            VALUES('$DateTime','$address','PAYED','INTERNATIONAL','$user','$matric','1')";
            $Execute = mysqli_query($conn,$sql);
        
        if($Execute){
            $result = "Transcript Sent to database, Wait for a reply from us, Thank you";
        }
        else{
            $result = "Error processing transcripts";
        }
        echo $result;
//    }
        
        
?>