<?php

require_once('includes/three_cones.class');

$d = filter_var($_REQUEST['distance'],FILTER_VALIDATE_INT,array('min_range' => 100, 'max_range' => 5000));
$th1 = filter_var($_REQUEST['angle-one'],FILTER_VALIDATE_INT,array('min_range' => 0, 'max_range' => 90));
$th2 = filter_var($_REQUEST['angle-two'],FILTER_VALIDATE_INT,array('min_range' => 0, 'max_range' => 90));
$th3 = filter_var($_REQUEST['angle-three'],FILTER_VALIDATE_INT,array('min_range' => 0, 'max_range' => 90));

//need good way to sanitize & validate
$type = isset($_REQUEST['type'])?$_REQUEST['type']:'html';

$solver = new ThreeConeSolver();

if($d && $th1 && $th2 && $th3){
    $solver->solve($d,$th1,$th2,$th3);
}else{
    $solver->status = 100;
}

if($type == ''){
    print $solver->z_ft;
}else{
    include "content/results.$type.php";
}
?>
