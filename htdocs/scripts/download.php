<?php

$filename = 'Sales Report.csv';
$export_data = unserialize($_POST['export_data']);

// file creation
$file = fopen($filename,"w");
		//Array of fields
		$fields = array('customer_id', 'product_id', 'quantity', 'orderDate', 'employee_id');
        fputcsv($file,$fields); 

foreach ($export_data as $line){
 fputcsv($file,$line);
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
