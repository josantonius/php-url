<?php
/**
 * Library for urls manipulation.
 *
 * @author    Josantonius - hello@josantonius.com
 * @author    David Carr  - dave@simplemvcframework.com
 * @copyright 2017 - 2018 (c) Josantonius - PHP-Url
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Url
 * @since     1.0.0
 */
namespace Josantonius\Url;

/**
 * URL handler.
 */
class Url
{
    /**
     * Get URL from the current page.
     *
     * @return string → URL
     */
    public static function getCurrentPage()
    {
        $protocol = self::getProtocol();
        $host = self::getDomain();
        $port = ':' . self::getPort();
        $port = (($port == ':80') || ($port == ':443')) ? '' : $port;
        $uri = self::getUri();

        return $protocol . '://' . $host . $port . $uri;
    }

    /**
     * Get base URL of the site.
     *
     * @since 1.1.0
     *
     * @return string → URL
     */
    public static function getBaseUrl()
    {
        $uri = self::addBackSlash(self::getUriMethods(), 'both');
        $url = self::addBackSlash(self::getCurrentPage());

        if ($uri !== '/') {
            $url = trim(str_replace($uri, '', $url), '/');
        }

        return self::addBackSlash($url);
    }

    /**
     * Get protocol from current or passed URL.
     *
     * @param string $url
     *
     * @return string → http|https
     */
    public static function getProtocol($url = false)
    {
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
     * @param string $url
     *
     * @return bool
     */
    public static function isSSL($url = false)
    {
        return self::getProtocol($url) === 'https';
    }

    /**
     * Get the server name.
     *
     * @param string $url
     *
     * @return string|false → server name
     */
    public static function getDomain($url = false)
    {
        if ($url) {
            preg_match('/([\w]+[.]){1,}[a-z]+/', $url, $matches);

            return isset($matches[0]) ? $matches[0] : false;
        }

        return $_SERVER['SERVER_NAME'];
    }

    /**
     * Get URI.
     *
     * @return string → path/URL
     */
    public static function getUri()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Remove subdirectories from URI if they exist.
     *
     * @return string → method1/method2/method3
     */
    public static function getUriMethods()
    {
        $root = str_replace($_SERVER['DOCUMENT_ROOT'], '', getcwd());
        $subfolder = trim($root, '/');

        return trim(str_replace($subfolder, '', self::getUri()), '/');
    }

    /**
     * Set parameters from the URL and return URL without them.
     *
     * If a URL is received as: http://www.web.com/&key=value&key-2=value
     * params will be saved as GET values and return: http://www.web.com/
     *
     * If a URL is received as: http://www.web.com/?key=value&key-2=value
     * GET parameters are maintained and return: http://www.web.com/
     *
     * @since 1.1.5
     *
     * @param string $url → URL
     *
     * @return string → URL
     */
    public static function setUrlParams($url = false)
    {
        $url = $url !== false ? $url : self::getCurrentPage();

        if (strpos($url, '?') == false && strpos($url, '&') != false) {
            $url = preg_replace('/&/', '?', $url, 1);
            $parts = parse_url($url);
            $query = isset($parts['query']) ? $parts['query'] : '';

            parse_str($query, $query);
        }

        foreach (isset($query) ? $query : [] as $key => $value) {
            $_GET[$key] = $value;
        }

        return explode('?', $url)[0];
    }

    /**
     * Get the server port.
     *
     * @return int → server port
     */
    public static function getPort()
    {
        return $_SERVER['SERVER_PORT'];
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     *
     * @param string $uri      → URI
     * @param string $position → place where the backslash is placed
     *
     * @return string|false → path/url/ | /path/url | /path/url/
     */
    public static function addBackSlash($uri, $position = 'end')
    {
        switch ($position) {
            case 'top':
                $uri = '/' . ltrim($uri, '/');
                break;
            case 'end':
                $uri = rtrim($uri, '/') . '/';
                break;
            case 'both':
                $uri = ! empty($uri) ? '/' . trim($uri, '/') . '/' : '';
                break;
            default:
                $uri = false;
        }

        return $uri;
    }

    /**
     * Go to the previous URL.
     */
    public static function previous()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    /**
     * Redirect to chosen URL.
     *
     * @param string $url → the URL to redirect
     */
    public static function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

    /**
     * Converts plain text URLS into HTML links.
     * Second argument will be used as the URL label <a href=''>$custom</a>.
     *
     * @param string $url    → URL
     * @param string $custom → if provided, this is used for the link label
     *
     * @return string → returns the data with links created around URLS
     */
    public static function autoLink($url, $custom = null)
    {
        $regex = '@(http)?(s)?(://)?(([-\w]+\.)+([^\s]+)+[^,.\s])@';

        if ($custom === null) {
            $replace = '<a href="http$2://$4">$1$2$3$4</a>';
        } else {
            $replace = '<a href="http$2://$4">' . $custom . '</a>';
        }

        return preg_replace($regex, $replace, $url);
    }

    /**
     * This function converts and URL segment to an safe one.
     * For example: `test name @132` will be converted to `test-name--123`.
     * It will also return all letters in lowercase
     *
     * @param string $slug → URL slug to clean up
     *
     * @return string → slug
     */
    public static function generateSafeSlug($slug)
    {
        $slug = preg_replace('/[^a-zA-Z0-9]/', '-', $slug);
        $slug = strtolower(trim($slug, '-'));
        $slug = preg_replace('/\-{2,}/', '-', $slug);

        return $slug;
    }

    /**
     * Get all URL parts based on a / seperator.
     *
     * @since 1.1.5
     *
     * @param string $uri → URI to segment
     *
     * @return string → segments
     */
    public static function segmentUri($uri = null)
    {
        $uri = (! is_null($uri)) ? $uri : $_SERVER['REQUEST_URI'];

        return explode('/', trim($uri, '/'));
    }

    /**
     * Get first item segment.
     *
     * @return string → segment
     */
    public static function getFirstSegment($segments)
    {
        $var = is_array($segments) ? $segments : self::segmentUri($segments);

        return array_shift($var);
    }

    /**
     * Get last item segment.
     *
     * @return string → segment
     */
    public static function getLastSegment($segments)
    {
        $var = is_array($segments) ? $segments : self::segmentUri($segments);

        return end($var);
    }
}
