<?php 
/**
 * Library for urls manipulation.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @author     David Carr  - dave@simplemvcframework.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Url
 * @since      1.0.0
 */

namespace Josantonius\Url;

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

        $protocol = self::getProtocol();

        $host = self::getDomain();

        $port = ':' . self::getPort();

        $port = (($port == ':80') || ($port == ':443')) ? '' : $port;

        $uri = self::getUri();

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

        $uri = self::addBackslash(self::getUriMethods(), 'both');

        $url = self::addBackslash(self::getCurrentPage());

        if ($uri !== '/') {
            
            $url = trim(str_replace($uri, '', $url), '/');
        }

        return self::addBackslash($url);
    }

    /**
     * Get the protocol from the url.
     *
     * @since 1.0.0
     *
     * @param string $url
     *
     * @return string → http|https
     */
    public static function getProtocol($url = false) {

        if ($url) {

            return (preg_match('/^https/', $url)) ? 'https' : 'http';
        }

        $protocol = strtolower($_SERVER['SERVER_PROTOCOL']);

        $protocol = substr($protocol, 0, strpos($protocol, '/'));

        $ssl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on');

        return ($ssl) ? $protocol . 's' : $protocol;
    }

    /**
     * Check if it is a secure site (SSL).
     *
     * @since 1.0.0
     *
     * @param string $url
     *
     * @return boolean
     */
    public static function isSSL($url = false) {

        return (self::getProtocol($url) === 'https');
    }

    /**
     * Get the server name.
     *
     * @since 1.0.0
     *
     * @param string $url
     *
     * @return string|false → server name
     */
    public static function getDomain($url = false) {

        if ($url) {

            preg_match('/([\w]+[.]){1,}[a-z]+/', $url, $matches);

            return isset($matches[0]) ? $matches[0] : false;
        }

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

        $subfolder = trim($root, '/');

        return trim(str_replace($subfolder, '', self::getUri()), '/');
    }

    /**
     * Set parameters from the url and return url without them.
     *
     * If a url is received as: http://www.web.com/&key=value&key-2=value
     * params will be saved as GET values and return: http://www.web.com/
     *
     * If a url is received as: http://www.web.com/?key=value&key-2=value
     * GET parameters are maintained and return: http://www.web.com/
     *
     * @since 1.1.5
     *
     * @param string $url → url
     *
     * @return string → url
     */
    public static function setUrlParams($url) {

        if (strpos($url, '?') == false && strpos($url, '&') != false) {

            $url = preg_replace('/&/', '?', $url, 1);

            $parts = parse_url($url);
            
            $query = isset($parts['query']) ? $parts['query'] : '';

            parse_str($query, $query);

            $url = str_replace($query, '', $url);
        }

        foreach (isset($query) ? $query : [] as $key => $value) {
                    
            $_GET[$key] = $value;
        }

        return explode('?', $url)[0];
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

                return (substr($uri, 1) === '/') ? $uri : '/' . $uri;
            
            case 'end':
                
                return (substr($uri, -1) === '/') ? $uri : $uri . '/';

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
     *
     * @return void
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
     *
     * @return void
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
     * @since 1.1.5
     *
     * @return array → segments
     */
    public static function segmentUri($uri = null) {

        $uri = (!is_null($uri)) ? $uri : $_SERVER['REQUEST_URI'];
 
        return explode('/', trim($uri, '/'));
    }

    /**
     * get first item in array
     *
     * @since 1.0.0
     *
     * @return mixed → segments
     */
    public static function getFirstSegment($segments) {

        $var = is_array($segments) ? $segments : self::segmentUri($segments);

        return array_shift($var);
    }

    /**
     * Get last item in array.
     *
     * @since 1.0.0
     *
     * @return mixed → segments
     */
    public static function getLastSegment($segments) {

        $var = is_array($segments) ? $segments : self::segmentUri($segments);
        
        return end($var);
    }
}
