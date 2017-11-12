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
final class UrlTest extends TestCase
{
    /**
     * Url instance.
     *
     * @since 1.1.7
     *
     * @var object
     */
    protected $Url;

    /**
     * Set up.
     *
     * @since 1.1.7
     */
    public function setUp()
    {
        parent::setUp();

        $this->Url = new Url;
    }

    /**
     * Check if it is an instance of Url.
     *
     * @since 1.1.7
     */
    public function testIsInstanceOfUrl()
    {
        $actual = $this->Url;
        $this->assertInstanceOf('Josantonius\Url\Url', $actual);
    }

    /**
     * Get url from the current page.
     *
     * @since 1.1.5
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
     */
    public function testGetProtocol()
    {
        $this->assertContains(
            'https',
            Url::getProtocol()
        );
    }

    /**
     * Get the protocol from the url if getProtocol pass the url.
     *
     * @since 1.1.8
     */
    public function testGetProtocolWithUrl()
    {
        $this->assertContains(
            'https',
            Url::getProtocol('https://josantonius.com/')
        );
    }

    /**
     * Check if it is a secure site (SSL).
     *
     * @since 1.1.5
     */
    public function testIsSSL()
    {
        $this->assertTrue(Url::isSSL());
    }

    /**
     * Get the server name.
     *
     * @since 1.1.5
     */
    public function testGetDomain()
    {
        $this->assertContains(
            'josantonius.com',
            Url::getDomain()
        );

        $this->assertFalse(Url::getDomain('josantonius'));
    }

    /**
     * Get the server name if getDomain pass the domain.
     *
     * @since 1.1.8
     */
    public function testGetDomainWithDomain()
    {
        $this->assertContains(
            'josantonius.com',
            Url::getDomain('josantonius.com')
        );
    }

    /**
     * Get the false if getDomain pass the invalid domain.
     *
     * @since 1.1.8
     */
    public function testGetDomainWithInvalidDomain()
    {
        $this->assertFalse(Url::getDomain('josantonius'));
    }

    /**
     * Get uri.
     *
     * @since 1.1.5
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
     */
    public function testAddBackSlashEnd()
    {
        $this->assertContains(
            'https://josantonius.com/',
            Url::addBackSlash('https://josantonius.com')
        );
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     *
     * @since 1.1.5
     */
    public function testAddBackSlashEndAlternativeVersion()
    {
        $this->assertContains(
            'https://josantonius.com/',
            Url::addBackSlash('https://josantonius.com', 'end')
        );
    }

    /**
     * Add backslash if it does not exist at the top of the route.
     *
     * @since 1.1.5
     */
    public function testAddBackSlashTop()
    {
        $this->assertContains(
            '/josantonius.com',
            Url::addBackSlash('josantonius.com', 'top')
        );
    }

    /**
     * Add backslash if it doesn't exist at the top and end of the route.
     *
     * @since 1.1.5
     */
    public function testAddBackSlashBoth()
    {
        $this->assertContains(
            '/josantonius.com/',
            Url::addBackSlash('josantonius.com', 'both')
        );
    }

    /**
     * Add backslash if it is the default case.
     *
     * @since 1.1.8
     */
    public function testAddBackSlashDefault()
    {
        $this->assertFalse(Url::addBackSlash('josantonius.com', 'default'));
    }

    /**
     * Go to the previous url.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.5
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
     */
    public function testRedirect()
    {
        Url::redirect('https://josantonius.com/');
    }

    /**
     * Converts plain text urls into HTML links.
     *
     * @since 1.1.5
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
