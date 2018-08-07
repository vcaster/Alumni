

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
            <li id="menu-home" ><a href="blogger.php"><i class="fa fa-newspaper-o"></i><span>Updates</span></a></li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Categories</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-academico-sub" >
                  <?php 
                    $sql5="SELECT * FROM category ORDER BY id desc";
                    $Execute = mysqli_query($conn,$sql5);
                    while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        $nameId=$DataRows["name"];
			 
                  ?>
                  
                     <li id="menu-academico-boletim" ><a href="<?php echo $nameId ?>.php"><?php echo $nameId ?></a></li>
                    <?php } ?>	           
              </ul>
            </li>
            
             <li><a href="gallery.php"><i class="fa fa-photo"></i><span>Gallery</span></a></li>
             <li><a href="calendar.php"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
             <li><a href="dues.php"><i class="fa fa-money"></i><span>Pay Dues</span></a></li>
             <li><a href="transcript.php"><i class="fa fa-file-text-o"></i><span>Transcript</span></a></li>
             
            
          </ul>
        </div>
	 </div>
                

