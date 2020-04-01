<?php function printArray($myArray){
    foreach($myArray as $element){
        print $element.'*' ;
    }
    }
$classroom = "EGR_223_SECTIONA"  ;
printArray(explode("_",$classroom,)) ;
?>