<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title> CUDA - Let's go parallel :D </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-result.css">
</head>
<body>
<?php

/*
 *  <option> Mandelbrot set</option>
        <option> Matrix Multiplication</option>
        <option> Matrix Addition</option>
        <option> Other</option>
 *
 */

require_once('functions.php');


ini_set('display_errors',1); 
error_reporting(E_ALL);


if(empty($_POST)){
	print_r($_POST);
	print_r($_FILES);

    echo('Nothing...came.... ');
}
else{

formatArrayToTable(array($_POST));
if(isset($_FILES)){
formatArrayToTable($_FILES);
}

}

$process = $_POST{'process'};

switch($process){

    case 'cpa':

        //$file_A = $_POST['file1'];
        //$file_B = $_POST['file2'];
        $pt = $_POST['mat_a_rows'];
        $sampling = $_POST['mat_a_cols'];


        $target_name_A = basename($_FILES['file1']['name']);
        $target_name_B = basename($_FILES['file2']['name']);

        $tmp_name_A = $_FILES['file1']['tmp_name'];
        $tmp_name_B = $_FILES['file2']['tmp_name'];

        $move_A = move_uploaded_file($tmp_name_A, $target_name_A);
        $move_B = move_uploaded_file($tmp_name_B, $target_name_B);
        if(!$move_A || !$move_B){
            print_r($_FILES['file1']['error']);echo('<br>');
            print_r($_FILES['file2']['error']);echo('<br>');
        }

        $args = join(' ', array($pt,$sampling,$target_name_B,$target_name_A));
        cpa($args);

        break;
    
default:
        $args = 'None';
        echo('deafult');
        break;

}

//echo($args);



?>

<br><h2>Go <a href="../index.php">Back</a> Do another calculation</h2></br>
</body>
</html>
