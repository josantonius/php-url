# PHP Url library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Url/v/stable)](https://packagist.org/packages/josantonius/Url) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Url/v/unstable)](https://packagist.org/packages/josantonius/Url) [![License](https://poser.pugx.org/josantonius/Url/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/769a69c9700f49ff9247e1075b737d99)](https://www.codacy.com/app/Josantonius/PHP-Url?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Url&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Url/downloads)](https://packagist.org/packages/josantonius/Url) [![Travis](https://travis-ci.org/Josantonius/PHP-Url.svg)](https://travis-ci.org/Josantonius/PHP-Url) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Url/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Url)

[English version](README.md)

Biblioteca para manipulación de urls.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Requisitos

Esta clase es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Url library**, simplemente escribe:

    $ composer require Josantonius/Url

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/Url --prefer-source

También puedes **clonar el repositorio** completo con Git:

  $ git clone https://github.com/Josantonius/PHP-Url.git

O **instalarlo manualmente**:

[Descargar Url.php](https://raw.githubusercontent.com/Josantonius/PHP-Url/master/src/Url.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Url/master/src/Url.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Obtener URL de la página actual:

```php
Url::getCurrentPage();
```

**# Return** (string) → URL actual

### - Obtener URL base del sitio:

```php
Url::getBaseUrl();
```

### - Obtener protocolo:

```php
Url::getProtocol($url);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $url | URL desde la que obtener el protocolo. | string | No | false |

**# Return** (string) → http or https

### - Comprobar si es un sitio seguro (SSL):

```php
Url::isSSL($url);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $url | URL donde comprobar el protocolo. | string | No | false |

**# Return** (boolean)

### - Obtener dominio:

```php
Url::getDomain($url);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $url | URL donde obtener el dominio. | string | No | false |

**# Return** (string|false) → dominio o falso

### - Get URI:

```php
Url::getUri();
```

**# Return** (string) → ruta/URL

### - Obtener URI sin subdirectorios si es que existen:

```php
Url::getUriMethods();
```

**# Return** (string) → method1/method2/method3

### - Establecer parámetros GET desde la url y devolver url sin ellos:

Si se recibe una URL como: http://www.web.com/&key=value&key-2=value los parámetros se guardarán como valores GET y devuelve: http://www.web.com/.

Si se recibe una URL como: http://www.web.com/?key=value&key-2=value los parámetros GET se mantienen y devuelve: http://www.web.com/.

```php
Url::setUrlParams($url);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $url | URL donde obtener parametros. | string | No | false |

**# Return** (string|false) → URL sin parámetros

### - Obtener puerto del servidor:

```php
Url::getPort();
```

**# Return** (int) → puerto

### - Añadir barra inversa si no existe al final de la ruta:

```php
Url::addBackslash($uri, $position);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $uri | URI donde añadir barra invertida. | string | Sí | |
| $position | Lugar donde colocar la barra invertida: 'top', 'end' or 'both'. | string | No | 'end' |

**# Return** (string) → path/url/ | /path/url | /path/url/

### - Ir a la url anterior:

```php
Url::previous();
```

**# Return** (void)

### - Redireccionar a la URL indicada:

```php
Url::redirect($url);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $url | URL donde redirigir. | string | Sí | |

**# Return** (void)

### - Convierte urls de texto plano en enlaces HTML:

El segundo argumento se utilizará como etiqueta url `<a href=''>$custom</a>`.

```php
Url::autoLink($url, $custom);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $url | URL donde enlazar. | string | Sí | |
| $custom | Si se proporciona, se utiliza para la etiqueta de enlace. | string | No | null |

**# Return** (string) → HTML link

### - Covertir un segmento de url en un slug saneado:

Por ejemplo: `test name @132` será convertido a `test-name--123`.

También devolverá todas las letras en minúsculas.

```php
Url::generateSafeSlug($slug);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $slug | URL/slug a sanear. | string | Sí | |

**# Return** (string) → slug

### - Obtener todas las partes de url basadas en un / seperador:

```php
Url::segmentUri($uri);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $uri | URI a segmentar. | string | No | null |

**# Return** (string) → segmentos

### - Obtener el primer segmento:

```php
Url::getFirstSegment($segments);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $segments | Segmentos. | mixed | Sí | |

**# Return** (string) → segmento

### - Obtener el último segmento:

```php
Url::getLastSegment($segments);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $segments | Segmentos. | mixed | Sí | |

**# Return** (string) → segmento

## Cómo empezar

Para utilizar esta biblioteca con **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Url\Url;
```

Si la instalaste **manualmente**, utiliza:

```php
require_once __DIR__ . '/Url.php';

use Josantonius\Url\Url;
```

## Uso

Ejemplo de uso para esta biblioteca:

### - Obtener URL de la página actual:

```php
Url::getCurrentPage();
```

### - Obtener URL base del sitio:

```php
Url::getBaseUrl();
```

### - Get protocol from URL:

```php
Url::getProtocol();

Url::getProtocol('https://josantonius.com/developer/');
```

### - Comprobar si es un sitio seguro (SSL):

```php
Url::isSSL();

Url::isSSL('https://josantonius.com/developer/');
```

### - Obtener dominio:

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

### - Obtener puerto del servidor:

```php
Url::getPort();
```

### - Añadir barra inversa si no existe al final de la ruta:

```php
Url::addBackslash('https://josantonius.com');

Url::addBackslash('https://josantonius.com', 'end');
```

### - Añadir barra inversa si no existe al principio de la ruta:

```php
Url::addBackslash('josantonius.com', 'top');
```

### - Añadir barra inversa si no existe al principio y al final de la ruta:

```php
Url::addBackslash('josantonius.com', 'both');
```

### - Ir a la URL anterior:

```php
Url::previous();
```

### - Redireccionar a la URL indicada:

```php
Url::redirect('https://josantonius.com/');
```

### - Convierte URLs de texto plano en enlaces HTML:

```php
Url::autoLink('https://josantonius.com');
```

### - Convierte URLs de texto plano en enlaces HTML con nombre personalizado:

```php
Url::autoLink('https://josantonius.com', 'Josantonius');
```

### - Convierte un segmento de URL a un slug seguro:

```php
Url::generateSafeSlug('https://josantonius.com');
```

### - Obtener todas las partes de URL basadas en un / seperador:

```php
Url::segmentUri('/josantonius/developer/');
```

### - Obtener el primer segmento de un string:

```php
Url::getFirstSegment('/josantonius/developer/');
```

### - Obtener el primer segmento de un array:

```php
$segments = ['josantonius', 'developer'];

Url::getLastSegment($segments);
```

### - Obtener el último segmento de un string:

```php
Url::getLastSegment('/josantonius/developer/');
```

### - Obtener el último segmento de un array:

```php
$segments = ['josantonius', 'developer'];

Url::getFirstSegment($segments);
```

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/Josantonius/PHP-Url.git
    
    $ cd PHP-Url

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [x] Completar tests
- [x] Mejorar la documentación

## Contribuir

1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

## Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).