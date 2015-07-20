<?PHP
//Phase 4: form variables sent as POST from included file (long_desc, short_desc, etc.) 
if (isset($_POST["ensemble"]) && !empty($_POST["ensemble"]))  { 	
//IF ENSEMBLE Post variable are sent from include file form:
	include ("connect.php");
	$sentences = $_POST['sentences']; 
	$shelf_desc = $_POST['shelf_desc'];
	$short_desc = $_POST['short_desc'];
	$prod_name = $_POST['product_name'];
	$variable_column = $_POST['variable_column'];
	
//Update database
	$sql = 'update ' . $_POST['ensemble'] .'_variable set long_description = CONCAT (' . $sentences[0] . '," ",' . $sentences[1] . '," ",' . $sentences[2] . '," ",' . $sentences[3] . '," ",' . $sentences[4] . ')';
	$result = mysql_query($sql);	
	
	$sql2 = 'update ' . $_POST['ensemble'] .'_shelf_desc set custom_shelf_desc = CONCAT (' . $shelf_desc[0] . '," ",' . $shelf_desc[1] . '," ",' . $shelf_desc[2] . ')';
	$result = mysql_query($sql2);
	
	$sql3 = 'update ' . $_POST['ensemble'] .'_short_desc set custom_short_desc = CONCAT (' . $short_desc[0] . '," ",' . $short_desc[1] . '," ",' . $short_desc[2] . '," ",' . $short_desc[3] . '," ",' . $short_desc[4] . ')';
	$result = mysql_query($sql3);
	
	$sql4 = 'update ' . $_POST['ensemble'] .'_prod_name set custom_prod_name = CONCAT (' . $prod_name[0] . '," ",' . $prod_name[1] . '," ",' . $prod_name[2] . '," ",' . $prod_name[3] . '," ",' . $prod_name[4] . ')';
	$result = mysql_query($sql4);

//Redirect after update database to update.php?custom with ensemble and variable column variables sent in the url as GET variables, so the variables selected ensemble and variable column from initial criteria page are still the same. This way the initial criteria form does not need to be filled out again.
	header("Location: update.php?update=custom&ensemble=".($_POST['ensemble'])."&variable_column=".($_POST['variable_column']));	
	exit;
}

