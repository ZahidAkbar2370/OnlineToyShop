<?php //include('server.php') ;
  $PageTitle="Home";
 include('header.php'); 

 ?>
<form method="post" action="index.php">
<div class="row ">

    <div class="home-head">
        <!-- <p class="margin-20">Welcome to KidZone Online Toy Shop</p> -->
        <img src="img/bn1.jpg" alt="Toy ">
      <!-- <img src="img/bn1" alt="" width="1000px" height="455px"> -->
    </div>
         <div class="div-inner-container col-md-12">
            <div class="col-md-10 offset-md-1 text-center anch">
                  <h2 class="age-group">
                    Age Group
                  </h2>
            <?php
              //to populate Age Group Dropdown
                $agegroupquery = "SELECT * FROM tblagegroups order by 1 asc";
                $agresult = mysqli_query($db, $agegroupquery);
                  while( $row = mysqli_fetch_assoc( $agresult ) )
                  {
                  ?>
                  
                  <!-- <input class='form-check-inline' type="checkbox" name="Age Group" value="<?php echo $row['AG_ID'];?>"/> -->
                  <a class='anch-age' href='toys.php?Toy_Age=<?php echo $row['AG_ID'];?>'><?php echo $row['AG_Dscr'];?> </a>
                  
                   <?php
                }
                ?>
               
            </div>
          <div class="col-md-10 offset-md-1 text-center anch">
                <h2 class='categories'>
                    CATEGORIES
                </h2>
          <?php
              //to populate Age Group Dropdown
                $agegroupquery = "SELECT * FROM tblcategories order by 1 asc";
                $agresult = mysqli_query($db, $agegroupquery);
                  while( $row = mysqli_fetch_assoc( $agresult ) )
                  {
                    ?>
                  <!-- <input class='form-check-inline' type="checkbox" name="Age Group" value="<?php echo $row['cat_ID'];?>"/> -->
                  <!-- <?php echo $row['cat_dscr'];?>  -->
                  <a class='anch-cat' href='toys.php?Toy_Cat=<?php echo $row['cat_ID'];?>'><?php echo $row['cat_dscr'];?> </a>
                  <?php
                }
                ?>
          </div>   
       </div>
    </div>
</form>
<? php include ('footer.php') ?>