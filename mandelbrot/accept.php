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

if(empty($_POST)){
    die('Nothing...came.... ');
}
else{

    formatArrayToTable(array($_POST));
    if(isset($_FILES)){
        formatArrayToTable($_FILES);
    }
//    echo "<pre>";
//    echo("Arguments received : ");
//    echo("<br>");
//    print_r($_POST);
//    echo("<br>");
//    echo "</pre>";
//
//    echo "<pre>";
//    echo("Arguments received : ");
//    echo("<br>");
//    print_r($_FILES);
//    echo("<br>");
//    echo "</pre>";
}


$process = $_POST{'process'};

switch($process){

    case 'mandel':

        $height = $_POST['mat_b_cols'];
        $width = $_POST['mat_b_rows'];
        $real_min = $_POST['arg3'];
        $real_max = $_POST['arg4'];
        $imag_min = $_POST['arg5'];
        $imag_max = $_POST['arg6'];

        $args = join(' ', array($width,$height,$real_min,$real_max,$imag_min,$imag_max));
        do_mandel($args);
        break;

    case 'Matrix Multiplication':

       // $file_A = $_POST['file1'];
       // $file_B = $_POST['file2'];
        $height = $_POST['mat_a_rows'];
        $width = $_POST['mat_a_cols'];
        $height2 = $_POST['mat_b_rows'];
        $width2 = $_POST['mat_b_cols'];

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

//        if(!move_uploaded_file($original_name_A,getcwd()."\\".$target_name_A)){
//            echo("no upload...");
//        }else{
//            echo("ok");
//        }
//        move_uploaded_file($original_name_B,$target_name_B);

        $args = join(' ', array($target_name_A,$height,$width,$target_name_B,$height2,$width2));
        do_matrix_mult($args);
        break;

    case 'Matrix Addition':

        //$file_A = $_POST['file1'];
        //$file_B = $_POST['file2'];
        $height = $_POST['mat_b_rows'];
        $width = $_POST['mat_b_cols'];


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
//        echo($target_name_A);echo("<br>");
//        echo(getcwd()."\\".$target_name_A);
//        if(!move_uploaded_file($original_name_A,getcwd()."\\".$target_name_A)){
//            echo("no upload...");
//        }else{
//            echo("ok");
//        }
//        move_uploaded_file($original_name_B,$target_name_B);

        $args = join(' ', array($target_name_A,$target_name_B,$height,$width));
        do_matrix_add($args);

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