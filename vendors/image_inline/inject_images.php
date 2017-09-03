<?php

$inputFilePath = "./output/content_inline.html";

$content = file_get_contents($inputFilePath);

$doc = new DOMDocument();
$doc->loadHTML($content);
$tags = $doc->getElementsByTagName('img');
foreach ($tags as $tag) {
    $imgUrl = "./images/" . $tag->getAttribute('src'); //Little path hack for prototype
    $imageType = mime_content_type($imgUrl);     //getImageType($imgUrl);
    $inlineImage = base64_encode(file_get_contents($imgUrl));
    $tag->setAttribute('src', "data:$imageType;base64," . $inlineImage);
}
$doc->save("./output/content_ready.html");
