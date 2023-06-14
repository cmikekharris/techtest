<?php
namespace Techtest;

class Utils
{
    const TITLES = [
        'Mr',
        'Mister',
        'Dr',
        'Doctor',
        'Mrs',
        'Ms',
        'Miss',
        'Prof',
        'Professor'
    ];

    const REPLACE = [
        'Mister' => 'Mr',
        'Doctor' => 'Dr',
        'Professor' => 'Prof',
        '&' => 'and',
        '.' => ''
    ];

    const EXCLUDE = [
        'homeowner',
        ' ',
        ''
    ];

    static function printHelp(): void
    {
        echo "\nRun with : `php go.php -f path/to/filename.csv`\n\n";
    }

    static function getShortRecord(array $parts): Record|null
    {
        if(count($parts) > 1 && in_array(trim($parts[0]), self::TITLES)) {
            $secondPerson = explode(' ', $parts[1]);
            $surname = end($secondPerson);

            return new Record(
                [
                    'title' => trim($parts[0]),
                    'first_name' => '',
                    'initial' => '',
                    'last_name' => $surname
                ]
            );
        }

        return null;
    }

    static function getRecord(string $person)
    {
        $personParts = explode(' ', $person);

        if(count($personParts) > 1) {
            return new Record(
                [
                    'title' => reset($personParts),
                    'first_name' => (strlen($personParts[1]) > 1 && count($personParts) > 2) ? $personParts[1] : '',
                    'initial' => (strlen($personParts[1]) === 1) ? $personParts[1] : '',
                    'last_name' => end($personParts)
                ]
            );
        }

        return null;
    }

    static function getFileName(): string|bool
    {
        $fileName = false;

        $options = getopt("f:");

        if(!empty($options["f"])) {
            $fileName = $options["f"];
        }

        return $fileName;
    }

    static function readCsvFileIntoArray(string $filePath): array
    {
        $fileContents = [];

        if (($handle = fopen($filePath, "r")) !== FALSE) {            
            while (($data = fgetcsv($handle, 0, ',')) !== FALSE) {
                $fileContents[] = $data;
            }

            fclose($handle);
        }

        return $fileContents;
    }

    static function sanitiseRow(string $row): string
    {
        foreach(self::REPLACE as $old => $new) {
            $row = str_replace($old, $new, $row);
        }

        return $row;
    }
}
