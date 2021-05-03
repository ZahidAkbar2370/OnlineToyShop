<?php
	$id=$_GET['id'];
	include('../server.php');
    $query = "delete from tbltoys where Toy_ID=".$id;
	mysqli_query($db,$query);
    // print_r($query);exit();
	header('location:addToys.php');
?>