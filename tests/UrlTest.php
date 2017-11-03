<?php
/**
 * Library for urls manipulation.
 *
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Url
 * @since      1.1.5
 */

namespace Josantonius\Url;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for Url library.
 *
 * @since 1.1.5
 */
class UrlTest extends TestCase
{
    /**
     * Get url from the current page.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetCurrentPage()
    {
        $this->assertContains(
            'https://josantonius.com/developer/',
            Url::getCurrentPage()
        );
    }

    /**
     * Get base url of the site.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetBaseUrl()
    {
        $this->assertContains(
            'https://josantonius.com/',
            Url::getBaseUrl()
        );
    }

    /**
     * Get the protocol from the url.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetProtocol()
    {
        $this->assertContains(
            'https',
            Url::getProtocol()
        );
    }

    /**
     * Check if it is a secure site (SSL).
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testIsSSL()
    {
        $this->assertTrue(Url::isSSL());
    }

    /**
     * Get the server name.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetDomain()
    {
        $this->assertContains(
            'josantonius.com',
            Url::getDomain()
        );
    }

    /**
     * Get uri.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetUri()
    {
        $this->assertContains(
            '/developer/',
            Url::getUri()
        );
    }

    /**
     * Remove subdirectories from uri if they exist.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetUriMethods()
    {
        $this->assertContains(
            'developer',
            Url::getUriMethods()
        );
    }

    /**
     * Set parameters from the url and return url without them.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testSetUrlParams()
    {
        $this->assertContains(
            'https://josantonius.com',
            Url::setUrlParams(
                'https://josantonius.com?param-1=value&param-2=value'
            )
        );
    }

    /**
     * Set parameters from the url and return url without them.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testSetUrlParamsAlternativeVersion()
    {
        $this->assertContains(
            'https://josantonius.com/',
            Url::setUrlParams(
                'https://josantonius.com/&param-1=value&param-2=value'
            )
        );
    }

    /**
     * Get the server port.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetPort()
    {
        $this->assertContains(
            '80',
            Url::getPort()
        );
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddBackslashEnd()
    {
        $this->assertContains(
            'https://josantonius.com/',
            Url::addBackslash('https://josantonius.com')
        );
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddBackslashEndAlternativeVersion()
    {
        $this->assertContains(
            'https://josantonius.com/',
            Url::addBackslash('https://josantonius.com', 'end')
        );
    }

    /**
     * Add backslash if it does not exist at the top of the route.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddBackslashTop()
    {
        $this->assertContains(
            '/josantonius.com',
            Url::addBackslash('josantonius.com', 'top')
        );
    }

    /**
     * Add backslash if it doesn't exist at the top and end of the route.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddBackslashBoth()
    {
        $this->assertContains(
            '/josantonius.com/',
            Url::addBackslash('josantonius.com', 'both')
        );
    }

    /**
     * Go to the previous url.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testPrevious()
    {
        Url::previous();
    }

    /**
     * Redirect to chosen url.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testRedirect()
    {
        Url::redirect('https://josantonius.com/');
    }

    /**
     * Converts plain text urls into HTML links.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAutoLink()
    {
        $this->assertContains(
            '<a href="https://josantonius.com">https://josantonius.com</a>',
            Url::autoLink('https://josantonius.com')
        );
    }

    /**
     * Converts plain text urls into HTML links with custom name.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testCustomAutoLink()
    {
        $this->assertContains(
            '<a href="https://josantonius.com">Josantonius</a>',
            Url::autoLink('https://josantonius.com', 'Josantonius')
        );
    }

    /**
     * Converts and url segment to an safe one.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGenerateSafeSlug()
    {
        $this->assertContains(
            'https-josantonius-com',
            Url::generateSafeSlug('https://josantonius.com')
        );
    }

    /**
     * Get all url parts based on a / seperator.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testSegment()
    {
        $this->assertCount(
            2,
            Url::segmentUri('/josantonius/developer/')
        );
    }

    /**
     * Get first item segment from string.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetFirstSegmentFromString()
    {
        $this->assertContains(
            'josantonius',
            Url::getFirstSegment('/josantonius/developer/')
        );
    }

    /**
     * Get first item segment from array.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetFirstSegmentFromArray()
    {
        $segments = ['josantonius', 'developer'];

        $this->assertContains(
            'josantonius',
            Url::getFirstSegment($segments)
        );
    }

    /**
     * Get last item segment from string.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetLastSegmentFromString()
    {
        $this->assertContains(
            'developer',
            Url::getLastSegment('/josantonius/developer/')
        );
    }

    /**
     * Get last item segment from array.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testGetLastSegmentFromArray()
    {
        $segments = ['josantonius', 'developer'];

        $this->assertContains(
            'developer',
            Url::getLastSegment($segments)
        );
    }
}
