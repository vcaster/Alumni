<?php 

//$value = $_POST["sugesstion"];
//echo $value;

     $database = "alumni_cms";
     $Email = null;
                $conn= mysqli_connect('localhost', 'root', '',$database);
                if(isset($_POST['sugesstion'])){
                    
                    $Data = $_POST['sugesstion'];
        $sql="SELECT email FROM info WHERE email='$Data'";

        $Execute = mysqli_query($conn,$sql);
        
        while($DataRows = mysqli_fetch_array($Execute,MYSQLI_ASSOC)){ 
            
	$Email = $DataRows['email'];
        
        //echo $Email; 
}

    if ($Data == $Email)
        {
            
            echo  "already in use";
        }
        
    else{
           echo 'available';
        }
                
        }
    
?>