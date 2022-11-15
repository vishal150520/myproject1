<?php
require_once 'dbConfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php 
        $infos = array();
        $file_name = "main.csv";
        if (($handle = fopen($file_name, "r")) !== FALSE) {
            echo '<table border=1><thead>';
            echo '<th>id</th><th>Email</th><th>Date Of Birth</th>';
            echo '</thead>';
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                echo '<tr><td>' . $data[0] . '</td><td>' . $data[1] . '</td><td>' . $data[2] . '</td></tr>';
                print_r($data);die;
                $infos[] = $data[0] . ',' . $data[1] . ',' . $data[2];
            }
            echo '</tbody></table>';
            fclose($handle);
        }

        $fp = fopen('write.csv', 'w');

        foreach ($infos as $info) {
            fputcsv($fp, array($info), ',', ' ');
        }

        fclose($fp);
        /*
        * End of php-read-write-csv-file.php
        */
        ?>

</body>
</html>