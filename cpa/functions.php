<?php
/**
 * Created by PhpStorm.
 * User: fawzan
 * Date: 11/23/13
 * Time: 11:07 PM
 */

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


function cpa($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-7.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any
    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br><h1>COMMAND : </h1>");
    echo("<h1>./cpa.out $args > outcpa.txt 2>log.txt</h1>");
    echo("<br>");

	$marker = "marker.txt";
	while(1){
		if(!file_exists($marker)){
		$fh = fopen($marker,'w');
		system("./cpa.out $args > outcpa.txt 2>log.txt");        // do system command;
		unlink($marker);
		break;
		}else{
		echo '.';continue;
		}	
	}
	
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
		    echo("<h1 id='output'><a id='output' href='answer.php'>output</a></h1>");
		    echo("<h1 id='output'><a id='output' href='outcpa.txt'>output.txt</a></h1>");

	}

    echo("<br>");



}

function do_matrix_mult($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-6.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br>COMMAND : ");
    echo("./multiplication.exe $args mat_mul_out.txt 2>log.txt");
    echo("<br>");

   $marker = "marker.txt";
	while(1){
		if(!file_exists($marker)){
		$fh = fopen($marker,'w');
		system("./multiplication.exe $args outmat.txt 2>log.txt");        // do system command;
		unlink($marker);
		break;
		}else{
		echo '.';continue;
		}	
	}

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
		    echo("<h1 id='output'><a id='output' href='outmat.txt'>output matrix</a></h1>");

	}

    echo("<br>");


}

function do_matrix_lud($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-6.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br>COMMAND : ");
    echo("./lu_decompese.exe $args L_matrix.txt U_matrix.txt 2>log.txt");
    echo("<br>");

    $marker = "marker.txt";
    while(1){
        if(!file_exists($marker)){
            $fh = fopen($marker,'w');
            system("./lu_decompese.exe $args L_matrix.txt U_matrix.txt 2>log.txt");        // do system command;
            unlink($marker);
            break;
        }else{
            echo '.';continue;
        }
    }

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
        echo("<h1 id='output'><a id='output' href='L_matrix.txt'>L_matrix.txt</a></h1>");
        echo("<h1 id='output'><a id='output' href='U_matrix.txt'>U_matrix.txt</a></h1>");

    }

    echo("<br>");


}

function do_matrix_linear($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-6.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br>COMMAND : ");
    echo("./linear.exe $args mat_lin_out.txt 2>log.txt");
    echo("<br>");

    $marker = "marker.txt";
    while(1){
        if(!file_exists($marker)){
            $fh = fopen($marker,'w');
            system("./linear.exe $args mat_lin_out.txt 2>log.txt");        // do system command;
            unlink($marker);
            break;
        }else{
            echo '.';continue;
        }
    }

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
        echo("<h1 id='output'><a id='output' href='mat_lin_out.txt'>output matrix</a></h1>");

    }

    echo("<br>");


}

function do_matrix_det($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-6.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br>COMMAND : ");
    echo("./determinant.exe $args mat_det_out.txt 2>log.txt");
    echo("<br>");

    $marker = "marker.txt";
    while(1){
        if(!file_exists($marker)){
            $fh = fopen($marker,'w');
            system("./determinant.exe $args mat_det_out.txt 2>log.txt");        // do system command;
            unlink($marker);
            break;
        }else{
            echo '.';continue;
        }
    }

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
        echo("<h1 id='output'><a id='output' href='mat_det_out.txt'>output </a></h1>");

    }

    echo("<br>");


}



function do_matrix_inv($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-6.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value

    echo("<br>COMMAND : ");
    echo("./inverse.exe $args mat_inv_out.txt 2>log.txt");
    echo("<br>");

    $marker = "marker.txt";
    while(1){
        if(!file_exists($marker)){
            $fh = fopen($marker,'w');
            system("./inverse.exe $args mat_inv_out.txt 2>log.txt");        // do system command;
            unlink($marker);
            break;
        }else{
            echo '.';continue;
        }
    }

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
        echo("<h1 id='output'><a id='output' href='mat_inv_out.txt'>output matrix</a></h1>");

    }

    echo("<br>");


}

function do_matrix_express($args){

    $saved = getenv("LD_LIBRARY_PATH");        // save old value
    $newld = "/usr/local/cuda-6.5/lib64";  // extra paths to add
    if ($saved) { $newld .= ":$saved"; }           // append old paths if any

    putenv("LD_LIBRARY_PATH=$newld");        // set new value


    echo("<br><h1>COMMAND : </h1>");
    echo("<h1>./expression.exe $args mat_express_out.txt 2>'log.txt'</h1>");
    echo("<br>");

    $marker = "marker.txt";
    while(1){
        if(!file_exists($marker)){
            $fh = fopen($marker,'w');
            system("./expression.exe $args mat_express_out.txt 2>'log.txt'");        // do system command;
            unlink($marker);
            break;
        }else{
            echo '.';continue;
        }
    }

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
        echo("<h1 id='output'><a id='output' href='mat_express_out.txt'>output matrix</a></h1>");

    }

    echo("<br>");


}
