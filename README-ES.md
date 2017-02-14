# PHP Url library

[![Latest Stable Version](https://poser.pugx.org/josantonius/url/v/stable)](https://packagist.org/packages/josantonius/url) [![Total Downloads](https://poser.pugx.org/josantonius/url/downloads)](https://packagist.org/packages/josantonius/url) [![Latest Unstable Version](https://poser.pugx.org/josantonius/url/v/unstable)](https://packagist.org/packages/josantonius/url) [![License](https://poser.pugx.org/josantonius/url/license)](https://packagist.org/packages/josantonius/url)

[Spanish version](README-ES.md)

Librería para manipulación de urls.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Métodos disponibles](#métodos-disponibles)
- [Uso](#uso)
- [Tests](#tests)
- [Manejador de excepciones](#manejador-de-excepciones)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Autor](#autor)
- [Licencia](#licencia)

---

### Instalación 

La mejor forma de instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar PHP Url library, simplemente escribe:

    $ composer require Josantonius/Url

### Requisitos

Esta ĺibrería es soportada por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Cómo empezar y ejemplos

Para utilizar esta librería, simplemente:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Url\Url;
```
### Métodos disponibles

Métodos disponibles en esta librería:

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
Url::segment();
Url::getFirstSegment();
Url::getLastSegment();
```
### Uso

Ejemplo de uso para esta librería:

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

var_dump($segments = Url::segment());
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

Para utilizar la clase de [pruebas](tests), simplemente:

```php
<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Josantonius\\Url\\Tests\\', __DIR__ . '/vendor/josantonius/url/tests');

use Josantonius\Url\Tests\UrlTest;
```
Métodos de prueba disponibles en esta librería:

```php
UrlTest::testGetCurrentPage();
UrlTest::testGetProtocol();
UrlTest::testIsSSL();
UrlTest::getDomain();
UrlTest::testGetUri();
UrlTest::testGetUriMethods();
UrlTest::testGetPort();
UrlTest::testAddBackslash();
UrlTest::testPrevious();
UrlTest::testRedirect();
UrlTest::testAutoLink();
UrlTest::testCustomAutoLink();
UrlTest::testGenerateSafeSlug();
UrlTest::testSegment();
UrlTest::testGetFirstSegment();
UrlTest::testGetLastSegment();
```

### Manejador de excepciones

Esta librería utiliza [control de excepciones](src/Exception) que puedes personalizar a tu gusto.
### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Autor

Mantenido por [Josantonius](https://github.com/Josantonius/).

### Licencia

Este proyecto está licenciado bajo la **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.