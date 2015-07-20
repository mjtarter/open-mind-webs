<?php include ("connect.php"); ?>
        
<h3><a href ="update.php">Home Page</a></h3>
<h2>Update Database</h2>
<h4>Create Custom Short Description:</h4> 
              
<form action="update.php" method="POST">
	Sentence #1:<select name="short_desc[]">
    <option value="''">None</option>
    <option value="sentence_one">Sentence 1</option>                            
    <option value="sentence_two">Sentence 2</option>
    <option value="sentence_three">Sentence 3</option>
    <option value="sentence_four">Sentence 4</option>
    <option value="sentence_five">Sentence 5</option>
    <option value="sentence_six">Sentence 6</option>                  
    </select><br>
	Sentence #2:<select name="short_desc[]">
    <option value="''">None</option>
    <option value="sentence_one">Sentence 1</option>                            
    <option value="sentence_two">Sentence 2</option>
    <option value="sentence_three">Sentence 3</option>
    <option value="sentence_four">Sentence 4</option>
    <option value="sentence_five">Sentence 5</option>
    <option value="sentence_six">Sentence 6</option>                  
    </select><br>
	Sentence #3:<select name="short_desc[]">
    <option value="''">None</option>
    <option value="sentence_one">Sentence 1</option>                            
    <option value="sentence_two">Sentence 2</option>
    <option value="sentence_three">Sentence 3</option>
    <option value="sentence_four">Sentence 4</option>
    <option value="sentence_five">Sentence 5</option>
    <option value="sentence_six">Sentence 6</option>
    </select><br>
	Sentence #4:<select name="short_desc[]">
    <option value="''">None</option>
    <option value="sentence_one">Sentence 1</option>                            
    <option value="sentence_two">Sentence 2</option>
    <option value="sentence_three">Sentence 3</option>
    <option value="sentence_four">Sentence 4</option>
    <option value="sentence_five">Sentence 5</option>
    <option value="sentence_six">Sentence 6</option>         
    </select><br>
	Sentence #5:<select name="short_desc[]">
    <option value="''">None</option>
    <option value="sentence_one">Sentence 1</option>                            
    <option value="sentence_two">Sentence 2</option>
    <option value="sentence_three">Sentence 3</option>
    <option value="sentence_four">Sentence 4</option>
    <option value="sentence_five">Sentence 5</option>
    <option value="sentence_six">Sentence 6</option>             
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
		<th>Sentence One</th>
		<th>Sentence Two</th>
		<th>Sentence Three</th>
		<th>Sentence Four</th>
		<th>Sentence Five</th>
		<th>Sentence Six</th>   
		<th>Short Desc 1</th>
		<th>Short Desc 2</th>
		<th>Custom Short Desc</th>   			
		</tr>";
	if (isset($_POST["ensemble"]) OR (isset($_GET["ensemble"]))){
		$query ='Select ' . $_GET['ensemble'] . '_short_desc.*
				from ' . $_GET['ensemble'] .'_short_desc';
        $result = mysql_query($query);
	}
	else if (isset($_POST["occasion"]) OR (isset($_GET["occasion"]))){
	$query ='Select *
	FROM ladybug_fancy_short_desc
	WHERE gift_by_occasion = "' . $_GET['occasion'] .
	'" UNION ALL
	Select *
	FROM fire_watch_short_desc
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
            <td><?php echo $field_db['short_desc_one']; ?></td>
            <td><?php echo $field_db['short_desc_two']; ?></td>
            <td><?php echo $field_db['custom_short_desc']; ?></td>	           
        </tr>
         <?php } ?> 
	</table>			