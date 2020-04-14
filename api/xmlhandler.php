<?php
include "src/estimator.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST)){
        $json = json_decode(covid19ImpactEstimator($_POST));
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        array_walk_recursive($json, array($xml, 'addChild'));
        exit($xml->asXML());
    }
}else{
   exit(json_encode(array("status"=>"error"))); 
}
?>