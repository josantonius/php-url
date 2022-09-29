# CHANGELOG

## [v2.0.1](https://github.com/josantonius/php-url/releases/tag/v2.0.1) (2022-09-29)

* The notation type in the test function names has been changed from camel to snake case for readability.

* Functions were added to document the methods and avoid confusion.

* Disabled the ´CamelCaseMethodName´ rule in ´phpmd.xml´ to avoid warnings about function names in tests.

* The alignment of the asterisks in the comments has been fixed.

* Tests for Windows have been added.

* Tests for PHP 8.2 have been added.

## [v2.0.0](https://github.com/josantonius/php-url/releases/tag/v2.0.0) (2022-08-17)

> Version 1.x is considered as deprecated and unsupported.
> In this version (2.x) the library was completely restructured.
> It is recommended to review the documentation for this version and make the necessary changes
> before starting to use it, as it not be compatible with version 1.x.

---

* The library was completely refactored.

* Support for PHP version 8.1.

* Support for earlier versions of PHP **8.1** is discontinued.

* Improved documentation; `README.md`, `CODE_OF_CONDUCT.md`, `CONTRIBUTING.md` and `CHANGELOG.md`.

* Removed `Codacy`.

* Removed `PHP Coding Standards Fixer`.

* The `master` branch was renamed to `main`.

* The `develop` branch was added to use a workflow based on `Git Flow`.

* `Travis` is discontinued for continuous integration. `GitHub Actions` will be used from now on.

* Added `.github/CODE_OF_CONDUCT.md` file.
* Added `.github/CONTRIBUTING.md` file.
* Added `.github/FUNDING.yml` file.
* Added `.github/workflows/ci.yml` file.
* Added `.github/lang/es-ES/CODE_OF_CONDUCT.md` file.
* Added `.github/lang/es-ES/CONTRIBUTING.md` file.
* Added `.github/lang/es-ES/LICENSE` file.
* Added `.github/lang/es-ES/README` file.

* Deleted `.travis.yml` file.
* Deleted `.editorconfig` file.
* Deleted `CONDUCT.MD` file.
* Deleted `README-ES.MD` file.
* Deleted `.php_cs.dist` file.

## [1.2.1](https://github.com/josantonius/php-url/releases/tag/1.2.1) (2018-04-17)

* Bug fixed in `setUrlParams` method.

## [1.2.0](https://github.com/josantonius/php-url/releases/tag/1.2.0) (2018-02-22)

* Bugs fixed in `getBaseUrl` and `setUrlParams` method.

## [1.1.9](https://github.com/josantonius/php-url/releases/tag/1.1.9) (2018-01-07)

* The tests were fixed.

* Changes in documentation.

## [1.1.8](https://github.com/josantonius/php-url/releases/tag/1.1.8) (2017-11-12)

* Do more testings.
* Change the `addBackslash` method to `addBackSlash` method and refactoring.
* Fix command in composer.json will output the ERROR: The file "src,tests" does not exist.

* Added `Josantonius\Url\Tests\UrlTest::testGetProtocolWithUrl()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGetDomainWithDomain()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGetDomainWithInvalidDomain()` method.
* Added `Josantonius\Url\Tests\UrlTest::testAddBackSlashDefault()` method.

## [1.1.7](https://github.com/josantonius/php-url/releases/tag/1.1.7) (2017-11-09)

* Implemented `PHP Mess Detector` to detect inconsistencies in code styles.

* Implemented `PHP Code Beautifier and Fixer` to fixing errors automatically.

* Implemented `PHP Coding Standards Fixer` to organize PHP code automatically according to PSR standards.

## [1.1.6](https://github.com/josantonius/php-url/releases/tag/1.1.6) (2017-11-02)

* Implemented `PSR-4 autoloader standard` from all library files.

* Implemented `PSR-2 coding standard` from all library PHP files.

* Implemented `PHPCS` to ensure that PHP code complies with `PSR2` code standards.

* Implemented `Codacy` to automates code reviews and monitors code quality over time.

* Implemented `Codecov` to coverage reports.

* Added `Url/phpcs.ruleset.xml` file.

* Deleted `Url/src/bootstrap.php` file.

* Deleted `Url/tests/bootstrap.php` file.

* Deleted `Url/vendor` folder.

* Changed `Josantonius\Url\Test\UrlTest` class to  `Josantonius\Url\UrlTest` class.

## [1.1.5](https://github.com/josantonius/php-url/releases/tag/1.1.5) (2017-09-17)

* Unit tests supported by `PHPUnit` were added.

* The repository was synchronized with `Travis CI` to implement continuous integration.

* Added `Url/src/bootstrap.php` file

* Added `Url/tests/bootstrap.php` file.

* Added `Url/phpunit.xml.dist` file.
* Added `Url/_config.yml` file.
* Added `Url/.travis.yml` file.

* Added `Josantonius\Url\Url::setUrlParams()` method.

* Deleted `Josantonius\Url\Url::segment()` method.

* Added `Josantonius\Url\Url::segmentUri()` method.

* Deleted `Josantonius\Url\Tests\UrlTest` class.
* Deleted `Josantonius\Url\Tests\UrlTest::testGetCurrentPage()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testGetProtocol()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testIsSSL()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::getDomain()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testGetUri()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testGetPort()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testAddBackslash()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testPrevious()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testRedirect()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testAutoLink()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testCustomAutoLink()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testGenerateSafeSlug()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testSegment()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testGetFirstSegment()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testGetLastSegment()` method.
* Deleted `Josantonius\Url\Tests\UrlTest::testGetBaseUrl()` method.

