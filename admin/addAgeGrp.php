<?php 
  $PageTitle="Add Age Group";
 include ('header.php') ?>
<div class="row col-md-12 margin-top-12"> 
<form method="post" class='form' action="addAgeGrp.php">
  	<?php include('../errors.php'); ?>
    <h3>Add New Age Group</h3>
  	<div class="input-group">
  	  <label>Age Group Name :</label>
  	  <input type="text" name="agegrpname" value="" required>
  	</div>
      
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_agegrp">Add Age Group</button>
  	</div>
      <div class="input-group">
          <label><?php echo $agegrpAddnameScs;?></label>
  	</div>
</form>
<div class="row col-md-6 offset-3 margin-top-12"> 
		<table class="table table-sm table-hover" border="1">
			<thead>
                <th>Sr#</th>
				<th>Age Group Name</th>
				<th>Action</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					$query="select * from tblagegroups order by 1 desc";
                     $result = mysqli_query($db, $query);
                     $i = 0;
                     while ($row = $result->fetch_assoc()) 
                     { 
						?>
						<tr>
                            <td><?php $i = $i+1; echo $i; ?></td>
							<td><?php echo $row['AG_Dscr']; ?></td>
							<td><a href="editAgeGrp.php?id=<?php echo $row['AG_ID']; ?>">Edit</a></td>
							<td><a href="deleteAgeGrp.php?id=<?php echo $row['AG_ID']; ?>" onclick=“return confirm('Are you sure you want to delete??');”>Delete</a></td>
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