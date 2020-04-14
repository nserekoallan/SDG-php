<?php
include "src/estimator.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST)){
        exit(covid19ImpactEstimator($_POST));
    }
}else{
   exit(json_encode(array("status"=>"error"))); 
}
?>