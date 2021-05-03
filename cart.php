<?php 
// include('server.php') ;
  $PageTitle="Cart";
 include ('header.php') ?>

<form method="post" action="cart.php">
    <div class="row ">
        <div class="row col-md-8 offset-2 cart-main">
            <div class='col-md-9'>
            <?php
                if(empty($_SESSION['toy_id']))
                {
                    header('Location: toys.php');
                    exit();
                }
                else
                $queryString = $_SESSION['toy_id']; 
                $toysquery = "SELECT * from tblorder tor
                inner join tbltoys tt on tt.Toy_ID=tor.order_toy_id
                where tt.Toy_ID =".$queryString. " and tor.order_by_id='".$_SESSION['username']."' order by 1 desc limit 1";
                // echo $toysquery;
                // print_r ($toysquery);exit();
                $toyresult = mysqli_query($db, $toysquery);
                    
                    while ($rows = $toyresult->fetch_assoc())          
                  {
                    //   echo "inside while";
                    ?>
            <?php echo $rows['Toy_Name'];?> has been added to your basket.
            </div>
            <div class='col-md-3 '>
                <a class="cart-cont-shop" href="index.php">Continue Shopping</a>
            </div>
        </div>
        <div class="row">
            <div class="row col-md-5 offset-3 cart-detail">
                <div class="col-md-6">
                    <label>Toy Name</label>
                </div>
                <div class="col-md-3">
                    <label>Price</label>
                </div>
                <!-- <div class="col-md-3">
                    <label>Total</label>
                </div> -->
                <div class="col-md-6">
                    <label><?php echo $rows['Toy_Name'];?></label>
                </div>
                <div class="col-md-3">
                    <label> <?php echo $rows['Toy_Price'];?> $</label>
                </div>
                <!-- <div class="col-md-3">
                    <label> 4 $</label>
                </div> -->
            </div>
        </div> <?php

//   }
}
?>
    </div>
</form>
<?php include ('footer.php') ?>