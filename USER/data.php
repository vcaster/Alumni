<?php
    if(isset($_POST['getData'])){
        $database = "alumni_cms";
        $conn= mysqli_connect('localhost', 'root', '',$database);
       
        $start = $conn->real_escape_string($_POST['start']);
        $limit = $conn->real_escape_string($_POST['limit']);
        
        
        $sql5=$conn->query("SELECT * FROM admin_panel ORDER BY id desc LIMIT $start,$limit");
        
        if ($sql5->num_rows > 0){
            
            $response = '';
            while($DataRows = $sql5->fetch_array()){
                
                if(strlen($DataRows["post"])>150){$DataRows["post"]=substr($DataRows["post"],0,150).'...';}
                
                $response .= '
                       <div class="well">
                       
                       <img class="img-responsive img-rounded" src="Uploaded/'.$DataRows["image"].'" >
                       <div class="caption">
                        <br>
			<h1 id="heading">'.$DataRows["title"].'</h1>
                        
                        <p class="description">Category:'.$DataRows["category"].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Posted on:
                        '.$DataRows["datetime"].'</p>
                        <p style="padding: 3px; width: 100%; word-break: break-all; word-wrap: break-word;" >'.$DataRows["post"].'</p>
                        </div>
                       
                        <a href="fullpost.php?id='.$DataRows["id"].'"><span class="btn btn-info bb">
                                Read More &rsaquo;&rsaquo;
                        </span></a>
                   </div>


                      ';
        }
            exit($response);
        }else{
            exit('reachedMax'); 
        }
               
    }
        
        
?>