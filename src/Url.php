<?php 
/**
 * Library for urls manipulation.
 * 
 * @author     Josantonius - hola@josantonius.com
 * @author     David Carr  - dave@simplemvcframework.com
 * @copyright  Copyright (c) 2017 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Url
 * @since      1.0.0
 */

namespace Josantonius\Url;

# use Josantonius\Url\Exception\UrlException;

/**
 * Url handler.
 *
 * @since 1.0.0
 */
class Url {

    /**
     * Get url from the current page.
     *
     * @since 1.0.0
     *
     * @return string → url
     */
    public static function getCurrentPage() {

        $protocol = static::getProtocol();

        $host = static::getDomain();

        $port = ':' . static::getPort();

        $port = (($port == ':80') || ($port == ':443')) ? '' : $port;

        $uri = static::getUri();

        return $protocol . '://' . $host . $port . $uri;
    }

    /**
     * Get base url of the site.
     *
     * @since 1.1.0
     *
     * @return string → url
     */
    public static function getBaseUrl() {

        $uri = static::getUriMethods();

        $url = trim(str_replace($uri, '', static::getCurrentPage()), '/');

        return static::addBackslash($url);
    }

    /**
     * Get the protocol from the url.
     *
     * @since 1.0.0
     *
     * @return string → http|https
     */
    public static function getProtocol() {

        $protocol = strtolower($_SERVER['SERVER_PROTOCOL']);

        $protocol = substr($protocol, 0, strpos($protocol, '/'));

        $ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on');

        return ($ssl) ? $protocol . 's' : $protocol;
    }

    /**
     * Check if it is a secure site (SSL).
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function isSSL() {

        return (static::getProtocol() === 'https');
    }

    /**
     * Get the server name.
     *
     * @since 1.0.0
     *
     * @return string → server name
     */
    public static function getDomain() {

        return $_SERVER['SERVER_NAME'];
    }

    /**
     * Get uri.
     *
     * @since 1.0.0
     *
     * @return string → path/url
     */
    public static function getUri() {

        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Remove subdirectories from uri if they exist.
     *
     * @since 1.0.0
     *
     * @return string → method1/method2/method3
     */
    public static function getUriMethods() {

        $subfolder = trim(str_replace($_SERVER["DOCUMENT_ROOT"], '', getcwd()), '/');

        return trim(str_replace($subfolder, '', static::getUri()), '/');
    }

    /**
     * Get the server port.
     *
     * @since 1.0.0
     *
     * @return string → path/url
     */
    public static function getPort() {

        return $_SERVER['SERVER_PORT'];
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     *
     * @since 1.0.0
     *
     * @param string $uri → url path
     * 
     * @return string → path/url/
     */
    public static function addBackslash($uri = null) {

        return (substr($uri, -1) === "/") ? $uri : $uri . "/";
    }
    
    /**
     * Go to the previous url.
     *
     * @since 1.0.0
     */
    public static function previous() {

        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }

    /**
     * Redirect to chosen url.
     *
     * @since 1.0.0
     *
     * @param  string  $url → the url to redirect to
     */
    public static function redirect($url) {

        header('Location: '. $url);
        exit;
    }

    /**
     * Converts plain text urls into HTML links.
     * Second argument will be used as the url label <a href=''>$custom</a>.
     *
     * @since 1.0.0
     *
     * @param  string $url    → url
     * @param  string $custom → if provided, this is used for the link label
     *
     * @return string → returns the data with links created around urls
     */
    public static function autoLink($url, $custom = null) {

        $regex   = '@(http)?(s)?(://)?(([-\w]+\.)+([^\s]+)+[^,.\s])@';

        if ($custom === null) {

            $replace = '<a href="http$2://$4">$1$2$3$4</a>';

        } else {

            $replace = '<a href="http$2://$4">'.$custom.'</a>';
        }

        return preg_replace($regex, $replace, $url);
    }

    /**
     * This function converts and url segment to an safe one.
     * For example: `test name @132` will be converted to `test-name--123`.
     * Replace every character that isn't an letter or an number to an dash sign.
     * It will also return all letters in lowercase
     *
     * @since 1.0.0
     *
     * @param string $slug → url slug to convert
     *
     * @return mixed|string
     */
    public static function generateSafeSlug($slug) {

        $slug = preg_replace('/[^a-zA-Z0-9]/', '-', $slug);

        $slug = strtolower(trim($slug, '-'));

        $slug = preg_replace('/\-{2,}/', '-', $slug);
        
        return $slug;
    }


    /**
     * Get all url parts based on a / seperator.
     *
     * @since 1.0.0
     *
     * @return array → segments
     */
    public static function segment($uri = null) {

        $uri = (!is_null($uri)) ? $uri : $_SERVER['REQUEST_URI'];
 
        return explode('/', trim($uri, '/'));
    }

    /**
     * get first item in array
     *
     * @since 1.0.0
     *
     * @return string → first segment
     */
    public static function getFirstSegment($segments) {

        return $segments[0];
    }

    /**
     * Get last item in array.
     *
     * @since 1.0.0
     *
     * @return string → last segment
     */
    public static function getLastSegment($segments) {

        return end($segments);
    }
}
