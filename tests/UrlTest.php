<?php

/*
 * This file is part of https://github.com/josantonius/php-url repository.
 *
 * (c) Josantonius <hello@josantonius.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

namespace Josantonius\Url\Tests;

use Josantonius\Url\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function test_should_set_the_current_url()
    {
        $currentUrl =
            'https://' .
            $_SERVER['SERVER_NAME'] . ':' .
            $_SERVER['SERVER_PORT'] .
            $_SERVER['REQUEST_URL'];

        $this->assertEquals($currentUrl, (new Url())->full);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_not_contain_common_http_ports()
    {
        $_SERVER['SERVER_PORT'] = 80;

        $this->assertStringNotContainsString('80', (new Url())->full);

        $_SERVER['SERVER_PORT'] = 443;

        $this->assertStringNotContainsString('80', (new Url())->full);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_contain_valid_scheme_when_is_secure_site()
    {
        $this->assertStringContainsString('https:', (new Url())->full);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_contain_valid_scheme_when_is_non_secure_site()
    {
        $_SERVER['HTTPS'] = 'off';

        $this->assertStringContainsString('http:', (new Url())->full);
    }

    public function test_should_set_all_properties()
    {
        $url = new Url(
            'https://user:pass@sub.domain.com:90/en/web/docs/search.php?tag=bug&order=asc#top'
        );

        $this->assertEquals('https', $url->scheme);
        $this->assertEquals('user', $url->username);
        $this->assertEquals('pass', $url->password);
        $this->assertEquals('sub.domain.com', $url->host);
        $this->assertEquals(90, $url->port);
        $this->assertEquals('user:pass@sub.domain.com:90', $url->authority);
        $this->assertEquals('https://sub.domain.com:90', $url->base);
        $this->assertEquals('/en/web/docs/search.php', $url->path);
        $this->assertEquals('search.php', $url->basename);
        $this->assertEquals('/en/web/docs', $url->dirname);
        $this->assertEquals(["en", "web", "docs", "search.php"], $url->segments);
        $this->assertEquals('php', $url->extension);
        $this->assertEquals('search', $url->filename);
        $this->assertEquals('tag=bug&order=asc', $url->query);
        $this->assertEquals(["tag" => "bug", "order" => "asc"], $url->parameters);
        $this->assertEquals('top', $url->fragment);
        $this->assertEquals('#top', $url->hash);
    }

    public function test_should_set_nonexistent_properties_as_empty()
    {
        $url = new Url('');

        $this->assertEquals('', $url->scheme);
        $this->assertEquals('', $url->username);
        $this->assertEquals('', $url->password);
        $this->assertEquals('', $url->host);
        $this->assertEquals('', $url->port);
        $this->assertEquals('', $url->authority);
        $this->assertEquals('', $url->base);
        $this->assertEquals('', $url->path);
        $this->assertEquals('', $url->basename);
        $this->assertEquals('', $url->dirname);
        $this->assertEquals([], $url->segments);
        $this->assertEquals('', $url->extension);
        $this->assertEquals('', $url->filename);
        $this->assertEquals('', $url->query);
        $this->assertEquals([], $url->parameters);
        $this->assertEquals('', $url->fragment);
        $this->assertEquals('', $url->hash);
    }

    public function test_authority_component_should_be_set_up_without_the_port()
    {
        $url = new Url('https://user:pass@sub.domain.com');

        $this->assertEquals('user:pass@sub.domain.com', $url->authority);
    }

    public function test_authority_component_should_be_set_up_without_the_user_info()
    {
        $url = new Url('https://sub.domain.com');

        $this->assertEquals('sub.domain.com', $url->authority);
    }

    public function test_should_not_ignore_the_port_even_if_it_is_common_when_the_url_is_custom()
    {
        $url = new Url('https://user:pass@sub.domain.com:80');

        $this->assertEquals(80, $url->port);

        $url = new Url('https://user:pass@sub.domain.com:443');

        $this->assertEquals(443, $url->port);
    }
}
