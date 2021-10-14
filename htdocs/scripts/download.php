<?php

$filename = 'Sales Report.csv';
$export_data = unserialize(base64_decode($_POST['export_data']));

// file creation
$file = fopen($filename,"w");
		//Array of fields
		$fields = array('Order Number', 'Date', 'Staff Member', 'Customer', 'Customer Phone', 'Item', 'Description', 'Item Price', 'Category', 'Quantity', 'Sale Price', 'Total');
        fputcsv($file,$fields);

foreach ($export_data as $line){
	// To display on the page a <br /> is used, for exporting to csv this is replaced with a standard newline
 fputcsv($file,str_replace('<br />', "\n", $line));
}

fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; ");

readfile($filename);

// deleting file
unlink($filename);
exit();



//Export CSV files: https://makitweb.com/how-to-export-mysql-table-data-as-csv-file-in-php/#config
