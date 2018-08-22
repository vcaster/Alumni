<?php 

//$value = $_POST["sugesstion"];
//echo $value;

     $database = "alumni_cms";
     
                $conn= mysqli_connect('localhost', 'root', '',$database);
                                    
                    $m = $_POST['m'];
                    $d = $_POST['d'];
                    $firstname = $_POST['firstname'];
                    $surname = $_POST['surname'];
                    
        date_default_timezone_set("Africa/Lagos");
        $CurrentTime=time();
        //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
        $DateTime=strftime("%Y-%m-%D %H:%M:%S",$CurrentTime);
         
        $Title = "{$surname} {$firstname}\'s birthday.";        
        
        
        $yeary = 2018;
        
        for($i=1; $i <= 9; $i++)
        { 
            $eventd = $yeary.'-'.$m.'-'.$d;
            $yeary++;
            
	$sqlbb="INSERT INTO events(title,date,created,modified,status) VALUES('$Title','$eventd','$DateTime','$DateTime','1')";
	$Executebb = mysqli_query($conn,$sqlbb);
        }

    if ($Executebb)
        {
            
            echo  "";
        }
        
    else{
           echo 'failed';
        }
                
            
?>