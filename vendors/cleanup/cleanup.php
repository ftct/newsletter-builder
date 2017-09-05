<?php

validateParametersCount($argv);

$inputFilePath = $argv[1];
$outputFilePath = $argv[2];

validateInputData($inputFilePath);

$content = file_get_contents($inputFilePath);

// remove head from html
$position = strpos($content, "<body");
$contentOut = substr($content, $position);

$contentOut = str_replace("</html>", "", $contentOut);
$contentOut = str_replace("<body", "<div", $contentOut);
$contentOut = str_replace("</body>", "</div>", $contentOut);

file_put_contents($outputFilePath, $contentOut);

function validateParametersCount($parameters)
{
    if (count($parameters) != 3) {
        echo "Wrong number of parameters.
        Usage: cleanup.php input_path.html output_path.html
          - input_path.html - path to file with input html
          - output_path.html - path to file where to save output file
    ";
        exit(1);
    }
}

function validateInputData($inputFilePath)
{
    if (!file_exists($inputFilePath)) {
        echo "Can not find html file.";
        exit(1);
    }
}
