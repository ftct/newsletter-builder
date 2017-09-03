<?php
require __DIR__ . '/vendor/autoload.php';

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

validateParametersCount($argv);

$htmlFilePath = $argv[1];
$cssFilePath = $argv[2];
$outputFilePath = $argv[3];

validateInputData($htmlFilePath, $cssFilePath);

$cssToInlineStyles = new CssToInlineStyles();

$html = file_get_contents($htmlFilePath);
$css = file_get_contents($cssFilePath);

$content = $cssToInlineStyles->convert(
    $html,
    $css
);

file_put_contents($outputFilePath, $content);

exit(0);

function validateParametersCount($parameters)
{
    if (count($parameters) != 4) {
        echo "Wrong number of parameters.
        Usage: convert_to_flat_css.php path.html path.css
          - path.html - path to file with html
          - path.css - path to css file
          - output.html - path and name where to save output file
    ";
        exit(1);
    }
}

function validateInputData($htmlFilePath, $cssFilePath)
{
    if (!file_exists($htmlFilePath)) {
        echo "Can not find html file.";
        exit(1);
    }

    if (!file_exists($cssFilePath)) {
        echo "Can not find css file.";
        exit(1);
    }
}
