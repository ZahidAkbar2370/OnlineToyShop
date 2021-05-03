<?php 
// include_once('server.php') ;
  $PageTitle="Toys";
 include_once ('header.php') ?>

<form method="post" action="toys.php">
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
              //to populate Toys
                // echo $_SERVER['QUERY_STRING'];
                $queryString = $_SERVER['QUERY_STRING'];
                // print_r($queryString);exit();
                if(empty($queryString))
                {
                    // echo 'Inside';
                    $toysquery = "SELECT * FROM tbltoys" ;

                }
                else
                $toysquery = "SELECT * FROM tbltoys where ".$queryString;
                // echo $toysquery;
                $toyresult = mysqli_query($db, $toysquery);
                // $rows = mysqli_fetch_assoc($toyresult);

                // print_r( $row );exit();
                // print_r( $toyresult );exit();
                // if ($rows)
                // { // if toy exists
                    
                    while ($rows = $toyresult->fetch_assoc())                      
                // while( $rows = mysqli_fetch_assoc( $toyresult ) )
                  {
                    //   echo "inside while";
                    ?>
                    
                <div class="col-md-4 each-toy">
                    <img src="toys/<?php echo $rows['Toy_Photo'];?>" alt="Truck"><br />
                    <label class="each-toy-p"><?php echo $rows['Toy_Name'];?></label>
                    <div class="row col-md-12">
                        <div class="col-md-6">Price : <?php echo $rows['Toy_Price'];?> $</div>
                        <div class="col-md-6"><a href="toy_details.php?toy_id=<?php echo $rows['Toy_ID'];?>">Details</a></div>
                    </div>
                </div>
                  <?php

                //   }
                }
                ?>
                <!-- <div class="col-md-4 each-toy">
                    <img src="toys/truck.jpg" alt="Truck">
                    <label class="each-toy-p">Monster Truck</label>
                    <div class="row col-md-12">
                        <div class="col-md-6">Price : 5.78$</div>
                        <div class="col-md-6">Add to Cart</div>
                    </div>
                </div>
                </div>
                
            </div>
            <!-- <p class="margin-20">Welcome to KidZone Online Toy Shop</p> -->
            <!-- <img src="img/bn1.jpg" alt="Toy "> -->
        <!-- <img src="img/bn1" alt="" width="1000px" height="455px"> -->
        </div>
    </div>
</form>

<?php 
 include ('footer.php') ?>