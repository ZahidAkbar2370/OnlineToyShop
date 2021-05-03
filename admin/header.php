<?php include('../server.php') ;
include('../sessions.php');

if(!isset($_SESSION['role'])){
    header("location: ../index.php");
}
//   if (!isset($_SESSION['username'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	// header('location: login.php');
//      header('Location: '.$_SERVER['PHP_SELF']);
//   }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
      header('Location: ../index.php');
    //  header('Location: '.$_SERVER['PHP_SELF']);
    //     die;
    // header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
  	// header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php isset($PageTitle) ? $PageTitle : "Toys"?></title>
  <link rel="stylesheet" type="text/css" href="../bootstrap5\css\bootstrap.min.css">
  <script src="../bootstrap5\js\bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style.css">
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
        </div>  
         
        <div class="col-md-4 pull-right anch l-h-3">          
            <?php  if (isset($_SESSION['username'])) : ?>
                <p>Welcome <strong class="text-uppercase"><?php echo $_SESSION['username']; ?></strong>
                <a href="../index.php?logout='1'" style="color: red;">LOG OUT</a>
                </p>
            <?php endif ?>
            <?php  if (!isset($_SESSION['username'])) : ?>
            <a class="anch-l-r" href="login.php" >Login</a>
            <?php endif ?>
        </div>
    </div>
</div>
<div class="row col-md-8 offset-2 admin-li">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <li class="nav-item active">        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>      </li> -->
      <li class="nav-item">        <a class="nav-link" href="addToys.php">Add Toys</a>      </li>
      <li class="nav-item">        <a class="nav-link" href="addCat.php">Add Category</a>      </li>
      <li class="nav-item">        <a class="nav-link" href="addAgeGrp.php">Add Age Group</a>      </li>
      <!-- <li class="nav-item">        <a class="nav-link disabled" href="#">Disabled</a>      </li> -->
    </ul>
  </div>
</nav>
</div>