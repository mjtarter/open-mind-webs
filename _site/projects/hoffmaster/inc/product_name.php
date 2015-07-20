<?php include ("connect.php"); ?>
        
<h3><a href ="update.php">Home Page</a></h3>
<h2>Update Database</h2>
<h4>Create Custom Product Name:</h4> 
              
<form action="update.php" method="POST">
	Part #1:<select name="product_name[]">
    <option value="''">None</option>
    <option value="part_one">Part 1</option>                            
    <option value="part_two">Part 2</option>
    <option value="part_three">Part 3</option>
    <option value="part_four">Part 4</option>
    <option value="part_five">Part 5</option>
    <option value="part_six">Part 6</option>                 
    </select><br>
	Part #2:<select name="product_name[]">
    <option value="''">None</option>
    <option value="part_one">Part 1</option>                            
    <option value="part_two">Part 2</option>
    <option value="part_three">Part 3</option>
    <option value="part_four">Part 4</option>
    <option value="part_five">Part 5</option>
    <option value="part_six">Part 6</option>                 
    </select><br>
	Part #3:<select name="product_name[]">
    <option value="''">None</option>
    <option value="part_one">Part 1</option>                            
    <option value="part_two">Part 2</option>
    <option value="part_three">Part 3</option>
    <option value="part_four">Part 4</option>
    <option value="part_five">Part 5</option>
    <option value="part_six">Part 6</option>
    </select><br>
	Part #4:<select name="product_name[]">
    <option value="''">None</option>
    <option value="part_one">Part 1</option>                            
    <option value="part_two">Part 2</option>
    <option value="part_three">Part 3</option>
    <option value="part_four">Part 4</option>
    <option value="part_five">Part 5</option>
    <option value="part_six">Part 6</option>        
    </select><br>
	Part #5:<select name="product_name[]">
    <option value="''">None</option>
    <option value="part_one">Part 1</option>                            
    <option value="part_two">Part 2</option>
    <option value="part_three">Part 3</option>
    <option value="part_four">Part 4</option>
    <option value="part_five">Part 5</option>
    <option value="part_six">Part 6</option>        
    </select>
    <input type="hidden" name="ensemble" value="<?php echo $_GET['ensemble']; ?>">	
    <input type="hidden" name="variable_column" value="<?php echo $_GET['variable_column']; ?>">
    <input type="hidden" name="occasion" value="<?php echo $_GET['occasion']; ?>">
    <br><br>
    <input type="submit">
</form>       
        
<?PHP

echo 
	"<table>
		<tr>
		<th>Part One</th>
		<th>Part Two</th>
		<th>Part Three</th>
		<th>Part Four</th>
		<th>Part Five</th>
		<th>Part Six</th>   
		<th>Product Name 1</th>
		<th>Product Name 2</th>
		<th>Custom Product Name</th>   			
		</tr>";
//If Ensemble form from initial criteria page is submitted, this query is used to display database results.
if (isset($_POST["ensemble"]) OR (isset($_GET["ensemble"]))){
		$query ='Select ' . $_GET['ensemble'] . '_prod_name.*
				from ' . $_GET['ensemble'] .'_prod_name';
        $result = mysql_query($query);
}
else if (isset($_POST["occasion"]) OR (isset($_GET["occasion"]))){
	$query ='Select *
	FROM ladybug_fancy_prod_name
	WHERE gift_by_occasion = "' . $_GET['occasion'] .
	'" UNION ALL
	Select *
	FROM fire_watch_prod_name
	WHERE gift_by_occasion = "' . $_GET['occasion'] . '"';
	$result = mysql_query($query);
}
        echo '<span style="color:red;">';  printf("Total Results: %d\n", mysql_affected_rows()); echo '</span>';
        while ( $field_db = mysql_fetch_assoc($result) ) {
	?>
        
         <tr>
            <td style="width:200px;"><?php echo $field_db['part_one']; ?></td>
            <td style="width:250px;"><?php echo $field_db['part_two']; ?></td>
            <td style="width:250px;"><?php echo $field_db['part_three']; ?></td>
            <td style="width:250px;"><?php echo $field_db['part_four']; ?></td>
            <td style="width:250px;"><?php echo $field_db['part_five']; ?></td>
            <td style="width:250px;"><?php echo $field_db['part_six']; ?></td>
            <td><?php echo $field_db['product_name_one']; ?></td>
            <td><?php echo $field_db['product_name_two']; ?></td>
            <td><?php echo $field_db['custom_prod_name']; ?></td>	           
        </tr>
         <?php } ?> 
	</table>			