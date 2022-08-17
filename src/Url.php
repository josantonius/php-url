<?php

declare(strict_types=1);

/*
* This file is part of https://github.com/josantonius/php-url repository.
*
* (c) Josantonius <hello@josantonius.dev>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Josantonius\Url;

/**
 * Access URL components.
 */
class Url
{
    /**
     * The authority of the URL, in "[user-info@][host][:port]" format.
     *
     * @var string URL authority or empty string.
     */
    public readonly string $authority;

    /**
     * The base URL, in "[scheme:][//domain][:port]" format.
     *
     * @var string Base URL or empty string.
     */
    public readonly string $base;

    /**
     * The path basename of the URL, in "[filename][.extension]" format.
     *
     * @var string URL path basename or empty string.
     */
    public readonly string $basename;

    /**
     * The path dirname of the URL, in "[dirname]" format.
     *
     * @var string URL path dirname or empty string.
     */
    public readonly string $dirname;

    /**
     * The path basename extension of the URL, in "[extension]" format.
     *
     * @var string URL path basename extension or empty string.
     */
    public readonly string $extension;

    /**
     * The path filename of the URL, in "[filename]" format.
     *
     * @var string URL path filename or empty string.
     */
    public readonly string $filename;

    /**
     * The fragment of the URL, in "[fragment]" format.
     *
     * @var string URL fragment or empty string.
     */
    public readonly string $fragment;

    /**
     * The full URL.
     */
    public readonly string $full;

    /**
     * The hashed fragment of the URL, in "[#fragment]" format.
     *
     * @var string URL hashed fragment or empty string.
     */
    public readonly string $hash;

    /**
     * The host of the URL, in "[subdomain.][domain][.tld]" format.
     *
     * @var string URL host or empty string.
     */
    public readonly string $host;

    /**
     * The path of the URL, in "[path]" format.
     *
     * @var string URL path or empty string.
     */
    public readonly string $path;

    /**
     * The query parameters of the URL, in array format.
     *
     * @var array<string, mixed> URL query or empty string.
     */
    public readonly array $parameters;

    /**
     * The password of the URL, in "[password]" format.
     *
     * @var string URL password or empty string.
     */
    public readonly string $password;

    /**
     * The port of the URL, in "[port]" format.
     *
     * @var string URL port or empty string.
     */
    public readonly int|string $port;

    /**
     * The scheme of the URL, in "[scheme]" format.
     *
     * @var string URL scheme or empty string.
     */
    public readonly string $scheme;

    /**
     * The path segments of the URL, in array format.
     *
     * @var string[] URL path segments or empty array.
     */
    public readonly array $segments;

    /**
     * The query of the URL, in "[query]" format.
     *
     * @var string URL query or empty string.
     */
    public readonly string $query;

    /**
     * The user name of the URL, in "[username]" format.
     *
     * @var string URL username or empty string.
     */
    public readonly string $username;

    /**
     * Result of parse URL.
     */
    private array|bool $components;

    /**
     * Creates new instance.
     *
     * If no URL is provided, the URL of the current page will be generated.
     * The generated URL will not include ports 80 and 443 in it.
     */
    public function __construct(?string $url = null)
    {
        $this->full = $url ?? $this->getCurrentUrl();

        $components = parse_url($this->full) ?: [];

        $this->components = [...$components, ...pathinfo($components['path'] ?? '')];

        $this->setAttributes();

        unset($this->components);
    }

    /**
     * Sets URL scheme.
     */
    private function getCurrentUrl(): string
    {
        $path  = $_SERVER['REQUEST_URL'] ?? '';
        $port  = $_SERVER['SERVER_PORT'] ?? '';
        $host  = $_SERVER['SERVER_NAME'] ?? '';
        $https = $_SERVER['HTTPS']       ?? '';

        $scheme = $https === 'on' ? 'https:' : 'http:';

        $port = in_array($port, ['80', '443']) ? '' : ':' .  $port;

        return strtolower($scheme . ($host ? '//' . $host : '')) . $port . $path;
    }

    private function setAttributes(): void
    {
        $this->setFragment();
        $this->setHost();
        $this->setHash();
        $this->setPath();
        $this->setPort();
        $this->setSegments();
        $this->setQuery();
        $this->setParameters();
        $this->setFilename();
        $this->setDirname();
        $this->setBasename();
        $this->setExtension();
        $this->setScheme();
        $this->setUsername();
        $this->setPassword();
        $this->setAuthority();
        $this->setBase();
    }

    private function setAuthority(): void
    {
        $port     = $this->port     ? ':' . $this->port     : '';
        $password = $this->password ? ':' . $this->password : '';

        $userInfo = ($this->username . $password) ? $this->username . $password . '@' : '';

        $this->authority = $userInfo . $this->host . $port;
    }

    private function setBase(): void
    {
        $scheme = $this->scheme ? $this->scheme . ':' : '';
        $host   = $this->host   ? '//' . $this->host  : '';
        $port   = $this->port   ? ':' . $this->port   : '';

        $this->base = $scheme . $host . $port;
    }

    private function setBasename(): void
    {
        $this->basename = $this->components['basename'] ?? '';
    }

    private function setDirname(): void
    {
        $this->dirname = $this->components['dirname'] ?? '';
    }

    private function setExtension(): void
    {
        $this->extension = $this->components['extension'] ?? '';
    }

    private function setFilename(): void
    {
        $this->filename = $this->components['filename'] ?? '';
    }

    private function setFragment(): void
    {
        $this->fragment = $this->components['fragment'] ?? '';
    }

    private function setHash(): void
    {
        $this->hash = $this->fragment ? '#' . $this->fragment : '';
    }

    private function setHost(): void
    {
        $this->host = $this->components['host'] ?? '';
    }

    private function setParameters(): void
    {
        $params = [];

        parse_str($this->query, $params);

        $this->parameters = $params;
    }

    private function setPassword(): void
    {
        $this->password = $this->components['pass'] ?? '';
    }

    private function setPath(): void
    {
        $this->path = $this->components['path'] ?? '';
    }

    private function setPort(): void
    {
        $this->port = $this->components['port'] ?? '';
    }

    private function setQuery(): void
    {
        $this->query = $this->components['query'] ?? '';
    }

    private function setScheme(): void
    {
        $this->scheme = $this->components['scheme'] ?? '';
    }

    private function setSegments(): void
    {
        $this->segments = $this->path ? explode('/', trim($this->path, '/')) : [];
    }

    private function setUsername(): void
    {
        $this->username = $this->components['user'] ?? '';
    }
}
