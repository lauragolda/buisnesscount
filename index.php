<?php

require_once "vendor/autoload.php";
require_once "vendor/autoload.php";
use App\Search;
use App\Company;

$csv = new Search();
$csv->formatCSV('register.csv');
$csv->setLimit(0, 30);
$records = $csv->getRecords();

$companies = [];

foreach($records as $record) {
    $companies []= new Company($record["name"], $record["regcode"]);
}

echo "1. Search by registration code" . PHP_EOL;
echo "2. Search by company name" . PHP_EOL;
echo "3. Show las 30 companies" . PHP_EOL;


$answer = readline();

if($answer == "1") {
    $registrationCode = readline("Enter registration code: ");
    foreach ($companies as $company) {
        if ($company->getRegistrationCode() == $registrationCode) {
            echo "{$company->getRegistrationCode()} | {$company->getName()}" . PHP_EOL;
        }
    }
} else if ($answer == "2") {
    $companyName = readline("Company name: ");
    foreach ($companies as $company) {
        if ($company->getName() == $companyName) {
            echo "{$company->getRegistrationCode()} | {$company->getName()}" . PHP_EOL;
        }
    }
} else if ($answer == "3") {
    foreach ($companies as $company) {
        echo "{$company->getRegistrationCode()} | {$company->getName()}" . PHP_EOL;
    }
} else {
    echo "Error, incorrect choice";
    exit;
}
