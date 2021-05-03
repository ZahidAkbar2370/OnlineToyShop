<?php 
  $PageTitle="Add Category";
 include ('header.php') ?>
<div class="row col-md-12 margin-top-12"> 
<form method="post" class='form' action="addCat.php">
  	<?php include('../errors.php'); ?>
    <h3>Add New Category</h3>
  	<div class="input-group">
  	  <label>Category Name :</label>
  	  <input type="text" name="catname" value="" required>
  	  <!-- <input type="text" name="catname" value="<?php echo $catname;?>" required> -->
  	</div>
      
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_cat">Add Category</button>
  	</div>
      <div class="input-group">
          <label><?php echo $catAddnameScs;?></label>
  	</div>
</form>
<div class="row col-md-6 offset-3 margin-top-12"> 
		<table class="table table-sm table-hover" border="1">
			<thead>
                <th>Sr#</th>
				<th>Category Name</th>
				<th>Action</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					$query="select * from tblcategories order by 1 desc";
                     $result = mysqli_query($db, $query);
                     $i = 0;
                     while ($row = $result->fetch_assoc()) 
                     { 
						?>
						<tr>
                            <td><?php $i = $i+1; echo $i; ?></td>
							<td><?php echo $row['cat_dscr']; ?></td>
							<td><a href="editCat.php?id=<?php echo $row['cat_ID']; ?>">Edit</a></td>
							<td><a href="deleteCat.php?id=<?php echo $row['cat_ID']; ?>" onclick=“return confirm('Are you sure you want to delete??');”>Delete</a></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>    
<?php 
 include ('footer.php') ?>