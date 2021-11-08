<?php
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

?>