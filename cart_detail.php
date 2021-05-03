<?php 
// include('server.php') ;
  $PageTitle="Cart COD";
 include ('header.php') ?>

<form method="post" action="cart_detail.php">
    <div class="row ">
        <div class="row col-md-8 offset-2 cart-main">
            <div class='col-md-9'>
            Following Toys has been dispatched to your registered address.
            </div></div>
        <div class="row">
            <div class="row col-md-5 offset-3 cart-detail">
                <div class="col-md-6">
                    <label>Toy Name</label>
                </div>
                <div class="col-md-3">
                    <label>Price</label>
                </div>
                <div class="col-md-3">
                    <label>Dispatch Date</label>
                </div>
            <?php
                if(empty($_SESSION['codtoy_id']))
                {
                    header('Location: toys.php');
                    exit();
                }
                else
                $queryString = $_SESSION['codtoy_id']; 
                $toysquery = "SELECT * from tblordercod tor
                inner join tbltoys tt on tt.Toy_ID=tor.cod_toy_id
                where  tor.cod_order_by_id='".$_SESSION['username']."' order by 1 desc";
                // echo $toysquery;
                // print_r ($toysquery);exit();
                $toyresult = mysqli_query($db, $toysquery);
                if (mysqli_num_rows($toyresult)==0) { 
                    ?>
                    <p>Your Cart is empty! :)</p>
                    <?php
                }
                else
                    while ($rows = $toyresult->fetch_assoc())          
                  {
                    //   print_r($rows);exit();
                    //   echo "inside while";
                    ?>
        
                <div class="col-md-6">
                    <label><?php echo $rows['Toy_Name'];?></label>
                </div>
                <div class="col-md-3">
                    <label> <?php echo $rows['Toy_Price'];?> $</label>
                </div>
                <div class="col-md-3">
                <label> <?php echo date('Y/m/d', strtotime($rows['cod_order_date']));?> </label>
                </div><?php

//   }
}
?>
</div>
</div> 
<div class="col-md-6 offset-md-2"> 
<p><a href='index.php'>Click here to go to Home Page.</a> </p></div>
    </div>
</form>
<?php include ('footer.php') ?>