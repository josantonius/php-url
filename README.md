# PHP Url library

[![Latest Stable Version](https://poser.pugx.org/josantonius/url/v/stable)](https://packagist.org/packages/josantonius/url) [![Total Downloads](https://poser.pugx.org/josantonius/url/downloads)](https://packagist.org/packages/josantonius/url) [![Latest Unstable Version](https://poser.pugx.org/josantonius/url/v/unstable)](https://packagist.org/packages/josantonius/url) [![License](https://poser.pugx.org/josantonius/url/license)](https://packagist.org/packages/josantonius/url) [![Travis](https://travis-ci.org/Josantonius/PHP-Url.svg)](https://travis-ci.org/Josantonius/PHP-Url)

[Versión en español](README-ES.md)

Library for urls manipulation.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Available Methods](#available-methods)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install PHP Url library, simply:

    $ composer require Josantonius/Url

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, exceptions not used, docs...) you can use:

    $ composer require Josantonius/Url --prefer-source

Or you can also clone the complete repository with Git:

	$ git clone https://github.com/Josantonius/PHP-Url.git

### Requirements

This library is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

### Quick Start and Examples

To use this class, simply:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Url\Url;
```

### Available Methods

Available methods in this library:

```php
Url::getCurrentPage();
Url::getProtocol();
Url::isSSL();
Url::getDomain();
Url::getUri();
Url::getUriMethods();
Url::getPort();
Url::addBackslash();
Url::previous();
Url::redirect();
Url::autoLink();
Url::generateSafeSlug();
Url::segmentUri();
Url::getFirstSegment();
Url::getLastSegment();
Url::setUrlParams();
```

### Usage

Example of use for this library:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Url\Url;

print('<pre>'); 

var_dump(Url::getCurrentPage()); 
# string(35) "http://site.com:8081/user/login/"

var_dump(Url::getProtocol()); 	 
# string(4) "http"

var_dump(Url::isSSL()); 		 
# bool(false)

var_dump(Url::getDomain()); 	 
# string(9) "site.com"

var_dump(Url::getUri()); 		 
# string(14) "/user/login/"

var_dump(Url::getPort()); 		 
# string(4) "8081"

var_dump(Url::addBackslash('path/to/file'));   
# string(13) "path/to/file/"

var_dump(Url::autoLink('https://github.com')); 
# string(51) "<a href="https://github.com">https://github.com</a>"

var_dump(Url::autoLink('https://github.com', 'GitHub')); 
# string(39) "<a href="https://github.com">GitHub</a>"

var_dump(Url::generateSafeSlug('https://github.com')); 
# string(16) "https-github-com"

var_dump($segments = Url::segmentUri());
/*
array(2) {
  [0]=>
  string(5) "user"
  [1]=>
  string(6) "login"
}
*/
var_dump(Url::getFirstSegment($segments)); 
# string(5) "user"

var_dump(Url::getLastSegment($segments)); 
# string(6) "login"

print('</pre>'); 
```

### Tests 

To run [tests](tests/Url/Test) simply:

    $ git clone https://github.com/Josantonius/PHP-Url.git
    
    $ cd PHP-Url

    $ phpunit

### ☑ TODO

- [x] Create tests
- [ ] Improve documentation

### Contribute

1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).