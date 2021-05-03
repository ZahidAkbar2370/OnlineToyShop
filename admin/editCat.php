
<?php
	include ('header.php');
	$id=$_GET['id'];
	$query=mysqli_query($db,"select * from tblcategories where cat_id='$id'");
	$row=mysqli_fetch_array($query);
?>
<div class="row col-md-12 margin-top-12">
	<form method="POST" class="form" action="editCat.php?id=<?php echo $row['cat_ID']; ?>">
	<h3>Update Category</h3>
  	<div class="input-group">
		<label>Category Name:</label><input type="text" value="<?php echo $row['cat_dscr']; ?>" name="categoryname" required>
    </div>
    
  	<div class="input-group">
  	  <button type="submit" class="btn" name="up_cat">Update</button>
  	</div>
      <div class="input-group">
		<a class="text-right" href="addCat.php">Back</a>
      </div>
      
      <div class="input-group">
          <label><?php echo $catupnameScs;?></label>
  	</div>
	</form>
</div>
    <?php
	include ('footer.php')
    ?>