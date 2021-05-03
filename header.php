<?php include('server.php') ;
include('sessions.php');
//   session_start(); 

//   if (!isset($_SESSION['username'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	// header('location: login.php');
//      header('Location: '.$_SERVER['PHP_SELF']);
//   }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
      header('Location: index.php');
     header('Location: '.$_SERVER['PHP_SELF']);
    //     die;
    // header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
  	// header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php isset($PageTitle) ? $PageTitle : "Toys"?></title>
  <link rel="stylesheet" type="text/css" href="bootstrap5\css\bootstrap.min.css">
  <script src="bootstrap5\js\bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- <link rel="stylesheet" type="text/css" href="star-rating.min"> -->
  
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>
<div class="header row col-md-12 margin-0">
        <!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
      <!-- end notification here -->
        <div class="col-md-8 pull-left">
        <h1>KidZone Online Toy Shop</h1>
            <!-- <div class=''>
                <p>Name : Huma Tariq VU ID : MC190402188</p></di> -->  
        </div>  
         
        <div class="col-md-4 pull-right anch l-h-3">          
            <!-- <a class="anch-l-r" href="login.php">Login</a>      -->
            <?php  if (isset($_SESSION['username'])) : ?>
                <p><a href='cart_detail.php' style="color:white">My Cart </a> || 
                Welcome <strong class="text-uppercase"><?php echo $_SESSION['username']; ?></strong>
                <a href="index.php?logout='1'" style="color: red;">LOG OUT</a>
                </p>
            <?php endif ?>
            <?php  if (!isset($_SESSION['username'])) : ?>
            <a class="anch-l-r" href="login.php" >Login</a>
            <?php endif ?>
        </div>
    </div>
</div>