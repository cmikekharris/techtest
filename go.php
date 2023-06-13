<?php

require 'vendor/autoload.php';

use Techtest\Record;
use Techtest\Utils;

Utils::printHelp();

$fileName = Utils::getFileName();
$records = [];
$output = [];

if($fileName) {
    $allRawData = Utils::readCsvFileIntoArray($fileName);

    for($i = 0; $i < count($allRawData); $i++) {
        foreach($allRawData[$i] as $row) {
            if(!in_array($row, Utils::EXCLUDE)) {
                $row = Utils::sanitiseRow($row);
                $parts = explode('and', $row);
                
                $records[] = Utils::getShortRecord($parts);
    
                foreach($parts as $part) {
                    $records[] = Utils::getRecord(trim($part));
                }
            }
        }
    }

    $records = array_filter($records);
}

foreach($records as $record) {
    $output[] = $record->outputToArray();
}

var_dump($output);

return 0;
