<?php

validateParametersCount($argv);

$inputFilePath = $argv[1];
$outputFilePath = $argv[2];

validateInputData($inputFilePath);

$content = file_get_contents($inputFilePath);

$doc = new DOMDocument();
$doc->loadHTML($content);
$tags = $doc->getElementsByTagName('img');
foreach ($tags as $tag) {
    $imgUrl = './images/' . $tag->getAttribute('src');
    $imageType = mime_content_type($imgUrl);
    $inlineImage = base64_encode(file_get_contents($imgUrl));
    $tag->setAttribute('src', "data:$imageType;base64," . $inlineImage);
}
$doc->save($outputFilePath);


function validateParametersCount($parameters)
{
    if (count($parameters) != 3) {
        echo "Wrong number of parameters.
        Usage: inject_images.php input_path.html output_path.html
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
