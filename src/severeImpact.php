<?php
class SevereImpact{
    public $currentlyInfected;
    public $infectionsByRequestedTime;
    public $hospitalBedsByRequestedTime;

    public function __construct($reportedCases, $duration, $totalHospitalBeds){
        $this->currentlyInfected = $reportedCases * 50;
        $this->infectionsByRequestedTime = $this->currentlyInfected * (2 ** floor($duration / 3));
        $this->severeCasesByRequestedTime = $this->infectionsByRequestedTime * (15 / 100);
        $this->severeCasesByRequestedTime = $this->infectionsByRequestedTime * (15 / 100);
        $this->hospitalBedsByRequestedTime = $totalHospitalBeds * (35 / 100) - $this->severeCasesByRequestedTime;
    }

}
?>