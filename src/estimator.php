<?php
include_once "impact.php";
include_once "severeImpact.php";

function covid19ImpactEstimator($data)
{
  
  $data = json_encode($data);
  $data = json_decode($data);

  //normalise duration
  $duration = 0;
  switch($data->periodType){
    case "days":
      $duration = $data->timeToElapse;
      break;
    case "weeks":
      $duration = $data->timeToElapse * 7;
      break;
    case "month":
      $duration = $data->timeToElapse * 30;
      break;
    default:
      echo "unknown period type";
    }
  //calculate impact
  $impact = new Impact($data->reportedCases, $duration, $data->totalHospitalBeds, $data->region->avgDailyIncomeInUSD, $data->region->avgDailyIncomePopulation);

  //calculate severe impact
  $severeImpact = new SevereImpact($data->reportedCases, $duration, $data->totalHospitalBeds, $data->region->avgDailyIncomeInUSD, $data->region->avgDailyIncomePopulation);
  // print_r($severeImpact);

  //combine output
  $output = [$data, $impact, $severeImpact];

  $data = json_encode($output);  
  
  return $data;
}
