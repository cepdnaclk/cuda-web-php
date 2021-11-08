<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> CUDA - Let's go parallel :D </title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
 $(function() {
		/* For zebra striping */
        $("table tr:nth-child(odd)").addClass("odd-row");
		/* For cell text alignment */
		$("table td:first-child, table th:first-child").addClass("first");
		/* For removing the last border */
		$("table td:last-child, table th:last-child").addClass("last");
});
</script>

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

/*
 * matrix_addition
 * matrix_det
 * matrix_eigen
 * matrix_inv
 * matrix_linear
 * matrix_lud
 * matrix_mult
 * matrix_express
 * */



if(empty($_POST)){
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

    case 'sort':

        //$file_A = $_POST['file1'];
        //$file_B = $_POST['file2'];
        $elements = $_POST['elems'];
        $type = $_POST['type'];


        $target_name_A = basename($_FILES['file1']['name']);
        //$target_name_B = basename($_FILES['file2']['name']);

        $tmp_name_A = $_FILES['file1']['tmp_name'];
        //$tmp_name_B = $_FILES['file2']['tmp_name'];

        $move_A = move_uploaded_file($tmp_name_A, $target_name_A);
        //$move_B = move_uploaded_file($tmp_name_B, $target_name_B);
        if(!$move_A){// || !$move_B){
            print_r($_FILES['file1']['error']);echo('<br>');
            print_r($_FILES['file2']['error']);echo('<br>');
        }

        $args = join(' ', array($target_name_A,$elements,$type));
        do_sorting($args);

        break;
    case 'matrix_mult':

       // $file_A = $_POST['file1'];
		//$file_B = $_POST['file2'];
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
    case 'matrix_det':

        // $file_A = $_POST['file1'];
        // $file_B = $_POST['file2'];
        $height = $_POST['mat_a_rows'];
//        $width = $_POST['mat_a_cols'];
//        $height2 = $_POST['mat_b_rows'];
//        $width2 = $_POST['mat_b_cols'];

        $target_name_A = basename($_FILES['file1']['name']);
//        $target_name_B = basename($_FILES['file2']['name']);

        $tmp_name_A = $_FILES['file1']['tmp_name'];
//        $tmp_name_B = $_FILES['file2']['tmp_name'];

        $move_A = move_uploaded_file($tmp_name_A, $target_name_A);
//        $move_B = move_uploaded_file($tmp_name_B, $target_name_B);
        if(!$move_A ){//|| !$move_B){
            print_r($_FILES['file1']['error']);echo('<br>');
//            print_r($_FILES['file2']['error']);echo('<br>');
        }

//        if(!move_uploaded_file($original_name_A,getcwd()."\\".$target_name_A)){
//            echo("no upload...");
//        }else{
//            echo("ok");
//        }
//        move_uploaded_file($original_name_B,$target_name_B);

        $args = join(' ', array($target_name_A,$height));
        do_matrix_det($args);
        break;
    case 'matrix_inv':

        // $file_A = $_POST['file1'];
        // $file_B = $_POST['file2'];
        $height = $_POST['mat_a_rows'];
//        $width = $_POST['mat_a_cols'];
//        $height2 = $_POST['mat_b_rows'];
//        $width2 = $_POST['mat_b_cols'];

        $target_name_A = basename($_FILES['file1']['name']);
//        $target_name_B = basename($_FILES['file2']['name']);

        $tmp_name_A = $_FILES['file1']['tmp_name'];
//        $tmp_name_B = $_FILES['file2']['tmp_name'];

        $move_A = move_uploaded_file($tmp_name_A, $target_name_A);
//        $move_B = move_uploaded_file($tmp_name_B, $target_name_B);
        if(!$move_A ){//|| !$move_B){
            print_r($_FILES['file1']['error']);echo('<br>');
//            print_r($_FILES['file2']['error']);echo('<br>');
        }

//        if(!move_uploaded_file($original_name_A,getcwd()."\\".$target_name_A)){
//            echo("no upload...");
//        }else{
//            echo("ok");
//        }
//        move_uploaded_file($original_name_B,$target_name_B);

        $args = join(' ', array($target_name_A,$height));
        do_matrix_inv($args);
        break;
    case 'matrix_eigen':

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
    case 'matrix_linear':

        // $file_A = $_POST['file1'];
        // $file_B = $_POST['file2'];
        $height = $_POST['mat_a_rows'];
//        $width = $_POST['mat_a_cols'];
//        $height2 = $_POST['mat_b_rows'];
//        $width2 = $_POST['mat_b_cols'];

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

        $args = join(' ', array($target_name_A,$target_name_B,$height));
        do_matrix_linear($args);
        break;
    case 'matrix_lud':

        // $file_A = $_POST['file1'];
        // $file_B = $_POST['file2'];
        $height = $_POST['mat_a_rows'];
        //$width = $_POST['mat_a_cols'];
        //$height2 = $_POST['mat_b_rows'];
        //$width2 = $_POST['mat_b_cols'];

        $target_name_A = basename($_FILES['file1']['name']);
       // $target_name_B = basename($_FILES['file2']['name']);

        $tmp_name_A = $_FILES['file1']['tmp_name'];
       // $tmp_name_B = $_FILES['file2']['tmp_name'];

        $move_A = move_uploaded_file($tmp_name_A, $target_name_A);
       // $move_B = move_uploaded_file($tmp_name_B, $target_name_B);
        if(!$move_A ){//|| !$move_B){
            print_r($_FILES['file1']['error']);echo('<br>');
//            print_r($_FILES['file2']['error']);echo('<br>');
        }

//        if(!move_uploaded_file($original_name_A,getcwd()."\\".$target_name_A)){
//            echo("no upload...");
//        }else{
//            echo("ok");
//        }
//        move_uploaded_file($original_name_B,$target_name_B);

        $args = join(' ', array($target_name_A,$height,$target_name_B));
        do_matrix_lud($args);
        break;
    case 'matrix_express':



        //print_r($_POST);

        if(file_exists($_FILES['file1']['tmp_name']) ){

            $tmp_name_A = $_FILES['file1']['tmp_name'];
            $target_name_A = basename($_FILES['file1']['name']);
            $move_A = move_uploaded_file($tmp_name_A, $target_name_A);


            $height_a = $_POST['mat_a_rows'];
            $width_a = $_POST['mat_a_cols'];

        }else{

            $target_name_A = "NULL";
            $height_a = 0;
            $width_a = 0;
        }

        if(file_exists($_FILES['file2']['tmp_name']) ){

            $tmp_name_B = $_FILES['file2']['tmp_name'];
            $target_name_B = basename($_FILES['file2']['name']);
            $move_B = move_uploaded_file($tmp_name_B, $target_name_B);

            $height_b = $_POST['mat_b_rows'];
            $width_b = $_POST['mat_b_cols'];

        }else{
            $target_name_B = "NULL";
            $height_b = 0;
            $width_b = 0;
        }

        if(file_exists($_FILES['file3']['tmp_name']) ){

            $tmp_name_C = $_FILES['file3']['tmp_name'];
            $target_name_C = basename($_FILES['file3']['name']);
            $move_C = move_uploaded_file($tmp_name_C, $target_name_C);


            $height_c = $_POST['mat_c_rows'];
            $width_c = $_POST['mat_c_cols'];

        }else{
            $target_name_C = "NULL";
            $height_c = 0;
            $width_c = 0;
        }

        if(file_exists($_FILES['file4']['tmp_name']) ){

            $tmp_name_D = $_FILES['file4']['tmp_name'];
            $target_name_D = basename($_FILES['file4']['name']);
            $move_D = move_uploaded_file($tmp_name_D, $target_name_D);


            $height_d = $_POST['mat_d_rows'];
            $width_d = $_POST['mat_d_cols'];

        }else{
            $target_name_D = "NULL";
            $height_d = 0;
            $width_d = 0;
        }

         if(file_exists($_FILES['file5']['tmp_name']) ){

             $tmp_name_E = $_FILES['file5']['tmp_name'];
             $target_name_E = basename($_FILES['file5']['name']);
             $move_E = move_uploaded_file($tmp_name_E, $target_name_E);


             $height_e = $_POST['mat_e_rows'];
             $width_e = $_POST['mat_e_cols'];

        }else{
             $target_name_E = "NULL";
             $height_e = 0;
             $width_e = 0;
         }

        $expression = $_POST['expression'];

        //$file_A = $_POST['file1'];
        //$file_B = $_POST['file2'];
//        $height_b = $_POST['mat_b_rows'];

//
//        $target_name_C = basename($_FILES['file3']['name']);
//        $target_name_D = basename($_FILES['file4']['name']);
//        $target_name_E = basename($_FILES['file5']['name']);


//        if(!$move_A || !$move_B){
//            print_r($_FILES['file1']['error']);echo('<br>');
//            print_r($_FILES['file2']['error']);echo('<br>');
//        }

        $args = join(' ', array($target_name_A,$height_a,$width_a,$target_name_B,$height_b,$width_b,$target_name_C,$height_c,$width_c,$target_name_D,$height_d,$width_d,$target_name_E,$height_e,$width_e,'"'.$expression.'"'));
        do_matrix_express($args);

        break;
    default:
        $args = 'None';
        echo('deafult');
        break;

}

//echo($args);



?>

<br><h2>Go <a href="../../index.php">Back</a> Do another calculation</h2></br>
</body>
</html>
