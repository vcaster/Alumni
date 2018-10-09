<div class="typo-wells">
         
			  <h3 class="">Categories</h3>
				   <?php 
                    $sql5="SELECT * FROM category ORDER BY id desc";
                    $Execute = mysqli_query($conn,$sql5);
                    while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        $nameId=$DataRows["name"];
			 
                  ?>
                  
                     <li><a href="<?php echo $nameId ?>.php"><?php echo $nameId ?></a></li>
                    <?php } ?>	       
</div>
