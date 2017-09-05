Description
===========
Newsletter builder is collection of simple scripts which preparing html ready to be sent by email.

- converting markdown definition to html
- converting styles to inline ones
- injecting images to html

Instalation
===========

# Install pandoc (a universal document converter) <https://pandoc.org/installing.html>

- Macos: `brew install pandoc`
- Linux: `apt-get install pandoc`

# Install ccs flat converter: (requirements - php >= 5.5 installed)

```bash
  cd vendors/css_flat/
  wget https://getcomposer.org/composer.phar
  php composer.phar install
```

Usage:
======

modify content.md
execute `build.sh`
open `output/content_ready.html` and paste to your email.

send and enjoy ;)
