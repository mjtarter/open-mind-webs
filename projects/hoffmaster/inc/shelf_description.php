<?php include ("connect.php"); ?>
        
<h3><a href ="update.php">Home Page</a></h3>
<h2>Update Database</h2>
<h4>Create Custom Shelf Description:</h4> 
              
<form action="update.php" method="post">
	Bullet #1:<select name="shelf_desc[]">
    <option value="''">None</option>
    <option value="bullet_one">Pkg Count</option>
    <option value="bullet_two">Size</option>
    <option value="bullet_three">Attribute</option>                  
    </select><br>
	Bullet #2:<select name="shelf_desc[]">
    <option value="''">None</option>
    <option value="bullet_one">Pkg Count</option>
    <option value="bullet_two">Size</option>
    <option value="bullet_three">Attribute</option>                  
    </select><br>
	Bullet #3:<select name="shelf_desc[]">
    <option value="''">None</option>
    <option value="bullet_one">Pkg Count</option>
    <option value="bullet_two">Size</option>
    <option value="bullet_three">Attribute</option>
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
		<th>Pkg Count</th>
		<th>Size</th>
		<th>Attribute</th>
		<th>Bullet 4</th>
		<th>Bullet 5</th>
		<th>Bullet 6</th>   
		<th>Shelf Desc 1</th>
		<th>Shelf Desc 2</th>
		<th>Custom Shelf Desc</th>   			
		</tr>";
//If Ensemble form from initial criteria page is submitted, this query is used to display database results.
if (isset($_POST["ensemble"]) OR (isset($_GET["ensemble"]))){
		$query ='Select ' . $_GET['ensemble'] . '_shelf_desc.*
				from ' . $_GET['ensemble'] .'_shelf_desc';
        $result = mysql_query($query);
}
//If Occasion form from initial criteria page is submitted, this query is used to display database results.
else if (isset($_POST["occasion"]) OR (isset($_GET["occasion"]))){
	$query ='Select *
	FROM ladybug_fancy_shelf_desc
	WHERE gift_by_occasion = "' . $_GET['occasion'] .
	'" UNION ALL
	Select *
	FROM fire_watch_shelf_desc
	WHERE gift_by_occasion = "' . $_GET['occasion'] . '"';
	$result = mysql_query($query);
}
        echo '<span style="color:red;">';  printf("Total Results: %d\n", mysql_affected_rows()); echo '</span>';
        while ( $field_db = mysql_fetch_assoc($result) ) {
	?>
        
         <tr>
            <td style="width:200px;"><?php echo $field_db['bullet_one']; ?></td>
            <td style="width:250px;"><?php echo $field_db['bullet_two']; ?></td>
            <td style="width:250px;"><?php echo $field_db['bullet_three']; ?></td>
            <td style="width:250px;"><?php echo $field_db['bullet_four']; ?></td>
            <td style="width:250px;"><?php echo $field_db['bullet_five']; ?></td>
            <td style="width:250px;"><?php echo $field_db['bullet_six']; ?></td>
            <td><?php echo $field_db['shelf_desc_one']; ?></td>
            <td><?php echo $field_db['shelf_desc_two']; ?></td>
            <td><?php echo $field_db['custom_shelf_desc']; ?></td>	           
        </tr>
         <?php } ?> 
	</table>			