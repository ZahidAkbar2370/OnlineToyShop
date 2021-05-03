<?php include('server.php') ;

    // session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header width-100 margin-0">
        <h1>KidZone Online Toy Shop </h1>
    </div>
  <div class="header width-33">
  	<h2>Log In</h2>
  </div>
	
  <form method="post" class='form' action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>User Name</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>


  	<div class="input-group">
  	  <button type="submit" class="btn" name="login_user">Log In</button>
  	</div>
  	<p>
  		Not a member? Please <a href="Register.php">Register</a>
  	</p>
  </form>
</body>
</html>