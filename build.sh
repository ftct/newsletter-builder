#!/bin/bash
echo "Converting md to html."
pandoc -s --section-divs  --css ../news.css -o ./output/content.html content.md
echo "  Done: content.html created."
echo "Injecting styles inline."
php vendors/css_flat/convert_to_flat_css.php ./output/content.html ./news.css ./output/content_inline.html
echo "  Done: content_inline.html created."
echo "Injecting images inside html."
php vendors/image_inline/inject_images.php
php vendors/cleanup/cleanup.php
echo "  Done: content_ready.html created."

echo "Generated \n";
