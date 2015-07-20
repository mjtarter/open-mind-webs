<?php

/*******EDIT LINES 3-8*******/

$DB_Server = "CreativeConvCMS.db.11482846.hostedresource.com"; //MySQL Server 

$DB_Username = "CreativeConvCMS"; //MySQL Username 
	
$DB_Password = "Starvin1!";             //MySQL Password 
	
$DB_DBName = "CreativeConvCMS";         //MySQL Database Name 

$DB_TBLName = "ladybug_fancy_variable"; //MySQL Table Name

$DB_TBLName2 = "ladybug_fancy_fixed"; //MySQL Table Name

$DB_TBLName3 = "fire_watch_variable"; //MySQL Table Name

$DB_TBLName4 = "fire_watch_fixed"; //MySQL Table Name

$filename = "creative-converting-DB";         //File Name

/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/
	
//create MySQL connection

$sql = "SELECT auto_publish_item,channel_type,reporting_hierarchy_id,gpc_code,finer_categorization,item_po_type_code,fineline,start_date,End_Date,Availability_Code,Replenishable,Vendor_ID,Vendor_Contract_Number,Existing_WM_Item_Number,UPC,UPC_Check_Digit,Product_Name,Vendor_Stock_Number,Model_Number,Manufacturer_Stock_Number,Initial_Cost,Initial_Retail,Base_UPC,Variant_Name_1,Variant_Value_1,Variant_Name_2,Variant_Value_2,Parent_UPC,Vendor_Pack_Quantity,Vendor_Pack_Length,Vendor_Pack_Width,Vendor_Pack_Height,Vendor_Pack_Weight,Warehouse_Pack_Quantity,Warehouse_Pack_Length,Warehouse_Pack_Width,Warehouse_Pack_Height,Warehouse_Pack_Weight,Shipping_Length,Shipping_Width,Shipping_Height,Shipping_Weight,Assembled_Product_Length,Assembled_Product_Width,Assembled_Product_Height,Assembled_Product_Weight,Country_Code,Components_Country_of_Origin,Private_Label_Indicator,Factory_ID,Reg_Comp_HazMat,ORMD,Chemical_Indicator,Pesticide_Indicator,Aerosol_Indicator,RPPC_Indicator,Battery_Type,Fuel_Restriction,Composite_Wood,CPSC_Regulated_Indicator,Paper_Wood_Indicator,Mercury_Indicator,Choking_Hazard_Warning,Brand_Code,Brand_Name,Manufacturer_Name,Season_Code,Season_Year,Product_Fabric_Contents,Item_Care,Tool_ID,Is_Perishable,Is_Temperature_Controlled,Has_Expiration,Customer_Shelf_Life_Tolerance,Brand_Id,Manufacturer_Id,Country_of_Origin_Assembly,Primary_Distributor_ID,Licensing_Restrictions,Supplier_Warranty,Color,Primary_Color,Material,product_name_one,product_name_two,custom_prod_name,short_desc_one,short_desc_two,custom_short_desc,long_desc_one,long_desc_two,long_description,shelf_desc_one,shelf_desc_two,custom_shelf_desc,ladybug_fancy_shelf_desc.gift_by_occasion
		FROM ladybug_fancy_fixed
		INNER JOIN ladybug_fancy_variable
		ON ladybug_fancy_fixed.database_id=ladybug_fancy_variable.database_id
		INNER JOIN ladybug_fancy_prod_name
		ON ladybug_fancy_fixed.database_id=ladybug_fancy_prod_name.database_id
		INNER JOIN ladybug_fancy_short_desc
		ON ladybug_fancy_fixed.database_id=ladybug_fancy_short_desc.database_id
		INNER JOIN ladybug_fancy_shelf_desc
		ON ladybug_fancy_fixed.database_id=ladybug_fancy_shelf_desc.database_id
		UNION ALL
		SELECT auto_publish_item,channel_type,reporting_hierarchy_id,gpc_code,finer_categorization,item_po_type_code,fineline,start_date,End_Date,Availability_Code,Replenishable,Vendor_ID,Vendor_Contract_Number,Existing_WM_Item_Number,UPC,UPC_Check_Digit,Product_Name,Vendor_Stock_Number,Model_Number,Manufacturer_Stock_Number,Initial_Cost,Initial_Retail,Base_UPC,Variant_Name_1,Variant_Value_1,Variant_Name_2,Variant_Value_2,Parent_UPC,Vendor_Pack_Quantity,Vendor_Pack_Length,Vendor_Pack_Width,Vendor_Pack_Height,Vendor_Pack_Weight,Warehouse_Pack_Quantity,Warehouse_Pack_Length,Warehouse_Pack_Width,Warehouse_Pack_Height,Warehouse_Pack_Weight,Shipping_Length,Shipping_Width,Shipping_Height,Shipping_Weight,Assembled_Product_Length,Assembled_Product_Width,Assembled_Product_Height,Assembled_Product_Weight,Country_Code,Components_Country_of_Origin,Private_Label_Indicator,Factory_ID,Reg_Comp_HazMat,ORMD,Chemical_Indicator,Pesticide_Indicator,Aerosol_Indicator,RPPC_Indicator,Battery_Type,Fuel_Restriction,Composite_Wood,CPSC_Regulated_Indicator,Paper_Wood_Indicator,Mercury_Indicator,Choking_Hazard_Warning,Brand_Code,Brand_Name,Manufacturer_Name,Season_Code,Season_Year,Product_Fabric_Contents,Item_Care,Tool_ID,Is_Perishable,Is_Temperature_Controlled,Has_Expiration,Customer_Shelf_Life_Tolerance,Brand_Id,Manufacturer_Id,Country_of_Origin_Assembly,Primary_Distributor_ID,Licensing_Restrictions,Supplier_Warranty,Color,Primary_Color,Material,product_name_one,product_name_two,custom_prod_name,short_desc_one,short_desc_two,custom_short_desc,long_desc_one,long_desc_two,long_description,shelf_desc_one,shelf_desc_two,custom_shelf_desc,fire_watch_shelf_desc.gift_by_occasion
		FROM fire_watch_fixed
		INNER JOIN fire_watch_variable
		ON fire_watch_fixed.database_id=fire_watch_variable.database_id
		INNER JOIN fire_watch_prod_name
		ON fire_watch_prod_name.database_id=fire_watch_fixed.database_id
		INNER JOIN fire_watch_short_desc
		ON fire_watch_fixed.database_id=fire_watch_short_desc.database_id
		INNER JOIN fire_watch_shelf_desc
		ON fire_watch_fixed.database_id=fire_watch_shelf_desc.database_id";
	
