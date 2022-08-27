# PHP URL library

[![Latest Stable Version](https://poser.pugx.org/josantonius/url/v/stable)](https://packagist.org/packages/josantonius/url)
[![License](https://poser.pugx.org/josantonius/url/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/url/downloads)](https://packagist.org/packages/josantonius/url)
[![CI](https://github.com/josantonius/php-url/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-url/actions/workflows/ci.yml)
[![CodeCov](https://codecov.io/gh/josantonius/php-url/branch/main/graph/badge.svg)](https://codecov.io/gh/josantonius/php-url)
[![PSR1](https://img.shields.io/badge/PSR-1-f57046.svg)](https://www.php-fig.org/psr/psr-1/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR12](https://img.shields.io/badge/PSR-12-1abc9c.svg)](https://www.php-fig.org/psr/psr-12/)

**Translations**: [Español](.github/lang/es-ES/README.md)

PHP library to access URL information.

Provides an improved replacement for the access to the components of a URL offered by PHP's
`parse_url` and `pathinfo` functions.

This library does not format the provided URL, it only makes it easier to access the components.
For something more advanced you can use something like `league/uri-components`.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Classes](#available-classes)
  - [Url Class](#url-class)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#todo)
- [Changelog](#changelog)
- [Contribution](#contribution)
- [Sponsor](#sponsor)
- [License](#license)

---

## Requirements

This library is compatible with the PHP versions: 8.1.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP URL library**, simply:

```console
composer require josantonius/url
```

The previous command will only install the necessary files,
if you prefer to **download the entire source code** you can use:

```console
composer require josantonius/url --prefer-source
```

You can also **clone the complete repository** with Git:

```console
git clone https://github.com/josantonius/php-url.git
```

## Available Classes

### Url Class

`Josantonius\Url\Url`

Create a new instance:

```php
/**
 * If no URL is provided, the URL of the current page will be generated.
 * 
 * The generated URL will exclude ports 80 and 443 and include the rest.
 */
public function __construct(null|string $url = null);
```

Gets authority:

```php
/**
 * The authority, in "[user-info@][host][:port]" format.
 *
 * @var string URL authority or empty string.
 */
public readonly string $authority;
```

Gets the base URL:

```php
/**
 * The base URL, in "[scheme:][//domain][:port]" format.
 *
 * @var string Base URL or empty string.
 */
public readonly string $base;
```

Gets the path basename:

```php
/**
 * The path basename, in "[filename][.extension]" format.
 *
 * @var string URL path basename or empty string.
 */
public readonly string $basename;
```

Gets the path dirname:

```php
/**
 * The path dirname, in "[dirname]" format.
 *
 * @var string URL path dirname or empty string.
 */
public readonly string $dirname;
```

Gets the path basename extension:

```php
/**
 * The path basename extension, in "[extension]" format.
 *
 * @var string URL path basename extension or empty string.
 */
public readonly string $extension;
```

Gets the path filename:

```php
/**
 * The path filename, in "[filename]" format.
 *
 * @var string URL path filename or empty string.
 */
public readonly string $filename;
```

Gets fragment:

```php
/**
 * URL fragment in "[fragment]" format.
 *
 * @var string URL fragment or empty string.
 */
public readonly string $fragment;
```

Gets the full URL:

```php
public readonly string $full;
```

Gets hashed fragment:

```php
/**
 * URL hashed fragment in "[#fragment]" format.
 *
 * @var string URL hashed fragment or empty string.
 */
public readonly string $hash;
```

Gets host:

```php
/**
 * URL host in "[subdomain.][domain][.tld]" format.
 *
 * @var string URL host or empty string.
 */
public readonly string $host;
```

Gets path:

```php
/**
 * URL path in "[path]" format.
 *
 * @var string URL path or empty string.
 */
public readonly string $path;
```

Gets the query parameters:

```php
/**
 * URL query parameters in array format.
 *
 * @var array<string, mixed> URL query parameters or empty string.
 */
public readonly array $parameters;
```

Gets password:

```php
/**
 * URL password in "[password]" format.
 *
 * @var string URL password or empty string.
 */
public readonly string $password;
```

Gets port:

```php
/**
 * URL port in "[port]" format.
 *
 * @var string URL port or empty string.
 */
public readonly int|string $port;
```

Gets scheme:

```php
/**
 * URL scheme in "[scheme]" format.
 *
 * @var string URL scheme or empty string.
 */
public readonly string $scheme;
```

Gets path segments:

```php
/**
 * URL path segments in array format.
 *
 * @var string[] URL path segments or empty string.
 */
public readonly array $segments;
```

Gets query:

```php
/**
 * URL query in "[query]" format.
 *
 * @var string URL query or empty string.
 */
public readonly string $query;
```

Gets username:

```php
/**
 * URL username in "[username]" format.
 *
 * @var string URL username or empty string.
 */
public readonly string $username;
```

## Usage

Example of use for this library:

### Create a new instance using the current URL

```php
use Josantonius\Url\Url;

$url = new Url();
```

### Create a new instance using custom URL

```php
use Josantonius\Url\Url;

$url = new Url('https://domain.com');
```

### Gets authority

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com

$url->authority;  // "domain.com"


$url = new Url('https://user:pass@sub.domain.com:90/en/');

$url->authority; // "user:pass@sub.domain.com:90"


$url = new Url('https://user:pass@sub.domain.com/en/');

$url->authority; // "user:pass@sub.domain.com"


$url = new Url('https://sub.domain.com/en/');

$url->authority; // "sub.domain.com"
```

### Gets base URL

```php
use Josantonius\Url\Url;

$url = new Url(); // https://user:pass@domain.com:80/en/

$url->base; // "https://domain.com"


$url = new Url('https://domain.com:80/?tag=bug');

$url->base; // "https://domain.com:80"


$url = new Url('https://domain.com/en/');

$url->base; // "https://domain.com"
```

### Gets the path basename

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->basename; // "search.php"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->basename; // "search.php"


$url = new Url('https://domain.com/en/web/docs?tag=bug');

$url->basename; // "docs"
```

### Gets the path dirname

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->dirname; // "/"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->dirname; // "/en/web/docs"


$url = new Url('https://domain.com/en/web/docs?tag=bug');

$url->dirname; // "/en/web"
```

### Gets the path basename extension

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->extension; // "php"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->extension; // "php"


$url = new Url('https://domain.com/en/web/docs?tag=bug');

$url->extension; // ""
```

### Gets the path filename

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->filename; // "search"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->filename; // "search"


$url = new Url('https://domain.com/docs?tag=bug');

$url->filename; // "docs"
```

### Gets fragment

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com#top

$url->fragment; // "top"


$url = new Url('https://domain.com/en/web/docs#top');

$url->fragment; // "top"


$url = new Url('https://domain.com');

$url->fragment; // ""
```

### Gets the full URL

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com:80

$url->full;  // "https://domain.com"


$url = new Url('https://user:pass@sub.domain.com:90/en/');

$url->full; // "https://user:pass@sub.domain.com:90/en/"
```

### Gets hashed fragment

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com#top

$url->hash; // "#top"


$url = new Url('https://domain.com/en/web/docs#top');

$url->hash; // "#top"


$url = new Url('https://domain.com');

$url->hash; // ""
```

### Gets host

```php
use Josantonius\Url\Url;

$url = new Url(); // https://sub.domain.com

$url->host; // "sub.domain.com"


$url = new Url('https://sub.domain.com/en/web/docs#top');

$url->host; // "sub.domain.com"


$url = new Url('https://domain.com');

$url->host; // "domain.com"


$url = new Url('https://localhost');

$url->host; // "localhost"
```

### Gets path

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/en

$url->path; // "/en/web/docs/search.php"


$url = new Url('https://domain.com/en/web/docs/search.php');

$url->path; // "/en/web/docs/search.php"


$url = new Url('https://domain.com/en/web/docs/');

$url->path; // "/en/web/docs/"


$url = new Url('https://domain.com/en?tag=bug');

$url->path; // "/en"


$url = new Url('https://domain.com?tag=bug');

$url->path; // ""
```

### Gets the query parameters

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/en?tag=bug&order=asc#top

$url->parameters; // ["tag" => "bug", "order" => "asc"]


$url = new Url('https://domain.com/en/web/docs/search.php');

$url->parameters; // ""
```

### Gets password

```php
use Josantonius\Url\Url;

$url = new Url(); // https://:pass@domain.com

$url->password; // "pass"


$url = new Url('https://user:pass@domain.com');

$url->password; // "pass"


$url = new Url('https://user@domain.com');

$url->password; // ""
```

### Gets port

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com:90

$url->port; // 90


$url = new Url(); // https://domain.com:80

$url->port; // ""


$url = new Url(); // https://domain.com:443

$url->port; // ""


$url = new Url('https://domain.com:80/en/');

$url->port; // 80


$url = new Url('https://domain.com:443/en/');

$url->port; // 443


$url = new Url('https://domain.com/en/');

$url->port; // ""
```

### Gets scheme

```php
use Josantonius\Url\Url;

$url = new Url(); // http://domain.com

$url->scheme; // "http"


$url = new Url('https://domain.com');

$url->scheme; // "https"
```

### Gets path segments

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com?tag=bug

$url->segments; // []


$url = new Url('https://domain.com/en/web/docs/search.php');

$url->segments; // ['en', 'web', 'docs', 'search.php']
```

### Gets query

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com?tag=bug

$url->query; // "tag=bug"


$url = new Url('https://domain.com?tag=bug&order=asc#top');

$url->query; // "tag=bug&order=asc"

$url = new Url('https://domain.com');

$url->query; // ""
```

### Gets username

```php
use Josantonius\Url\Url;

$url = new Url(); // https://user@domain.com

$url->username; // "user"


$url = new Url('https://:pass@domain.com');

$url->username; // ""


$url = new Url('https://user:pass@domain.com');

$url->username; // "user"


$url = new Url('https://domain.com');

$url->username; // ""
```

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/)
and to execute the following:

```console
git clone https://github.com/josantonius/php-url.git
```

```console
cd php-url
```

```console
composer install
```

Run unit tests with [PHPUnit](https://phpunit.de/):

```console
composer phpunit
```

Run code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

```console
composer phpcs
```

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

```console
composer phpmd
```

Run all previous tests:

```console
composer tests
```

## TODO

- [ ] Add new feature
- [ ] Improve tests
- [ ] Improve documentation
- [ ] Improve English translation in the README file
- [ ] Refactor code for disabled code style rules (see phpmd.xml and phpcs.xml)

## Changelog

Detailed changes for each release are documented in the
[release notes](https://github.com/josantonius/php-url/releases).

## Contribution

Please make sure to read the [Contributing Guide](.github/CONTRIBUTING.md), before making a pull
request, start a discussion or report a issue.

Thanks to all [contributors](https://github.com/josantonius/php-url/graphs/contributors)! :heart:

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2017-present, [Josantonius](https://github.com/josantonius#contact)
