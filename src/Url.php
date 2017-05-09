<?php 
/**
 * Library for urls manipulation.
 * 
 * @author     Josantonius - hello@josantonius.com
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
     * Directory separator.
     *
     * @since 1.1.2
     *
     * @var string
     */
    const DS = DIRECTORY_SEPARATOR;

    /**
     * Get url from the current page.
     *
     * @since 1.0.0
     *
     * @return string → url
     */
    public static function getCurrentPage() {

        $protocol = self::getProtocol();

        $host = self::getDomain();

        $port = ':' . self::getPort();

        $port = (($port == ':80') || ($port == ':443')) ? '' : $port;

        $uri = self::getUri();

        return $protocol . ':' . self::DS . self::DS . $host . $port . $uri;
    }

    /**
     * Get base url of the site.
     *
     * @since 1.1.0
     *
     * @return string → url
     */
    public static function getBaseUrl() {

        $uri = self::addBackslash(self::getUriMethods(), 'both');

        $url = self::addBackslash(self::getCurrentPage());

        if ($uri !== self::DS) {
            
            $url = trim(str_replace($uri, '', $url), self::DS);
        }

        return self::addBackslash($url);
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

        $protocol = substr($protocol, 0, strpos($protocol, self::DS));

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

        return (self::getProtocol() === 'https');
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

        $root = str_replace($_SERVER["DOCUMENT_ROOT"], '', getcwd());

        $subfolder = trim($root, self::DS);

        return trim(str_replace($subfolder, '', self::getUri()), self::DS);
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
     * @param string $uri      → url path
     * @param string $position → place where the backslash is placed
     *
     * @return string → path/url/ | /path/url | /path/url/
     */
    public static function addBackslash($uri, $position = 'end') {

        switch ($position) {

            case 'top':

                return (substr($uri, 1) === self::DS) ? $uri : self::DS.$uri;
            
            case 'end':
                
                return (substr($uri, -1) === self::DS) ? $uri : $uri.self::DS;

            case 'both':

                $uri = self::addBackslash($uri, 'top');
                $uri = self::addBackslash($uri, 'end');

                return $uri;
        }
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
 
        return explode(self::DS, trim($uri, self::DS));
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