* Added `Josantonius\Url\Test\UrlTest` class.
* Added `Josantonius\Url\Test\UrlTest::testGetCurrentPage()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetBaseUrl()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetProtocol()` method.
* Added `Josantonius\Url\Test\UrlTest::testIsSSL()` method.
* Added `Josantonius\Url\Test\UrlTest::getDomain()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetUri()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetUriMethods()` method.
* Added `Josantonius\Url\Test\UrlTest::testSetUrlParams()` method.
* Added `Josantonius\Url\Test\UrlTest::testSetUrlParamsAlternativeVersion()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetPort()` method.
* Added `Josantonius\Url\Test\UrlTest::testAddBackslashEnd()` method.
* Added `Josantonius\Url\Test\UrlTest::testAddBackslashEndAlternativeVersion()` method.
* Added `Josantonius\Url\Test\UrlTest::testAddBackslashTop()` method.
* Added `Josantonius\Url\Test\UrlTest::testAddBackslashBoth()` method.
* Added `Josantonius\Url\Test\UrlTest::testPrevious()` method.
* Added `Josantonius\Url\Test\UrlTest::testRedirect()` method.
* Added `Josantonius\Url\Test\UrlTest::testAutoLink()` method.
* Added `Josantonius\Url\Test\UrlTest::testCustomAutoLink()` method.
* Added `Josantonius\Url\Test\UrlTest::testGenerateSafeSlug()` method.
* Added `Josantonius\Url\Test\UrlTest::testSegment()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetFirstSegmentFromString()` method.
* Added `Josantonius\Url\Test\UrlTest::estGetFirstSegmentFromArray()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetLastSegmentFromString()` method.
* Added `Josantonius\Url\Test\UrlTest::testGetLastSegmentFromArray()` method.

## [1.1.4](https://github.com/josantonius/php-url/releases/tag/1.1.4) (2017-07-16)

* Deleted `Josantonius\Url\Exception\UrlException` class.
* Deleted `Josantonius\Url\Exception\Exceptions` abstract class.
* Deleted `Josantonius\Url\Exception\UrlException->__construct()` method.

## [1.1.3](https://github.com/josantonius/php-url/releases/tag/1.1.3) (2017-07-09)

* Added option to analyze concrete urls in some methods.

## [1.1.2](https://github.com/josantonius/php-url/releases/tag/1.1.2) (2017-05-08)

* Now you can choose to place backslash at the beginning, end or both ends in the addBackslash() method.

* The getUriMethods() method was improved to prevent it from replacing single characters that also matched.

## [1.1.1](https://github.com/josantonius/php-url/releases/tag/1.1.1) (2017-03-18)

* Some files were excluded from download and comments and readme files were updated.

## [1.1.0](https://github.com/josantonius/php-url/releases/tag/1.1.0) (2017-02-28)

* Added `Josantonius\Url\Url::getBaseUrl()` method.

* Added `Josantonius\Url\Tests\UrlTest::testGetBaseUrl()` method.

## [1.0.0](https://github.com/josantonius/php-url/releases/tag/1.0.0) (2017-02-02)

* Added `Josantonius\Url\Url` class.
* Added `Josantonius\Url\Url::getCurrentPage()` method.
* Added `Josantonius\Url\Url::getProtocol()` method.
* Added `Josantonius\Url\Url::isSSL()` method.
* Added `Josantonius\Url\Url::getDomain()` method.
* Added `Josantonius\Url\Url::getUri()` method.
* Added `Josantonius\Url\Url::getUriMethods()` method.
* Added `Josantonius\Url\Url::getPort()` method.
* Added `Josantonius\Url\Url::addBackslash()` method.
* Added `Josantonius\Url\Url::previous()` method.
* Added `Josantonius\Url\Url::redirect()` method.
* Added `Josantonius\Url\Url::autoLink()` method.
* Added `Josantonius\Url\Url::generateSafeSlug()` method.
* Added `Josantonius\Url\Url::segment()` method.
* Added `Josantonius\Url\Url::getFirstSegment()` method.
* Added `Josantonius\Url\Url::getLastSegment()` method.

* Added `Josantonius\Url\Exception\UrlException` class.
* Added `Josantonius\Url\Exception\Exceptions` abstract class.
* Added `Josantonius\Url\Exception\UrlException->__construct()` method.

* Added `Josantonius\Url\Tests\UrlTest` class.
* Added `Josantonius\Url\Tests\UrlTest::testGetCurrentPage()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGetProtocol()` method.
* Added `Josantonius\Url\Tests\UrlTest::testIsSSL()` method.
* Added `Josantonius\Url\Tests\UrlTest::getDomain()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGetUri()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGetPort()` method.
* Added `Josantonius\Url\Tests\UrlTest::testAddBackslash()` method.
* Added `Josantonius\Url\Tests\UrlTest::testPrevious()` method.
* Added `Josantonius\Url\Tests\UrlTest::testRedirect()` method.
* Added `Josantonius\Url\Tests\UrlTest::testAutoLink()` method.
* Added `Josantonius\Url\Tests\UrlTest::testCustomAutoLink()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGenerateSafeSlug()` method.
* Added `Josantonius\Url\Tests\UrlTest::testSegment()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGetFirstSegment()` method.
* Added `Josantonius\Url\Tests\UrlTest::testGetLastSegment()` method.
