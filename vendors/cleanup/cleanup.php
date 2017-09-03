<?php

$inputFilePath = "./output/content_ready.html";

$content = file_get_contents($inputFilePath);

// remove head from html
$position = strpos($content, "<body");
$contentOut = substr($content, $position);

$contentOut = str_replace("</html>", "", $contentOut);
$contentOut = str_replace("<body", "<div", $contentOut);
$contentOut = str_replace("</body>", "</div>", $contentOut);

file_put_contents($inputFilePath, $contentOut);
