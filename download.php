<?php
$filename = 'orderdata'.date('Y-m-d H:i:s').'.csv';
$export_data = unserialize($_POST['export_data']);

// file creation
$file = fopen($filename,"w");

foreach ($export_data as $line){
 fputcsv($file,$line);
}

fclose($file);
header('Location:seller/project_backup');

exit();