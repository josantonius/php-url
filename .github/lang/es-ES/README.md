# PHP URL library

[![Latest Stable Version](https://poser.pugx.org/josantonius/url/v/stable)](https://packagist.org/packages/josantonius/url)
[![License](https://poser.pugx.org/josantonius/url/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/url/downloads)](https://packagist.org/packages/josantonius/url)
[![CI](https://github.com/josantonius/php-url/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-url/actions/workflows/ci.yml)
[![CodeCov](https://codecov.io/gh/josantonius/php-url/branch/main/graph/badge.svg)](https://codecov.io/gh/josantonius/php-url)
[![PSR1](https://img.shields.io/badge/PSR-1-f57046.svg)](https://www.php-fig.org/psr/psr-1/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR12](https://img.shields.io/badge/PSR-12-1abc9c.svg)](https://www.php-fig.org/psr/psr-12/)

[English version](README.md)

Biblioteca de PHP para acceder a la información de una URL.

Proporciona un reemplazo mejorado para el acceso a los componentes de una URL que ofrecen las
funciones parse_url y pathinfo de PHP.

Esta biblioteca no formatea la URL proporcionada, sólo facilita el acceso a los componentes.
Para algo más avanzado puede usar algo como `league/uri-components`.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Clases disponibles](#clases-disponibles)
  - [Clase Url](#clase-url)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#tareas-pendientes)
- [Registro de Cambios](#registro-de-cambios)
- [Contribuir](#contribuir)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

## Requisitos

Esta biblioteca es compatible con las versiones de PHP: 8.1.

## Instalación

La mejor forma de instalarla es a través
de [Composer](http://getcomposer.org/download/).

Para instalar **PHP URL library**, simplemente escribe:

```console
composer require josantonius/url
```

El comando anterior sólo instalará los archivos necesarios,
si prefieres **descargar todo el código fuente** puedes utilizar:

```console
composer require josantonius/url --prefer-source
```

También puedes **clonar el repositorio** completo con Git:

```console
git clone https://github.com/josantonius/php-url.git
```

## Clases disponibles

### Url Class

```php
use Josantonius\Url\Url;
```

Crear una nueva instancia:

```php
/**
 * Si no se proporciona ninguna URL, se generará la URL de la página actual.
 * 
 * La URL generada excluirá los puertos 80 y 443 e incluirá el resto.
 *
 * @throws UrlException si la URL no es válida.
 */
new Url(string|null $url = null)
```

Obtiene la autoridad:

```php
/**
 * Autoridad en formato "[user-info@][host][:port]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $authority
```

Obtiene la URL base:

```php
/**
 * URL base, en formato "[scheme:][//domain][:port]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $base
```

Obtiene el nombre base de la ruta:

```php
/**
 * El nombre base de la ruta en formato "[filename][.extension]".
 *
 * @var string Nombre base de la ruta o cadena vacía.
 */
public readonly string $basename
```

Obtiene el nombre del directorio de la ruta:

```php
/**
 * Nombre del directorio de la ruta, en formato "[dirname]".
 *
 * @var string Nombre del directorio de la ruta o cadena vacía.
 */
public readonly string $dirname
```

Obtiene la extensión del nombre base de la ruta:

```php
/**
 * La extensión del nombre base de la ruta en formato "[extension]".
 *
 * @var string Extensión del nombre base de la ruta o cadena vacía.
 */
public readonly string $extension
```

Obtiene el nombre del archivo de la ruta:

```php
/**
 * Nombre del archivo de la ruta en formato "[nombre de archivo]".
 *
 * @var string Nombre del archivo de la ruta o cadena vacía.
 */
public readonly string $filename
```

Obtiene el fragmento:

```php
/**
 * Fragmento en formato "[fragment]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $fragment
```

Obtiene la URL completa:

```php
public readonly string $full
```

Obtiene el fragmento con hash:

```php
/**
 * Fragmento con hash en formato "[#fragment]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $hash
```

Obtiene el dominio:

```php
/**
 * Dominio en formato "[subdomain.][domain][.tld]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $host
```

Obtiene la ruta:

```php
/**
 * Ruta en formato "[path]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $path
```

Obtiene los parámetros de la consulta:

```php
/**
 * Parámetros de la consulta en formato array.
 *
 * @var array<string, mixed> Parámetros de la consulta o cadena vacía.
 */
public readonly array $parameters
```

Obtiene la contraseña:

```php
/**
 * Contraseña en formato "[password]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $password
```

Obtiene el puerto:

```php
/**
 * Puerto en formato "[port]".
 *
 * @var string The port as an integer or empty string if it does not exist.
 */
public readonly int|string $port
```

Obtiene el esquema:

```php
/**
 * Esquema en formato "[scheme]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $scheme
```

Obtiene los segmentos de la ruta:

```php
/**
 * Segmentos de la ruta URL en formato array.
 *
 * @var string[] Segmentos de la ruta URL o cadena vacía.
 */
public readonly array $segments
```

Obtiene la consulta:

```php
/**
 * Consulta en formato "[query]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $query
```

Obtiene la información de usuario:

```php
/**
 * Información de usuario en formato "[username][:password]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $userInfo
```

Obtiene el nombre de usuario:

```php
/**
 * Nombre de usuario en formato "[username]".
 *
 * @var string Elemento o cadena vacía.
 */
public readonly string $username
```

## Uso

Ejemplo de uso de esta biblioteca:

### Crear una nueva instancia utilizando la URL actual

```php
use Josantonius\Url\Url;

$url = new Url();
```

### Crear una nueva instancia utilizando una URL personalizada

```php
use Josantonius\Url\Url;

$url = new Url('https://domain.com');
```

### Obtiene la autoridad

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

### Obtiene la URL base

```php
use Josantonius\Url\Url;

$url = new Url(); // https://user:pass@domain.com:80/en/

$url->base; // "https://domain.com"


$url = new Url('https://domain.com:80/?tag=bug');

$url->base; // "https://domain.com:80"


$url = new Url('https://domain.com/en/');

$url->base; // "https://domain.com"
```

### Obtiene el nombre base de la ruta

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->basename; // "search.php"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->basename; // "search.php"


$url = new Url('https://domain.com/en/web/docs?tag=bug');

$url->basename; // "docs"
```

### Obtiene el nombre del directorio de la ruta

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->dirname; // "/"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->dirname; // "/en/web/docs"


$url = new Url('https://domain.com/en/web/docs?tag=bug');

$url->dirname; // "/en/web"
```

### Obtiene la extensión del nombre base de la ruta

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->extension; // "php"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->extension; // "php"


$url = new Url('https://domain.com/en/web/docs?tag=bug');

$url->extension; // ""
```

### Obtiene el nombre del archivo de la ruta

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/search.php

$url->filename; // "search"


$url = new Url('https://domain.com/en/web/docs/search.php?tag=bug');

$url->filename; // "search"


$url = new Url('https://domain.com/docs?tag=bug');

$url->filename; // "docs"
```

### Obtiene el fragmento

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com#top

$url->fragment; // "top"


$url = new Url('https://domain.com/en/web/docs#top');

$url->fragment; // "top"


$url = new Url('https://domain.com');

$url->fragment; // ""
```

### Obtiene la URL completa

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com:80

$url->full;  // "https://domain.com"


$url = new Url('https://user:pass@sub.domain.com:90/en/');

$url->full; // "https://user:pass@sub.domain.com:90/en/"
```

### Obtiene el fragmento con hash

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com#top

$url->hash; // "#top"


$url = new Url('https://domain.com/en/web/docs#top');

$url->hash; // "#top"


$url = new Url('https://domain.com');

$url->hash; // ""
```

### Obtiene el dominio

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

### Obtiene la ruta

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

### Obtiene los parámetros de la consulta

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com/en?tag=bug&order=asc#top

$url->parameters; // ["tag" => "bug", "order" => "asc"]


$url = new Url('https://domain.com/en/web/docs/search.php');

$url->parameters; // ""
```

### Obtiene la contraseña

```php
use Josantonius\Url\Url;

$url = new Url(); // https://:pass@domain.com

$url->password; // "pass"


$url = new Url('https://user:pass@domain.com');

$url->password; // "pass"


$url = new Url('https://user@domain.com');

$url->password; // ""
```

### Obtiene el puerto

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

### Obtiene el esquema

```php
use Josantonius\Url\Url;

$url = new Url(); // http://domain.com

$url->scheme; // "http"


$url = new Url('https://domain.com');

$url->scheme; // "https"
```

### Obtiene los segmentos de la ruta

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com?tag=bug

$url->segments; // []


$url = new Url('https://domain.com/en/web/docs/search.php');

$url->segments; // ['en', 'web', 'docs', 'search.php']
```

### Obtiene la consulta

```php
use Josantonius\Url\Url;

$url = new Url(); // https://domain.com?tag=bug

$url->query; // "tag=bug"


$url = new Url('https://domain.com?tag=bug&order=asc#top');

$url->query; // "tag=bug&order=asc"


$url = new Url('https://domain.com');

$url->query; // ""
```

### Obtiene la información de usuario

```php
use Josantonius\Url\Url;

$url = new Url(); // https://user@domain.com

$url->userInfo; // "user"


$url = new Url('https://:pass@domain.com');

$url->userInfo; // ":pass"


$url = new Url('https://user:pass@domain.com');

$url->userInfo; // "user:pass"


$url = new Url('https://domain.com');

$url->userInfo; // ""
```

### Obtiene el nombre de usuario

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

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/)
y seguir los siguientes pasos:

```console
git clone https://github.com/josantonius/php-url.git
```

```console
cd php-url
```

```console
composer install
```

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

```console
composer phpunit
```

Ejecutar pruebas de estándares de código
con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

```console
composer tests
```

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar
inconsistencias en el estilo de codificación:

```console
composer phpmd
```

Ejecutar todas las pruebas anteriores:

```console
composer tests
```

## Tareas pendientes

- [ ] Añadir nueva funcionalidad
- [ ] Mejorar pruebas
- [ ] Mejorar documentación
- [ ] Mejorar la traducción al inglés en el archivo README
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas
(ver [phpmd.xml](phpmd.xml) y [phpcs.xml](phpcs.xml))

## Registro de Cambios

Los cambios detallados de cada versión se documentan en las
[notas de la misma](https://github.com/josantonius/php-url/releases).

## Contribuir

Por favor, asegúrate de leer la [Guía de contribución](CONTRIBUTING.md) antes de hacer un
_pull request_, comenzar una discusión o reportar un _issue_.

¡Gracias por [colaborar](https://github.com/josantonius/php-url/graphs/contributors)! :heart:

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [MIT License](LICENSE).

Copyright © 2017-actualidad, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
