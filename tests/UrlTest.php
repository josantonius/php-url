<?php
/**
 * Library for urls manipulation.
 *
 * @author    Josantonius - <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - PHP-Url
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Url
 * @since     1.1.5
 */
namespace Josantonius\Url;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for Url library.
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
        $this->assertInstanceOf('Josantonius\Url\Url', $this->Url);
    }

    /**
     * Get url from the current page.
     */
    public function testGetCurrentPage()
    {
        $url = $this->Url;

        $this->assertContains(
            'https://josantonius.com/developer/',
            $url::getCurrentPage()
        );
    }

    /**
     * Get base url of the site.
     */
    public function testGetBaseUrl()
    {
        $url = $this->Url;

        $this->assertContains(
            'https://josantonius.com/',
            $url::getBaseUrl()
        );
    }

    /**
     * Get the protocol from the url.
     */
    public function testGetProtocol()
    {
        $url = $this->Url;

        $this->assertContains(
            'https',
            $url::getProtocol()
        );
    }

    /**
     * Get the protocol from the url if getProtocol pass the url.
     *
     * @since 1.1.8
     */
    public function testGetProtocolWithUrl()
    {
        $url = $this->Url;

        $this->assertContains(
            'https',
            $url::getProtocol('https://josantonius.com/')
        );
    }

    /**
     * Check if it is a secure site (SSL).
     */
    public function testIsSSL()
    {
        $url = $this->Url;

        $this->assertTrue($url::isSSL());
    }

    /**
     * Get the server name.
     */
    public function testGetDomain()
    {
        $url = $this->Url;

        $this->assertContains(
            'josantonius.com',
            $url::getDomain()
        );

        $this->assertFalse($url::getDomain('josantonius'));
    }

    /**
     * Get the server name if getDomain pass the domain.
     *
     * @since 1.1.8
     */
    public function testGetDomainWithDomain()
    {
        $url = $this->Url;

        $this->assertContains(
            'josantonius.com',
            $url::getDomain('josantonius.com')
        );
    }

    /**
     * Get the false if getDomain pass the invalid domain.
     *
     * @since 1.1.8
     */
    public function testGetDomainWithInvalidDomain()
    {
        $url = $this->Url;

        $this->assertFalse($url::getDomain('josantonius'));
    }

    /**
     * Get uri.
     */
    public function testGetUri()
    {
        $url = $this->Url;

        $this->assertContains(
            '/developer/',
            $url::getUri()
        );
    }

    /**
     * Remove subdirectories from uri if they exist.
     */
    public function testGetUriMethods()
    {
        $url = $this->Url;

        $this->assertContains(
            'developer',
            $url::getUriMethods()
        );
    }

    /**
     * Set parameters from the url and return url without them.
     */
    public function testSetUrlParams()
    {
        $url = $this->Url;

        $this->assertContains(
            'https://josantonius.com',
            $url::setUrlParams(
                'https://josantonius.com?param-1=value&param-2=value'
            )
        );
    }

    /**
     * Set parameters from the url and return url without them.
     */
    public function testSetUrlParamsAlternativeVersion()
    {
        $url = $this->Url;

        $this->assertContains(
            'https://josantonius.com/',
            $url::setUrlParams(
                'https://josantonius.com/&param-1=value&param-2=value'
            )
        );
    }

    /**
     * Get the server port.
     */
    public function testGetPort()
    {
        $url = $this->Url;

        $this->assertContains(
            '80',
            $url::getPort()
        );
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     */
    public function testAddBackSlashEnd()
    {
        $url = $this->Url;

        $this->assertContains(
            'https://josantonius.com/',
            $url::addBackSlash('https://josantonius.com')
        );
    }

    /**
     * Add backslash if it does not exist at the end of the route.
     */
    public function testAddBackSlashEndAlternativeVersion()
    {
        $url = $this->Url;

        $this->assertContains(
            'https://josantonius.com/',
            $url::addBackSlash('https://josantonius.com', 'end')
        );
    }

    /**
     * Add backslash if it does not exist at the top of the route.
     */
    public function testAddBackSlashTop()
    {
        $url = $this->Url;

        $this->assertContains(
            '/josantonius.com',
            $url::addBackSlash('josantonius.com', 'top')
        );
    }

    /**
     * Add backslash if it doesn't exist at the top and end of the route.
     */
    public function testAddBackSlashBoth()
    {
        $url = $this->Url;

        $this->assertContains(
            '/josantonius.com/',
            $url::addBackSlash('josantonius.com', 'both')
        );
    }

    /**
     * Add backslash if it is the default case.
     *
     * @since 1.1.8
     */
    public function testAddBackSlashDefault()
    {
        $url = $this->Url;

        $this->assertFalse($url::addBackSlash('josantonius.com', 'default'));
    }

    /**
     * Go to the previous url.
     *
     * @runInSeparateProcess
     */
    public function testPrevious()
    {
        $url = $this->Url;

        $url::previous();
    }

    /**
     * Redirect to chosen url.
     *
     * @runInSeparateProcess
     */
    public function testRedirect()
    {
        $url = $this->Url;

        $url::redirect('https://josantonius.com/');
    }

    /**
     * Converts plain text urls into HTML links.
     */
    public function testAutoLink()
    {
        $url = $this->Url;

        $this->assertContains(
            '<a href="https://josantonius.com">https://josantonius.com</a>',
            $url::autoLink('https://josantonius.com')
        );
    }

    /**
     * Converts plain text urls into HTML links with custom name.
     */
    public function testCustomAutoLink()
    {
        $url = $this->Url;

        $this->assertContains(
            '<a href="https://josantonius.com">Josantonius</a>',
            $url::autoLink('https://josantonius.com', 'Josantonius')
        );
    }

    /**
     * Converts and url segment to an safe one.
     */
    public function testGenerateSafeSlug()
    {
        $url = $this->Url;

        $this->assertContains(
            'https-josantonius-com',
            $url::generateSafeSlug('https://josantonius.com')
        );
    }

    /**
     * Get all url parts based on a / seperator.
     */
    public function testSegment()
    {
        $url = $this->Url;

        $this->assertCount(
            2,
            $url::segmentUri('/josantonius/developer/')
        );
    }

    /**
     * Get first item segment from string.
     */
    public function testGetFirstSegmentFromString()
    {
        $url = $this->Url;

        $this->assertContains(
            'josantonius',
            $url::getFirstSegment('/josantonius/developer/')
        );
    }

    /**
     * Get first item segment from array.
     */
    public function testGetFirstSegmentFromArray()
    {
        $url = $this->Url;

        $segments = ['josantonius', 'developer'];

        $this->assertContains(
            'josantonius',
            $url::getFirstSegment($segments)
        );
    }

    /**
     * Get last item segment from string.
     */
    public function testGetLastSegmentFromString()
    {
        $url = $this->Url;

        $this->assertContains(
            'developer',
            $url::getLastSegment('/josantonius/developer/')
        );
    }

    /**
     * Get last item segment from array.
     */
    public function testGetLastSegmentFromArray()
    {
        $url = $this->Url;

        $segments = ['josantonius', 'developer'];

        $this->assertContains(
            'developer',
            $url::getLastSegment($segments)
        );
    }
}