else if (isset($_POST["occasion"]) && !empty($_POST["occasion"]))  {
//If OCCASION Post variables are sent from include file form:
	include ("connect.php");
	$sentences = $_POST['sentences']; 
	$shelf_desc = $_POST['shelf_desc'];
	$short_desc = $_POST['short_desc'];
	$prod_name = $_POST['product_name'];
	$variable_column = $_POST['variable_column'];
	$occasion = $_POST['occasion'];

//Update Database
//Update long description
	$sql5 = 'update ladybug_fancy_variable set ladybug_fancy_variable.long_description = CONCAT (' . $sentences[0] . '," ",' . $sentences[1] . '," ",' . $sentences[2] . '," ",' . $sentences[3] . '," ",' . $sentences[4] . ') where ladybug_fancy_variable.gift_by_occasion="'. $_POST['occasion']. '"'; 
	$result = mysql_query($sql5);
	$sql6 = 'update fire_watch_variable set fire_watch_variable.long_description = CONCAT (' . $sentences[0] . '," ",' . $sentences[1] . '," ",' . $sentences[2] . '," ",' . $sentences[3] . '," ",' . $sentences[4] . ') where fire_watch_variable.gift_by_occasion="'. $_POST['occasion']. '"';
	$result = mysql_query($sql6);
//Update shelf description
	$sql7 = 'update ladybug_fancy_shelf_desc set ladybug_fancy_shelf_desc.custom_shelf_desc = CONCAT (' . $shelf_desc[0] . '," ",' . $shelf_desc[1] . '," ",' . $shelf_desc[2] . ') where ladybug_fancy_shelf_desc.gift_by_occasion="'. $_POST['occasion']. '"';
	$result = mysql_query($sql7);
	$sql8 = 'update fire_watch_shelf_desc set fire_watch_shelf_desc.custom_shelf_desc = CONCAT (' . $shelf_desc[0] . '," ",' . $shelf_desc[1] . '," ",' . $shelf_desc[2] . ') where fire_watch_shelf_desc.gift_by_occasion="'. $_POST['occasion']. '"';
	$result = mysql_query($sql8);
//Update short description
	$sql9 = 'update ladybug_fancy_short_desc set ladybug_fancy_short_desc.custom_short_desc = CONCAT (' . $short_desc[0] . '," ",' . $short_desc[1] . '," ",' . $short_desc[2] . '," ",' . $short_desc[3] . '," ",' . $short_desc[4] . ') where ladybug_fancy_short_desc.gift_by_occasion="'. $_POST['occasion']. '"';
	$result = mysql_query($sql9);
	$sql10 = 'update fire_watch_short_desc set fire_watch_short_desc.custom_short_desc = CONCAT (' . $short_desc[0] . '," ",' . $short_desc[1] . '," ",' . $short_desc[2] . '," ",' . $short_desc[3] . '," ",' . $short_desc[4] . ') where fire_watch_shelf_desc.gift_by_occasion="'. $_POST['occasion']. '"';
	$result = mysql_query($sql10);
//Update product name
	$sql11 = 'update ladybug_fancy_prod_name set ladybug_fancy_prod_name.custom_prod_name = CONCAT (' . $prod_name[0] . '," ",' . $prod_name[1] . '," ",' . $prod_name[2] . '," ",' . $prod_name[3] . '," ",' . $prod_name[4] . ') where ladybug_fancy_prod_name.gift_by_occasion="'. $_POST['occasion']. '"';
	$result = mysql_query($sql11);
	$sql12 = 'update fire_watch_prod_name set fire_watch_prod_name.custom_prod_name = CONCAT (' . $prod_name[0] . '," ",' . $prod_name[1] . '," ",' . $prod_name[2] . '," ",' . $prod_name[3] . '," ",' . $prod_name[4] . ') where fire_watch_prod_name.gift_by_occasion="'. $_POST['occasion']. '"';
	$result = mysql_query($sql12);
//Redirect after update database to update.php?custom with occasion and variable column variables sent in the url as GET variables, so the variables selected ensemble and variable column from initial criteria page are still the same. This way the initial criteria form does not need to be filled out again.
	header("Location: update.php?update=custom&occasion=".($_POST['occasion'])."&variable_column=".($_POST['variable_column']));	
	exit;
}
?>

<html>
	<head>
		<style>
        	body {
				width:3200px;
			}
        	table td {
				border:solid 1px black;
       			width:300px;
			}
        </style>
	</head>
    <body>
    
    	<?php //PHASE 2: The initial criteria page form submission GET variables are submitted below. The below if else statements will either A. if there is an error (invalid form submission) add a message to $error_message which will then be displayed on initial criteria page B. if there is no error they will include the appropriate file. 

//PHASE 5: GET variables sent from above SQL statements in the URL come here.?>
    
<?php 
if ((isset($_GET["ensemble"]))){
    if (!empty($_GET["ensemble"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'output_paragraph'))) {	
    		include ("inc/long_description.php"); 
        }  
    else if (!empty($_GET["ensemble"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'custom_shelf_desc'))) {		
            include ("inc/shelf_description.php"); 
        } 
    else if (!empty($_GET["ensemble"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'custom_short_desc'))) {		
            include ("inc/short_description.php"); 
        }   
    else if (!empty($_GET["ensemble"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'custom_prod_name'))) {		
            include ("inc/product_name.php"); 
        }
	else { 
            $error_message = "Please enter a valid ensemble and variable column."; 
		}
	}

