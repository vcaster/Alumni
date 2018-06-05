<?php

$database = "crud";
                $conn= mysqli_connect('localhost', 'root', '',$database);
                //if(isset($_POST['sugesstion'])){
                    
                    //$Data = $_POST['sugesstion'];
        $sql="SELECT email FROM alumni_records WHERE email='ainaniran@yahoo.com'";

        $Execute = mysqli_query($conn,$sql);
        
        while($DataRows = mysqli_fetch_array($Execute,MYSQLI_ASSOC)){ 
            
	$Email = $DataRows['email'];
        
        //echo $Email; 
}
print_r($Email);

//}
?>
<?php
    $conn = new mysqli($host, $username, $password, $dbname);
$pname  = $_POST['pname'];

$sname  = $_POST['sname'];

$email  = $_POST['email'];
$sql    = "insert into tablename (pname, sname, email) values (?, ?, ?)  ";

$stmt   = $conn->prepare($sql);

$stmt->bind_param('sss', $pname, $sname, $email);

  if($stmt->execute()){

     $result = 1;

  }

}

echo $result;

$conn->close();
?>

