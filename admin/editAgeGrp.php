
<?php
	include ('header.php');
	$id=$_GET['id'];
	$query=mysqli_query($db,"select * from tblagegroups where AG_ID='$id'");
	$row=mysqli_fetch_array($query);
?>
<div class="row col-md-12 margin-top-12">
	<form method="POST" class="form" action="editAgeGrp.php?id=<?php echo $row['AG_ID']; ?>">
	<h3>Update Age Group</h3>
  	<div class="input-group">
		<label>Age Group Name:</label><input type="text" value="<?php echo $row['AG_Dscr']; ?>" name="agegrpname" required>
    </div>
    
  	<div class="input-group">
  	  <button type="submit" class="btn" name="up_agegrp">Update</button>
  	</div>
      <div class="input-group">
		<a class="text-right" href="addAgeGrp.php">Back</a>
      </div>
      
      <div class="input-group">
          <label><?php echo $agegrpupnameScs;?></label>
  	</div>
	</form>
</div>
    <?php
	include ('footer.php')
    ?>