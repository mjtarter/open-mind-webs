<?php 
//PHASE 3: Send the form below to update.php SQL statements
include ("connect.php"); ?>
        
<h3><a href ="update.php">Home Page</a></h3>
<h2>Update Database</h2>
<h4>Create Custom Long Description:</h4>     
<form action="update.php" method="POST">
	Bullet #1:<select name="sentences[]">
    <option value="''">None</option>
    <option value="sentence_one">Pkg Count</option>                            
    <option value="sentence_two">Attribute</option>
    <option value="sentence_three">Size</option>
    <option value="sentence_four">Attribute #2</option>
    <option value="sentence_five">Disposable</option>
    <option value="sentence_six">Size #2</option>
    <option value="sentence_seven">Attribute #3</option>
    <option value="sentence_eight">Attribute #4</option>  
    <option value="sentence_nine">Theme</option>                    
    </select><br>
	Bullet #2:<select name="sentences[]">
    <option value="''">None</option>
    <option value="sentence_one">Pkg Count</option>
    <option value="sentence_two">Attribute</option>
    <option value="sentence_three">Size</option>
    <option value="sentence_four">Attribute #2</option>
    <option value="sentence_five">Disposable</option>
    <option value="sentence_six">Size #2</option>
    <option value="sentence_seven">Attribute #3</option>
    <option value="sentence_eight">Attribute #4</option>  
    <option value="sentence_nine">Theme</option>                    
    </select><br>
	Bullet #3:<select name="sentences[]">
    <option value="''">None</option>
    <option value="sentence_one">Pkg Count</option>
    <option value="sentence_two">Attribute</option>
    <option value="sentence_three">Size</option>
    <option value="sentence_four">Attribute #2</option>
    <option value="sentence_five">Disposable</option>
    <option value="sentence_six">Size #2</option>
    <option value="sentence_seven">Attribute #3</option>
    <option value="sentence_eight">Attribute #4</option>  
    <option value="sentence_nine">Theme</option> 
    </select><br>
	Bullet #4:<select name="sentences[]">
    <option value="''">None</option>
    <option value="sentence_one">Pkg Count</option>
    <option value="sentence_two">Attribute</option>
    <option value="sentence_three">Size</option>
    <option value="sentence_four">Attribute #2</option>
    <option value="sentence_five">Disposable</option>
    <option value="sentence_six">Size #2</option>
    <option value="sentence_seven">Attribute #3</option>
    <option value="sentence_eight">Attribute #4</option>  
    <option value="sentence_nine">Theme</option>                
    </select><br>
	Bullet #5:<select name="sentences[]">
    <option value="''">None</option>
    <option value="sentence_one">Pkg Count</option>
    <option value="sentence_two">Attribute</option>
    <option value="sentence_three">Size</option>
    <option value="sentence_four">Attribute #2</option>
    <option value="sentence_five">Disposable</option>
    <option value="sentence_six">Size #2</option>
    <option value="sentence_seven">Attribute #3</option>
    <option value="sentence_eight">Attribute #4</option>  
    <option value="sentence_nine">Theme</option>                
    </select>
    <?php // The Get variables from the initial criteria page are sent in this form to update.php sql statements ?>
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
		<th>Attribute</th>
		<th>Size</th>
		<th>Attribute #2</th>
		<th>Disposable</th>
		<th>Size</th>
		<th>Attribute #3</th>
		<th>Attribute #4</th>
		<th>Theme</th>
		<th>Long Desc #1</th>
		<th>Long Desc #2</th>
		<th>Custom Long Desc</th>  			
		</tr>";
		//If Ensemble form from initial criteria page is submitted, this query is used to display database results.
if (isset($_POST["ensemble"]) OR (isset($_GET["ensemble"]))){
	$query ='Select ' . $_GET['ensemble'] . '_variable.*
			from ' . $_GET['ensemble'] .'_variable';
    $result = mysql_query($query);
}
		//If Occasion form from initial criteria page is submitted, this query is used to display database results.
else if (isset($_POST["occasion"]) OR (isset($_GET["occasion"]))){
	$query ='Select *
	FROM ladybug_fancy_variable
	WHERE gift_by_occasion = "' . $_GET['occasion'] .
	'" UNION ALL
	Select *
	FROM fire_watch_variable
	WHERE gift_by_occasion = "' . $_GET['occasion'] . '"';
	$result = mysql_query($query);
}
        echo '<span style="color:red;">';  printf("Total Results: %d\n", mysql_affected_rows()); echo '</span>';
        while ( $field_db = mysql_fetch_assoc($result) ) {
	?>
        
         <tr>
            <td style="width:200px;"><?php echo $field_db['sentence_one']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_two']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_three']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_four']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_five']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_six']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_seven']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_eight']; ?></td>
            <td style="width:250px;"><?php echo $field_db['sentence_nine']; ?></td>	
            <td><?php echo $field_db['long_desc_one']; ?></td>
            <td><?php echo $field_db['long_desc_two']; ?></td>
            <td><?php echo $field_db['long_description']; ?></td>   
        </tr>
         <?php } ?> 
	</table>			