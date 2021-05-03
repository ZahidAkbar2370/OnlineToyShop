<?php
expireOrder();
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//Register User

// initializing variables
$username = "";
$email    = "";
$usernumber = "";
$useraddress = "";
$role = "";

// Server side variables

$catname = "";
$catAddnameScs = "";
$catupnameScs ="";
$agegrpAddnameScs ="";
$agegrpupnameScs = "";
$toynameScs = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'toyshop');
////to check database connectivity
// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
//  }
//    echo "Connected successfully";
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $useraddress = mysqli_real_escape_string($db, $_POST['useraddress']);
  $usernumber = mysqli_real_escape_string($db, $_POST['usernumber']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $role = mysqli_real_escape_string($db, $_POST['Role']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "User name is required"); }
  if (empty($useraddress)) { array_push($errors, "User address is required"); }
  if (empty($usernumber)) { array_push($errors, "User number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    //Password Hashing
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,useraddress,usernumber,role) VALUES('$username', '$email', '$password','$useraddress','$usernumber','$role')";
      mysqli_query($db, $query);
    //// to check what query is being passed
    //   array_push($errors, $query);
  	 header('location: login.php');
  }
  
  // echo 'before ' .$agresult. ' after'; 

  // echo $result;
}

//... End Register User

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	// $queryLogIn = "SELECT * FROM users WHERE username='waqas' AND password='81dc9bdb52d04dc20036dbd8313ed055'";
  	$queryLogIn = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    
  	$results = mysqli_query($db, $queryLogIn);
    //echo "before results";
  	if (mysqli_num_rows($results) == 1) {
      // echo "inside results";
      session_start(); 
  	  $_SESSION['username'] = $username;
  	  // $_SESSION['success'] = "You are now logged in";
      // echo $_SESSION['username'] ;
      while ($rows = $results->fetch_assoc())          
                        {
                            if ($rows['role']==='User')
                              {
                                header('location: index.php');
                              }
                              else if ($rows['role']==='Admin')
                              {
                                $_SESSION['role'] = 'Admin';
                                header('location: admin/admin.php');
                              }
                        }
      
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


//Reserve Toy to log In

if (isset($_POST['buy_toy'])) {
  if (!isset($_SESSION['username'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
    //  header('Location: '.$_SERVER['PHP_SELF']);
  }
  else{  
      $expiryDate = date('Y-m-d h:i:sa', strtotime('+3 days'));
      $orderDate = date('Y-m-d h:i:sa');
      $orderBy = $_SESSION['username'];
      $orderToy = $_SESSION['toy_id'];
      $checkCount = checkCount($orderBy);
      // print_r($checkCount);exit();
      if ($checkCount<3)
      {
        $carttoyquery = "INSERT INTO tblorder (order_toy_id, order_status, order_date,order_by_id,order_expiry_date) VALUES( '$orderToy', 'Active','$orderDate','$orderBy', '$expiryDate')";
       //  print_r($carttoyquery);exit();
         mysqli_query($db, $carttoyquery);
         header('location: cart.php');
      }
      else{
        // echo "you cannot furhter order Or C ".$checkCount;
         header('location: cart_full.php');
      }
  }
}


//Buy Toy to log In

if (isset($_POST['buy_toy_cod'])) {
  if (!isset($_SESSION['username'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
    //  header('Location: '.$_SERVER['PHP_SELF']);
  }
  else{  
      $orderDate = date('Y-m-d h:i:sa');
      $orderBy = $_SESSION['username'];
      $orderToy = $_SESSION['toy_id'];
      // print_r($checkCount);exit();
        $carttoyquery = "INSERT INTO tblordercod (cod_toy_id, cod_order_date,cod_order_by_id) VALUES( '$orderToy', '$orderDate','$orderBy')";
        // print_r($carttoyquery);exit();
         mysqli_query($db, $carttoyquery);
         excludeToy();
  }
}

// To minimize one toy from stock
function excludeToy()
{
  $db = mysqli_connect('localhost', 'root', '', 'toyshop');
  $id = $_SESSION['toy_id'];
   $query = "update tbltoys set Stock=Stock-1 where Toy_ID=".$id;
    // print_r($query);exit();
    mysqli_query($db, $query);
    header('location: ship.php');
}

//To check Orders of the same customer

  function checkCount($orderby) {
    $countquery = "SELECT count(*) as total FROM tblorder WHERE order_by_id = '$orderby' and order_status='active'";
    $db = mysqli_connect('localhost', 'root', '', 'toyshop');
                  $countresult = mysqli_query($db, $countquery);
                  
                    while( $row = mysqli_fetch_assoc( $countresult ) )
                    {
                      // print_r($row['total']);exit();
                      return ($row['total']);
                      
                    }
  }

// To expire toy after three days.

function expireOrder()
{

  $expquery = "SELECT DATEDIFF(CURRENT_DATE(),order_expiry_date)as diff,order_id FROM tblorder";
  // print_r($CURRENT_DATE);
  // print_r($expquery);exit();
    $db = mysqli_connect('localhost', 'root', '', 'toyshop');
                  $countresult = mysqli_query($db, $expquery);
                  
                    while( $row = mysqli_fetch_assoc( $countresult ) )
                    {
                      //  print_r($row['diff']);print_r($row['order_id']); exit();
                       $diff = $row['diff'];
                       if ($diff>0)
                       {
                        $exquery = "update tblorder set order_status='InActive' where order_id=".$row['order_id'];
                        // print_r($exquery);exit();
                        mysqli_query($db, $exquery);
                       }
                      
                    }
}

//Add feedback Against each toy
if (isset($_POST['srr_rating'])){
  if (!isset($_SESSION['username'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  else{  

    $remarks = mysqli_real_escape_string($db, $_POST['remark']);
    if (empty($remarks)) { array_push($errors, "Remarks required");exit(); }
    $fbToy = $_SESSION['toy_id'];
    $fbBy = $_SESSION['username'];
     $feedbackquery = "INSERT INTO tbl_feedback (toy_id,fb_dscr,fb_user_id) VALUES( '$fbToy','$remarks','$fbBy')";
      // print_r($feedbackquery);exit();
      mysqli_query($db, $feedbackquery);
       header('location: success_fb.php');
  }
}

//Add Toy Category from admin side 

if (isset($_POST['add_cat'])){
  // echo "MAzy mazy";
  $catname = mysqli_real_escape_string($db, $_POST['catname']);
   $feedbackquery = "INSERT INTO tblcategories (cat_dscr) VALUES( '$catname')";
    // print_r($feedbackquery);exit();
    mysqli_query($db, $feedbackquery);
    //  header('location: addCat.php');
     $catAddnameScs = "Category Added Succesfully !";
}

//Update Category from Admin Side

if (isset($_POST['up_cat'])){
	$id=$_GET['id'];
  $categoryname = mysqli_real_escape_string($db, $_POST['categoryname']);
   $catquery = "update tblcategories set cat_dscr='$categoryname' where cat_id=".$id;
    // print_r($catquery);exit();
    mysqli_query($db, $catquery);
    //  header('location: addCat.php');
     $catupnameScs = "Category Updated Succesfully !";
}

//Add Toy Age Group from admin side 

if (isset($_POST['add_agegrp'])){
  $agegrpname = mysqli_real_escape_string($db, $_POST['agegrpname']);
   $agegrpquery = "INSERT INTO tblagegroups (AG_Dscr) VALUES( '$agegrpname')";
    // print_r($feedbackquery);exit();
    mysqli_query($db, $agegrpquery);
    //  header('location: addCat.php');
     $agegrpAddnameScs = "Age Group Added Succesfully !";
}

//Update Age Group from Admin Side

if (isset($_POST['up_agegrp'])){
	$id=$_GET['id'];
  $agegrpname = mysqli_real_escape_string($db, $_POST['agegrpname']);
   $catquery = "update tblagegroups set AG_Dscr='$agegrpname' where AG_ID=".$id;
    // print_r($catquery);exit();
    mysqli_query($db, $catquery);
    //  header('location: addCat.php');
     $agegrpupnameScs = "Age Group Updated Succesfully !";
}

//Add Toy from admin side 

if (isset($_POST['add_toy'])){
  $toyname = mysqli_real_escape_string($db, $_POST['toyname']);
  $toydiscription = mysqli_real_escape_string($db, $_POST['toydiscription']);
  $toyprice = mysqli_real_escape_string($db, $_POST['toyprice']);
  $quantitiy = mysqli_real_escape_string($db, $_POST['quantitiy']);
  if(!empty($_POST['AgeGroup'])) {
    $AgeGroup = $_POST['AgeGroup'];
    // echo 'You have chosen: ' . $selected;
  } 
  if(!empty($_POST['category'])) {
    $category = $_POST['category'];
    // echo 'You have chosen: ' . $selected;
  } 
  // $target_dir = "toys/";
  $path = dirname(getcwd()).'\toys\\';
  $ImageName = $_FILES['photo']['name'];
  $fileElementName = 'photo';
  $location = $path . $ImageName; 
  move_uploaded_file($_FILES['photo']['tmp_name'], $location); 
  // print_r($location);exit();
   $addtoy = "INSERT INTO tbltoys (Toy_Name,Toy_Dscr,Toy_Price,Stock,Toy_Cat,Toy_Age,Toy_Photo) VALUES( '$toyname','$toydiscription','$toyprice','$quantitiy','$category','$AgeGroup','$ImageName')";
    // print_r($addtoy);exit();
    mysqli_query($db, $addtoy);
    //  header('location: addCat.php');
     $toynameScs = "Toy Added Succesfully !";
}

?>