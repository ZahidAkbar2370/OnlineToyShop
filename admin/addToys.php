<?php 
  $PageTitle="Add Toys";
 include ('header.php') ?>
<div class="row col-md-12 margin-top-12"> 

<form method="post" class='form' action="addToys.php" enctype="multipart/form-data">
    <h3>Add Toy</h3>
  	<div class="input-group">
  	  <label>Toy Name :</label>
  	  <input type="text" name="toyname" value="">
  	</div>
      
  	<div class="input-group">
  	  <label>Toy Discription :</label>
  	  <input type="text" name="toydiscription" value="">
  	</div>
      
  	<div class="input-group">
  	  <label>Toy Price Each :</label>
  	  <input type="text" name="toyprice" value="">
  	</div>
  	<div class="input-group">
  	  <label>Toy Quantity :</label>
  	  <input type="number" name="quantitiy" value="">
  	</div>
      <div class="input-group">
      <!-- <select name="country" onchange="getId(this.value);"> -->
      <label>Select Age Group :</label><br>
      <select class="" name="AgeGroup">
                <!-- <option value="">Select Age Group</option> -->
                <?php
                    $query = "SELECT * FROM tblagegroups";
                    $results=mysqli_query($db, $query);
                    //loop
                    foreach ($results as $row){
                ?>
                        <option class="dropdown-item" value="<?php echo $row["AG_ID"];?>"><?php echo $row["AG_Dscr"];?></option>
                <?php
                    }
                ?>
            </select>
      </div>
      <div class="input-group">
      <!-- <select name="country" onchange="getId(this.value);"> -->
      <label>Select Category :</label><br>
      <select class="" name="category">
                <!-- <option value="">Select Age Group</option> -->
                <?php
                    $query = "SELECT * FROM tblcategories";
                    $results=mysqli_query($db, $query);
                    //loop
                    foreach ($results as $row){
                ?>
                        <option class="dropdown-item" value="<?php echo $row["cat_ID"];?>"><?php echo $row["cat_dscr"];?></option>
                <?php
                    }
                ?>
            </select>
      </div>
      <div class="input-group">
        Select image to upload:
        <input type="file" name="photo">
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_toy">Add Toy</button>
  	</div>
      
      <div class="input-group">
          <label><?php echo $toynameScs;?></label>
  	</div> 
  </form>
  <div class="row col-md-6 offset-3 margin-top-12"> 
		<table class="table table-sm table-hover" border="1">
			<thead>
                <th>Sr#</th>
				<th>Toy Name</th>
				<th>Toy Dscr</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$query="select * from tbltoys order by 1 desc";
                     $result = mysqli_query($db, $query);
                     $i = 0;
                     while ($row = $result->fetch_assoc()) 
                     { 
						?>
						<tr>
                            <td><?php $i = $i+1; echo $i; ?></td>
							<td><?php echo $row['Toy_Name']; ?></td>
							<td><?php echo $row['Toy_Dscr']; ?></td>
                            <!-- <a href="editToy.php?id=<?php echo $row['Toy_ID']; ?>">Edit</a> -->
							<td><a href="deletetoy.php?id=<?php echo $row['Toy_ID']; ?>" onclick=“return confirm('Are you sure you want to delete??');”>Delete</a></td>
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