<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="row col-md-12">
	<div class="header width-100 margin-0">
        <h1>KidZone Online Toy Shop </h1>
    </div>
	<div class="col-md-6 offset-md-3">
	<div class="header width-33">
  	<h2>Register</h2>
  </div>
	
  <form method="post" class='form' action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>User Name</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
      
  	<div class="input-group">
  	  <label>User Address</label>
  	  <input type="text" name="useraddress" value="<?php echo $useraddress; ?>">
  	</div>
      
  	<div class="input-group">
  	  <label>User Contact No.</label>
  	  <input type="text" name="usernumber" value="<?php echo $usernumber; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
      <div class="">
      <p>Select Role :</p>
        <input type="radio" id="User" name="Role" value="User" checked>
        <label for="User">User</label><br>
        <input type="radio" id="Admin" name="Role" value="Admin">
        <label for="Admin">Admin</label>
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Log in</a>
  	</p>
  </form>
	</div>
	</div>
</body>
</html>