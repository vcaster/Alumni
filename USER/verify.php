<?php 

//$value = $_POST["sugesstion"];
//echo $value;

     $database = "alumni_cms";
     $Email = null;
                $conn= mysqli_connect('localhost', 'root', '',$database);
                
        if(isset($_POST["userid"])){
        $userid = $_POST['userid'];
        $payclick = true;    
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    	global $conn;
	$sql="SELECT * FROM dues WHERE user_id='$userid'";
        $Execute = mysqli_query($conn,$sql); 
        
        while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
            
            $status = $DataRows['status'];
        }
        
	
	if($status != 'PAYED'){
            
//            $_SESSION["ErrorMessage"]="Pay Dues first";
//	redirect("dues.php");
            echo '1';
	
	}
        else if ($status == 'PAYED'){
            echo '0';
        }
        
        
}
    
?>