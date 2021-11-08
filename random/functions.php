<?php
/**
 * Created by PhpStorm.
 * User: fawzan
 * Date: 11/23/13
 * Time: 11:07 PM
 */

function do_mandel($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-7.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br>COMMAND : ");
    echo("./mandelbrot.exe $args out.txt out.ppm 2>log.txt");
    echo("<br>");



    system("./mandelbrot.exe $args out.txt out.ppm 2>log.txt");        // do system command;


//    system("mandelbrot.exe $args out.txt out.ppm 2>p.txt");        // do system command;
    putenv("LD_LIBRARY_PATH=$saved");        // restore old value

    echo("<br>");

    if(filesize('log.txt')>0){

        $fh = fopen('log.txt', 'r');
        $theData = fread($fh, 100);
        fclose($fh);
        echo 'ERROR: '.$theData;
        echo '<br> See the HELP file for more info/ ';
        unlink('log.txt');

    }else{
        echo("<br>");
        echo("<a href='out.ppm' style='color: red; font-size: 20px;'>Output Image</a>");
        echo("<br>");
        echo("<a href='out.txt' style='color: red; font-size: 20px;'>Output Pixel Matrix</a>");

    }

    echo("<br>");



}

function do_random($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-7.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br>COMMAND : ");
    echo("./random.exe $args out.txt  file.txt 2>log.txt");
    echo("<br>");



    system("./random.exe $args file.txt 2>log.txt");        // do system command;


//    system("mandelbrot.exe $args out.txt out.ppm 2>p.txt");        // do system command;
    putenv("LD_LIBRARY_PATH=$saved");        // restore old value

    echo("<br>");

    if(filesize('log.txt')>0){

        $fh = fopen('log.txt', 'r');
        $theData = fread($fh, 100);
        fclose($fh);
        echo 'ERROR: '.$theData;
        echo '<br> See the HELP file for more info/ ';
        unlink('log.txt');

    }else{

        echo("<br>");
        echo("<a href='file.txt' style='color: red; font-size: 20px;'>Random Matrix</a>");

    }

    echo("<br>");



}

function formatArrayToTable($foo){

    //open table
    echo '<table class="imagetable">';

//our control variable
    $first = true;

    foreach($foo as $key1 => $val1) {
        //if first time through, we need a header row
        if($first){
            echo '<tr>';
            foreach($val1 as $key2 => $value2){
                echo '<th>'.$key2.'</th>';
            }
            echo '</tr>';

            //set control to false
            $first = false;
        }

        //echo out each object in the table
//        echo '<tr><td>'.$key1.'</td>';
        echo '<tr>';
        foreach($val1 as $key2 => $value2){
            echo '<td>'.$value2.'</td>';
        }
        echo '</tr>';
    }

    echo '</table>';

}
