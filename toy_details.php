<?php 
// include_once('server.php') ;
  $PageTitle="Toy Details";
 include_once ('header.php') ?>

<form method="post" action="toy_details.php">
    <div class="row ">
        <div class="home-head row col-md-12">
            <div class="col-md-2 anch pull-left">
            <h2 class="age-group-toy">
                    Age Group
                  </h2>
            <?php
              //to populate Age Group Dropdown
                $agegroupquery = "SELECT * FROM tblagegroups order by 1 asc";
                $agresult = mysqli_query($db, $agegroupquery);
                
                  while( $row = mysqli_fetch_assoc( $agresult ) )
                  {
                    //   echo $row;
                  ?>
                  
                  <!-- <input class='form-check-inline' type="checkbox" name="Age Group" value="<?php echo $row['AG_ID'];?>"/> -->
                  <a class='anch-age-toy' href='toys.php?Toy_Age=<?php echo $row['AG_ID'];?>'><?php echo $row['AG_Dscr'];?> </a>
                  
                   <?php
                }
                ?>
            
            <h2 class='categories-toy'>
                    CATEGORIES
                </h2>
          <?php
              //to populate Age Group list
                $agegroupquery = "SELECT * FROM tblcategories order by 1 asc";
                $agresult = mysqli_query($db, $agegroupquery);
                  while( $row = mysqli_fetch_assoc( $agresult ) )
                  {
                    ?>
                  <a class='anch-cat-toy' href='toys.php?Toy_Cat=<?php echo $row['cat_ID'];?>'><?php echo $row['cat_dscr'];?> </a>
                  <?php
                }
                ?>
        
        
            </div>
            <div class="col-md-9 margin-top-12 pull-left">
                <div class="row col-md-12">
                <?php
                $queryString = $_SERVER['QUERY_STRING'];
                if(empty($queryString))
                {
                    // header('location: toys.php');
                    // exit();
                    echo 'Nothing to show';
                }
                else
                {
                  $_SESSION['toyID'] = $queryString;  
                $toysquery = "SELECT * FROM tbltoys where ".$queryString;
                // echo $toysquery;
                $toyresult = mysqli_query($db, $toysquery);
                    
                    while ($rows = $toyresult->fetch_assoc())          
                  {
                    //   echo "inside while";
                    ?>
                    
                <div class="col-md-8 offset-md-2 each-toy">
                    <img src="toys/<?php echo $rows['Toy_Photo'];?>" alt="Truck"><br />
                    <label class="each-toy-p"><?php echo $rows['Toy_Name'];$_SESSION['toy_id']=$rows['Toy_ID'];$_SESSION['codtoy_id']=$rows['Toy_ID'];?></label>
                    <div class="row col-md-12">
                        <div class="col-md-6">Price : <?php echo $rows['Toy_Price'];?> $</div>
                        <div class="col-md-6">Available : <?php echo $rows['Stock'];?> Items</div>
                    </div>                    
  	                <button type="submit" class="btn btn-primary" <?php if ($rows['Stock'] <= '0'){ ?> disabled <?php   } ?> name="buy_toy">Add to basket </button>
  	                <button type="submit" class="btn btn-primary" <?php if ($rows['Stock'] <= '0'){ ?> disabled <?php   } ?> name="buy_toy_cod">Buy Now </button>
                    <div class="col-md-12">
                    <label class=""><?php echo $rows['Toy_Dscr'];?></label>
                    </div>
                </div>
                  <?php

                //   }
                }
                    
            }
                ?>
                
                </div>
                        <!-- Rating starts from here  -->
        <div class="row container">
                  <?php 
                    if(empty($queryString))
                    {
                        // header('location: toys.php');
                        // exit();
                        echo '';
                    }
                    else{
                  ?>
                <div class="col-md-8 offset-md-2 margin-top-12">
                    <h3><b>Add Feedback</b></h3>
                </div>
                <!-- <input type="hidden" name="demo_id" id="demo_id" value="1"> -->
                <div class="col-md-8 offset-md-2">
                <!-- <input type="text" class="form-control" name="email" id="email" placeholder="Email Id"><br> -->
                <textarea class="form-control" rows="5" placeholder="Write your review here..." name="remark" id="remark" ></textarea>
                <p><button  class="btn btn-default btn-sm btn-info" id="srr_rating" name="srr_rating">Submit</button></p>
                </div>
                <?php }
                
                  
                ?>
                <div class="col-md-8 offset-md-2 margin-top-12">
                    <h3><b>Latest Feedbacks</b></h3>
                    <?php 
                    if(empty($queryString))
                    {
                        // header('location: toys.php');
                        // exit();
                        echo 'Nothing to show';
                    }
                    else{
                      $toysquery = "SELECT distinct fb_user_id,fb_dscr FROM tbl_feedback where ".$queryString ." order by fb_id desc";
                      // echo $toysquery;
                      $toyresult = mysqli_query($db, $toysquery);
                          
                          while ($rows = $toyresult->fetch_assoc())          
                        {
                          ?>
                            <div class="col-md-12 feedback-com ">
                            <b class="text-uppercase"><?php echo $rows['fb_user_id'];?> says: </b>
                            <?php echo $rows['fb_dscr'];?>
                            </div>
                          <?php 
                        }
                    }
                        
                    ?>
                </div>
        </div>

    </div>
</form>
<?php 
 include_once ('footer.php') ?>