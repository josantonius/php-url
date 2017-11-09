# PHP Url library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Url/v/stable)](https://packagist.org/packages/josantonius/Url) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Url/v/unstable)](https://packagist.org/packages/josantonius/Url) [![License](https://poser.pugx.org/josantonius/Url/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/769a69c9700f49ff9247e1075b737d99)](https://www.codacy.com/app/Josantonius/PHP-Url?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Url&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Url/downloads)](https://packagist.org/packages/josantonius/Url) [![Travis](https://travis-ci.org/Josantonius/PHP-Url.svg)](https://travis-ci.org/Josantonius/PHP-Url) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Url/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Url)

[Versión en español](README-ES.md)

Library for urls manipulation.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Url library**, simply:

    $ composer require Josantonius/Url

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require Josantonius/Url --prefer-source

You can also **clone the complete repository** with Git:

  $ git clone https://github.com/Josantonius/PHP-Url.git

Or **install it manually**:

[Download Url.php](https://raw.githubusercontent.com/Josantonius/PHP-Url/master/src/Url.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Url/master/src/Url.php

## Available Methods

Available methods in this library:

### - Get URL from the current page:

```php
Url::getCurrentPage();
```

**# Return** (string) → current URL

### - Get base URL of the site:

```php
Url::getBaseUrl();
```

### - Get protocol from current or passed URL:

```php
Url::getProtocol($url);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | URL from which to obtain protocol. | string | No | false |

**# Return** (string) → http or https

### - Check if it is a secure site (SSL):

```php
Url::isSSL($url);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | URL to check protocol. | string | No | false |

**# Return** (boolean)

### - Get the server name:

```php
Url::getDomain($url);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | URL to get domain. | string | No | false |

**# Return** (string|false) → server name or false

### - Get URI:

```php
Url::getUri();
```

**# Return** (string) → path/URL

### - Remove subdirectories from uri if they exist:

```php
Url::getUriMethods();
```

**# Return** (string) → method1/method2/method3

### - Set parameters from the url and return url without them:

If a url is received as: http://www.web.com/&key=value&key-2=value params will be saved as GET values and return: http://www.web.com/.

If a url is received as: http://www.web.com/?key=value&key-2=value GET parameters are maintained and return: http://www.web.com/.

```php
Url::setUrlParams($url);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | URL to get params. | string | No | false |

**# Return** (string|false) → URL without parameters

### - Get the server port:

```php
Url::getPort();
```

**# Return** (int) → server port

### - Add backslash if it does not exist at the end of the route:

```php
Url::addBackslash($uri, $position);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $uri | URI when add backslash. | string | Yes | |
| $position | Place where the backslash is placed: 'top', 'end' or 'both'. | string | No | 'end' |

**# Return** (string) → path/url/ | /path/url | /path/url/

### - Go to the previous url:

```php
Url::previous();
```

**# Return** (void)

### - Redirect to chosen url:

```php
Url::redirect($url);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | The URL to redirect. | string | Yes | |

**# Return** (void)

### - Converts plain text urls into HTML links:

Second argument will be used as the url label `<a href=''>$custom</a>`.

```php
Url::autoLink($url, $custom);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | URL where link. | string | Yes | |
| $custom | If provided, this is used for the link label. | string | No | null |

**# Return** (string) → returns the data with links created around urls

### - This function converts and url segment to an safe one:

For example: `test name @132` will be converted to `test-name--123`.

It will also return all letters in lowercase.

```php
Url::generateSafeSlug($slug);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $slug | URL slug to clean up. | string | Yes | |

**# Return** (string) → slug

### - Get all url parts based on a / seperator:

```php
Url::segmentUri($uri);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $uri | URI to segment. | string | No | null |

**# Return** (string) → segments

### - Get first item segment:

```php
Url::getFirstSegment($segments);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $segments | Segments. | mixed | Yes | |

**# Return** (string) → segment

### - Get last item segment:

```php
Url::getLastSegment($segments);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $segments | Segments. | mixed | Yes | |

**# Return** (string) → segment

## Quick Start

To use this library with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Url\Url;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/Url.php';

use Josantonius\Url\Url;
```

## Usage

Example of use for this library:

### - Get URL from the current page:

```php
Url::getCurrentPage();
```

### - Get base URL of the site:

```php
Url::getBaseUrl();
```

### - Get protocol from URL:

```php
Url::getProtocol();

Url::getProtocol('https://josantonius.com/developer/');
```

### - Check if it is a secure site (SSL):

```php
Url::isSSL();

Url::isSSL('https://josantonius.com/developer/');
```

### - Get the server name:

```php
Url::getDomain();

Url::getDomain('https://josantonius.com/developer/');
```

### - Get URI:

```php
Url::getUri();
```

### - Remove subdirectories from URI if they exist:

```php
Url::testGetUriMethods();
```

### - Set parameters from the URL and return URL without them:

```php
Url::setUrlParams();

Url::setUrlParams('https://josantonius.com?param-1=value&param-2=value');

Url::setUrlParams('https://josantonius.com/&param-1=value&param-2=value');
```

### - Get the server port:

```php
Url::getPort();
```

### - Add backslash if it does not exist at the end of the route:

```php
Url::addBackslash('https://josantonius.com');

Url::addBackslash('https://josantonius.com', 'end');
```

### - Add backslash if it does not exist at the top of the route:

```php
Url::addBackslash('josantonius.com', 'top');
```

### - Add backslash if it doesn't exist at the top and end of the route:

```php
Url::addBackslash('josantonius.com', 'both');
```

### - Go to the previous URL:

```php
Url::previous();
```

### - Redirect to chosen URL:

```php
Url::redirect('https://josantonius.com/');
```

### - Converts plain text URLS into HTML links:

```php
Url::autoLink('https://josantonius.com');
```

### - Converts plain text URLS into HTML links with custom name:

```php
Url::autoLink('https://josantonius.com', 'Josantonius');
```

### - Converts and URL segment to an safe one:

```php
Url::generateSafeSlug('https://josantonius.com');
```

### - Get all URL parts based on a / seperator:

```php
Url::segmentUri('/josantonius/developer/');
```

### - Get first item segment from string:

```php
Url::getFirstSegment('/josantonius/developer/');
```

### - Get first item segment from array:

```php
$segments = ['josantonius', 'developer'];

Url::getLastSegment($segments);
```

### - Get last item segment from string:

```php
Url::getLastSegment('/josantonius/developer/');
```

### - Get last item segment from array:

```php
$segments = ['josantonius', 'developer'];

Url::getFirstSegment($segments);
```

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Josantonius/PHP-Url.git
    
    $ cd PHP-Url

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add new feature
- [ ] Improve tests
- [ ] Improve documentation
- [ ] Refactor code

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Josantonius/PHP-Url/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repository

The file structure from this repository was created with [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).