$Connect = @mysql_connect('CreativeConvCMS.db.11482846.hostedresource.com', 'CreativeConvCMS', 'Starvin1!')
	
    or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());

//select database

$Db = @mysql_select_db($DB_DBName, $Connect)

    or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());

//execute query

$result = @mysql_query($sql,$Connect)

    or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());

$file_ending = "xls";

 

//header info for browser

header("Content-Type: application/xls");

header("Content-Disposition: attachment; filename=$filename.xls");
	
header("Pragma: no-cache");
	
header("Expires: 0");
	
 

/*******Start of Formatting for Excel*******/

//define separator (defines columns in excel & tabs in word)

$sep = "\t"; //tabbed character

//start of printing column names as names of MySQL fields

for ($i = 0; $i < mysql_num_fields($result); $i++) {

echo mysql_field_name($result,$i) . "\t";
	
}

print("\n");

//end of printing column names

 
	
//start while loop to get data	
    while($row = mysql_fetch_row($result))
	
    {
	
        $schema_insert = "";
	
        for($j=0; $j<mysql_num_fields($result);$j++)
	
        {
	
            if(!isset($row[$j]))

                $schema_insert .= "NULL".$sep;
	
            elseif ($row[$j] != "")

                $schema_insert .= "$row[$j]".$sep;
	
          else	
                $schema_insert .= "".$sep;
	
        }

        $schema_insert = str_replace($sep."$", "", $schema_insert);

 $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
	
        $schema_insert .= "\t";
	
       print(trim($schema_insert));
	
        print "\n";

    }
	

	
?>