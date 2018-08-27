

<div class="sidebar-menu">
<!--        <br>-->
<img id="logo" style="padding-left: 10px; padding-top: 5px;" class="img-responsive" src="images/logo.png" alt="Logo" height="80" width="80" > 
            <div class="logo"> 
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
                <a href="#"> <span id="logo" ></span> 
                
                  <!--<img id="logo" src="" alt="Logo"/>-->     
              </a> </div>		  
        <div class="menu">
          <ul id="menu" >
            <li id="menu-home" ><a href="admindashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li><a href="categories.php"><i class="fa fa-tags"></i><span>Categories</span></a></li>
            <li><a href="addnewpost.php"><i class="fa fa-edit"></i><span>Add New Post</span></a></li>
            <li><a href="transcriptreq.php"><i class="fa fa-file-text-o"></i><span>Transcripts</span></a></li>
            <li><a href="comments.php"><i class="fa fa-comments-o">
                
                        <?php
                        $conn;
                        $sql="SELECT COUNT(*) FROM comments WHERE status='OFF'";
                        $Execute=mysqli_query($conn,$sql);
                        $Rows=mysqli_fetch_array($Execute,MYSQLI_ASSOC);
                        $Total=array_shift($Rows);
                        if($Total>0){
                        ?>
                        <span style="background-color:#FC8213;" class="badge pull-right badge-warning">      
                        <?php echo $Total;?>
                        </span>

                <?php } ?>
                        
                    </i><span>Comments</span></a></li>
                    <li><a href="admins.php"><i class="fa fa-users"></i><span>Manage Admin's</span></a></li>
                    <li><a href="managealumni.php"><i class="fa fa-user-plus"></i><span>Manage Alumni</span></a></li>
             <li><a href="galleryadmin.php"><i class="fa fa-photo"></i><span>Gallery</span></a></li>
             <li><a href="calendaradmin.php"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
             
<!--            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Pages</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-academico-sub" >
                     <li id="menu-academico-boletim" ><a href="login.html">Login</a></li>
                <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>		           
              </ul>
            </li>-->
          </ul>
        </div>
	 </div>
                