else if ((isset($_GET["occasion"]))){
	 if (!empty($_GET["occasion"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'output_paragraph'))) {	
    		include ("inc/long_description.php"); 
        }  
    else if (!empty($_GET["occasion"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'custom_shelf_desc'))) {		
            include ("inc/shelf_description.php"); 
        } 
    else if (!empty($_GET["occasion"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'custom_short_desc'))) {		
            include ("inc/short_description.php"); 
        }   
    else if (!empty($_GET["occasion"]) && (isset($_GET["variable_column"]) && ($_GET['variable_column'] == 'custom_prod_name'))) {		
            include ("inc/product_name.php"); 
        }
	else { 
			$error_message = "Please enter a valid occasion and variable column."; 
		}
	}


?>

<?php 
//PHASE 1: if request method is GET and both fields on either occasion form or ensmble form are not filled out then show html below (initial criteria search page)
if (($_SERVER["REQUEST_METHOD"] == "GET") && (empty($_GET["occasion"]) or (empty($_GET["variable_column"]))) && (empty($_GET["ensemble"]) or (empty($_GET["variable_column"])))){   ?>
<style>

body {width:650px;
margin-right:auto;
margin-left:auto;}

</style>
<h1 style="text-align:center; width:650px;">Creative Converting CMS Homepage</h1>

<div class="forms" style="width:650px;">
	<h2 style="text-align:center;">Choose Variable Fields</h2>
    <?php 
	//if there is an error message from the above if else statements (initial criteria search page form submission errors) then the if else statements will lead to an error above and display the error message here:
			if (isset($error_message)) {
    echo '<div class="error-message" style="border: 2px solid black; text-align:center; margin-bottom:20px;">'
		. "* " . $error_message . "</div>";
			} ?>
	<div class="form-left" style="display:inline-block; background-color:#D8D8D8; padding:30px; margin-right:20px;">
    <form action="update.php" method="GET">
        Ensemble: <select name="ensemble">
        <option value="">Select</option>
        <option value="ladybug_fancy">Ladybug Fancy</option>
        <option value="fire_watch">Fire Watch</option>                  
        </select><br>
        Variable Column: <select name="variable_column" id="vari">
        <option value="">Select</option>
        <option value="custom_short_desc">Short Description</option>
        <option value="output_paragraph">Long Description</option> 
        <option value="custom_shelf_desc">Shelf Description</option>
        <option value="custom_prod_name">Product Name</option>                  
        </select><br><br>
        <input type="submit">
        <?php if (isset($error_message) && $error_message == "Please enter a valid ensemble and variable column.") { ?>
    	<script> document.getElementById("vari").value = '<?php echo htmlspecialchars($_GET['variable_column']); ?>'
    	document.getElementsByName('ensemble')[0].value = '<?php echo htmlspecialchars($_GET['ensemble']); ?>'
		</script>    
        <?php } ?>
	</form>
    </div>
    <div class="form-right" style="display:inline-block; background-color:#d8d8d8; padding:30px;">
    <form action="update.php" method="GET">
        Occasion: <select name="occasion">
        <option value="">Select</option>
        <option value="Birthday">Birthday</option>
        <option value="Collegiate">Collegiate</option>                  
        </select><br>
        Variable Column: <select name="variable_column" id="varp">
        <option value="">Select</option>
        <option value="custom_short_desc">Short Description</option>
        <option value="output_paragraph">Long Description</option> 
        <option value="custom_shelf_desc">Shelf Description</option>
        <option value="custom_prod_name">Product Name</option>                  
        </select><br><br>
        <input type="submit" style="">
    </form>
            <?php if (isset($error_message) && $error_message == "Please enter a valid occasion and variable column.") { ?>
 	<script>
    	document.getElementsByName('occasion')[0].value = '<?php echo htmlspecialchars($_GET['occasion']); ?>'
		document.getElementById('varp').value = '<?php echo htmlspecialchars($_GET['variable_column']); ?>'
	</script>  
              <?php } ?>
	</div>
</div>
	<div style="text-align:center;">
    	<h2 style="clear:left; padding-top:30px;">Database Spreadsheets</h2>
    	<a href="download.php"><button>Click Here to Download</button></a>
    </div>
    <?php } ?>

    </body>
</html>