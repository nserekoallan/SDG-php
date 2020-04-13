<?php
class SevereImpact{
    public $currentlyInfected;
    public $infectionsByRequestedTime;
    public $hospitalBedsByRequestedTime;
    public $casesForVentilatorsByRequestedTime;
    public $casesForICUByRequestedTime;
    public $dollarsInFlight;

    public function __construct($reportedCases, $duration, $totalHospitalBeds, $avgDailyIncomeInUSD ,$avgDailyIncomePopulation){
        $this->currentlyInfected = $reportedCases * 50;
        $this->infectionsByRequestedTime = $this->currentlyInfected * (2 ** floor($duration / 3));
        $this->severeCasesByRequestedTime = floor($this->infectionsByRequestedTime * (15 / 100));
        $this->hospitalBedsByRequestedTime = floor($totalHospitalBeds * (35 / 100) - $this->severeCasesByRequestedTime);
        $this->casesForICUByRequestedTime = floor((5 / 100) * $this->infectionsByRequestedTime);
        $this->casesForVentilatorsByRequestedTime = floor((2 / 100) * ($this->infectionsByRequestedTime));
        $this->dollarsInFlight = $this->infectionsByRequestedTime * $avgDailyIncomeInUSD * $avgDailyIncomePopulation * $duration;

    }

}
?>