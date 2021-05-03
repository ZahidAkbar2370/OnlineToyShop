<?php
	$id=$_GET['id'];
	include('../server.php');
    $query = "delete from tblagegroups where AG_ID=".$id;
	mysqli_query($db,$query);
    // print_r($query);exit();
	header('location:addAgeGrp.php');
?>