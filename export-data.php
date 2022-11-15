<?php 
// Load the database configuration file 
include_once 'dbConfig.php'; 
 
$filename = "members_" . date('Y-m-d') . ".csv"; 
$delimiter = ","; 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('Name', 'Email', 'Phone', 'Status'); 
fputcsv($f, $fields, $delimiter); 

// Get records from the database 
$result = $db->query("SELECT * FROM members");
echo "<pre>";
print_r(get_class_methods($result));die; 
if($result->num_rows > 0){ 
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['name'], $row['email'], $row['phone'],$row['status']); 
       fputcsv($f, $lineData, $delimiter); 
    } 
    // print_r($lineData);
} 
 
// Move back to beginning of file 
fseek($f, 0); 
 
// Set headers to download file rather than displayed 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
// Output all remaining data on a file pointer 
fpassthru($f); 
 
// Exit from file 
exit();