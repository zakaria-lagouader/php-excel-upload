<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


$file = $_FILES['file'];
$row = [];
if ($file['name'] != "") {
    $allowed = ['xlsx', 'xls'];
    $file_array = explode(".", $file['name']);
    $file_extension = end($file_array);
    if (in_array($file_extension, $allowed)) {
        $spreadsheet = IOFactory::load($file['tmp_name']);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
    }else {
        echo "extension not allowed !!";
    }
}else {
    echo "please select a file !!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <?php foreach($rows as $row): ?>
            <tr>
                <?php foreach($row as $col): ?>
                    <td><?=  $col?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
