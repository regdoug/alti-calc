<?php
//This is called calculate.php, but checkthevariables.php would be more descriptive
require_once('includes/three_cones.class');

/*
 * CONSTANTS
 */
$default_result_type = 'html';

/*
 * REQUIRED VARIABLES
 *
 * This is just a pre-validation to filter out totally ridiculous values
 * More complicated validation should be performed by ThreeConeSolver
 */

//The default value is zero b/c that is false
$d = isset($_REQUEST['distance'])?$_REQUEST['distance']:0;
$th1 = isset($_REQUEST['angle-one'])?$_REQUEST['angle-one']:0;
$th2 = isset($_REQUEST['angle-two'])?$_REQUEST['angle-two']:0;
$th3 = isset($_REQUEST['angle-three'])?$_REQUEST['angle-three']:0;

$d = filter_var($d,FILTER_VALIDATE_INT,array('min_range' => 100, 'max_range' => 5000));
$th1 = filter_var($th1,FILTER_VALIDATE_INT,array('min_range' => 1, 'max_range' => 90));
$th2 = filter_var($th2,FILTER_VALIDATE_INT,array('min_range' => 1, 'max_range' => 90));
$th3 = filter_var($th3,FILTER_VALIDATE_INT,array('min_range' => 1, 'max_range' => 90));

/*
 * NON-REQUIRED VARIABLES
 *
 * Type must be all lowercase letters.
 * The guesses must be positive integers.
 */
$type = (isset($_REQUEST['type'])
        && preg_match('/[a-z]+/',$_REQUEST['type']))
        ?$_REQUEST['type']:$default_result_type;

$guess_lo = isset($_REQUEST['guess-lo'])?$_REQUEST['guess-lo']:0;
$guess_hi = isset($_REQUEST['guess-hi'])?$_REQUEST['guess-hi']:0;

//$guess_lo = filter_var($guess_lo,FILTER_VALIDATE_INT,array('min_range' => 1));
//$guess_hi = filter_var($guess_hi,FILTER_VALIDATE_INT,array('min_range' => 1));

//for debugging
if($type=='plain'){
    header('Content-Type: text/plain');
}

ob_start();
$solver = new ThreeConeSolver();

if($d && $th1 && $th2 && $th3){
    if($guess_lo && $guess_hi){
        //TODO: warn the user if they tried to use guesses and one was rejected
        $solver->solve($d,$th1,$th2,$th3,$guess_lo,$guess_hi);
    }else{
        $solver->solve($d,$th1,$th2,$th3);
    }
}else{
    $solver->status = 100;
}
($type=='plain')?ob_end_flush():ob_end_clean();

if($type == '' || $type == 'plain'){
    print "\n".$solver->z_ft;
}else{
    include "content/results.$type.php";
}
?>
