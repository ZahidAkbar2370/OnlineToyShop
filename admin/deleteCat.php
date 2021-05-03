<?php
	$id=$_GET['id'];
	include('../server.php');
    $query = "delete from tblcategories where cat_id=".$id;
	mysqli_query($db,$query);
    // print_r($query);exit();
	header('location:addCat.php');
?>