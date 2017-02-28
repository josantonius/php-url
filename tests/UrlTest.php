<?php
/**
 * Library for urls manipulation.
 * 
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2017 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Url
 * @since      1.0.0
 */

namespace Josantonius\Url\Tests;

use Josantonius\Url\Url;

/**
 * Tests class for Url library.
 *
 * @since 1.0.0
 */
class UrlTest {

    /**
     * Get url from the current page.
     *
     * @since 1.0.0
     */
    public static function testGetCurrentPage() {

        echo '<pre>'; var_dump(Url::getCurrentPage()); echo '</pre>'; 
    }

    /**
     * Get base url of the site.
     *
     * @since 1.0.0
     */
    public static function testGetBaseUrl() {

        echo '<pre>'; var_dump(Url::getBaseUrl()); echo '</pre>'; 
    }

    /**
     * Get the protocol from the url.
     *
     * @since 1.0.0
     */
    public static function testGetProtocol() {

        echo '<pre>'; var_dump(Url::getProtocol()); echo '</pre>'; 
    }

    /**
     * Check if it is a secure site (SSL).
     *
     * @since 1.0.0
     */
    public static function testIsSSL() {

        echo '<pre>'; var_dump(Url::isSSL()); echo '</pre>'; 
    }

    /**
     * Get the server name.
     *
     * @since 1.0.0
     */
    public static function getDomain() {

        echo '<pre>'; var_dump(Url::testGetProtocol()); echo '</pre>'; 
    }

    /**
     * Get uri.
     *
     * @since 1.0.0
     */
    public static function testGetUri() {

        echo '<pre>'; var_dump(Url::getUri()); echo '</pre>'; 
    }

    /**
     * Remove subdirectories from uri if they exist.
     *
     * @since 1.0.0
     */
    public static function testGetUriMethods() {

        echo '<pre>'; var_dump(Url::getUriMethods()); echo '</pre>'; 
    }

    /**
     * Get the server port.
     *
     * @since 1.0.0
     */
    public static function testGetPort() {

        echo '<pre>'; var_dump(Url::getPort()); echo '</pre>'; 
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     *
     * @since 1.0.0
     */
    public static function testAddBackslash() {

        echo '<pre>'; var_dump(Url::addBackslash('path/to')); echo '</pre>'; 
    }
    
    /**
     * Go to the previous url.
     *
     * @since 1.0.0
     */
    public static function testPrevious() {

        Url::previous();
    }

    /**
     * Redirect to chosen url.
     *
     * @since 1.0.0
     */
    public static function testRedirect() {

        Url::redirect('https://github.com/');
    }

    /**
     * Converts plain text urls into HTML links.
     *
     * @since 1.0.0
     */
    public static function testAutoLink() {

        print_r(Url::autoLink('https://github.com'));
    }

    /**
     * Converts plain text urls into HTML links.
     *
     * @since 1.0.0
     */
    public static function testCustomAutoLink() {

        print_r(Url::autoLink('https://github.com', 'GitHub')); 
    }

    /**
     * Converts and url segment to an safe one.
     *
     * @since 1.0.0
     */
    public static function testGenerateSafeSlug() {

        echo '<pre>'; 

        var_dump(Url::generateSafeSlug('https://github.com')); 

        echo '</pre>'; 
    }


    /**
     * Get all url parts based on a / seperator.
     *
     * @since 1.0.0
     */
    public static function testSegment() {

        echo '<pre>'; var_dump(Url::segment()); echo '</pre>'; 
    }

    /**
     * get first item in array
     *
     * @since 1.0.0
     */
    public static function testGetFirstSegment() {

        $segments = Url::segment('path/to/panel/user');

        echo '<pre>'; var_dump(Url::getFirstSegment($segments)); echo '</pre>'; 
    }

    /**
     * Get last item in array.
     *
     * @since 1.0.0
     */
    public static function testGetLastSegment() {

        $segments = Url::segment('path/to/panel/user');

        echo '<pre>'; var_dump(Url::getLastSegment($segments)); echo '</pre>'; 
    }
}
