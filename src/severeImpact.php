<?php
class SevereImpact{
    public $currentlyInfected;
    public $infectionsByRequestedTime;

    public function __construct($reportedCases, $duration){
        $this->currentlyInfected = $reportedCases * 50;
        $this->infectionsByRequestedTime = $this->currentlyInfected * (2 ** floor($duration / 3));
    }

}
?>