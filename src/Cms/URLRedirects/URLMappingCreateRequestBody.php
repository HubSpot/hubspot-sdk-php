<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type URLMappingCreateRequestBodyShape = array{
 *   destination: string,
 *   redirectStyle: int,
 *   routePrefix: string,
 *   isMatchFullURL?: bool|null,
 *   isMatchQueryString?: bool|null,
 *   isOnlyAfterNotFound?: bool|null,
 *   isPattern?: bool|null,
 *   isProtocolAgnostic?: bool|null,
 *   isTrailingSlashOptional?: bool|null,
 *   precedence?: int|null,
 * }
 */
final class URLMappingCreateRequestBody implements BaseModel
{
    /** @use SdkModel<URLMappingCreateRequestBodyShape> */
    use SdkModel;

    /**
     * The destination URL, where the target URL should be redirected if it matches the routePrefix.
     */
    #[Required]
    public string $destination;

    /**
     * The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy).
     */
    #[Required]
    public int $redirectStyle;

    /**
     * The target incoming URL, path, or pattern to match for redirection.
     */
    #[Required]
    public string $routePrefix;

    /**
     * Whether the routePrefix should match on the entire URL, including the domain.
     */
    #[Optional('isMatchFullUrl')]
    public ?bool $isMatchFullURL;

    /**
     * Whether the routePrefix should match on the entire URL path, including the query string.
     */
    #[Optional]
    public ?bool $isMatchQueryString;

    /**
     * Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     */
    #[Optional]
    public ?bool $isOnlyAfterNotFound;

    /**
     * Whether the routePrefix should match based on pattern.
     */
    #[Optional]
    public ?bool $isPattern;

    /**
     * Whether the routePrefix should match both HTTP and HTTPS protocols.
     */
    #[Optional]
    public ?bool $isProtocolAgnostic;

    /**
     * Whether a trailing slash will be ignored.
     */
    #[Optional]
    public ?bool $isTrailingSlashOptional;

    /**
     * Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the lower precedence will be used.
     */
    #[Optional]
    public ?int $precedence;

    /**
     * `new URLMappingCreateRequestBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLMappingCreateRequestBody::with(
     *   destination: ..., redirectStyle: ..., routePrefix: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLMappingCreateRequestBody)
     *   ->withDestination(...)
     *   ->withRedirectStyle(...)
     *   ->withRoutePrefix(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $destination,
        int $redirectStyle,
        string $routePrefix,
        ?bool $isMatchFullURL = null,
        ?bool $isMatchQueryString = null,
        ?bool $isOnlyAfterNotFound = null,
        ?bool $isPattern = null,
        ?bool $isProtocolAgnostic = null,
        ?bool $isTrailingSlashOptional = null,
        ?int $precedence = null,
    ): self {
        $self = new self;

        $self['destination'] = $destination;
        $self['redirectStyle'] = $redirectStyle;
        $self['routePrefix'] = $routePrefix;

        null !== $isMatchFullURL && $self['isMatchFullURL'] = $isMatchFullURL;
        null !== $isMatchQueryString && $self['isMatchQueryString'] = $isMatchQueryString;
        null !== $isOnlyAfterNotFound && $self['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;
        null !== $isPattern && $self['isPattern'] = $isPattern;
        null !== $isProtocolAgnostic && $self['isProtocolAgnostic'] = $isProtocolAgnostic;
        null !== $isTrailingSlashOptional && $self['isTrailingSlashOptional'] = $isTrailingSlashOptional;
        null !== $precedence && $self['precedence'] = $precedence;

        return $self;
    }

    /**
     * The destination URL, where the target URL should be redirected if it matches the routePrefix.
     */
    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    /**
     * The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy).
     */
    public function withRedirectStyle(int $redirectStyle): self
    {
        $self = clone $this;
        $self['redirectStyle'] = $redirectStyle;

        return $self;
    }

    /**
     * The target incoming URL, path, or pattern to match for redirection.
     */
    public function withRoutePrefix(string $routePrefix): self
    {
        $self = clone $this;
        $self['routePrefix'] = $routePrefix;

        return $self;
    }

    /**
     * Whether the routePrefix should match on the entire URL, including the domain.
     */
    public function withIsMatchFullURL(bool $isMatchFullURL): self
    {
        $self = clone $this;
        $self['isMatchFullURL'] = $isMatchFullURL;

        return $self;
    }

    /**
     * Whether the routePrefix should match on the entire URL path, including the query string.
     */
    public function withIsMatchQueryString(bool $isMatchQueryString): self
    {
        $self = clone $this;
        $self['isMatchQueryString'] = $isMatchQueryString;

        return $self;
    }

    /**
     * Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     */
    public function withIsOnlyAfterNotFound(bool $isOnlyAfterNotFound): self
    {
        $self = clone $this;
        $self['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;

        return $self;
    }

    /**
     * Whether the routePrefix should match based on pattern.
     */
    public function withIsPattern(bool $isPattern): self
    {
        $self = clone $this;
        $self['isPattern'] = $isPattern;

        return $self;
    }

    /**
     * Whether the routePrefix should match both HTTP and HTTPS protocols.
     */
    public function withIsProtocolAgnostic(bool $isProtocolAgnostic): self
    {
        $self = clone $this;
        $self['isProtocolAgnostic'] = $isProtocolAgnostic;

        return $self;
    }

    /**
     * Whether a trailing slash will be ignored.
     */
    public function withIsTrailingSlashOptional(
        bool $isTrailingSlashOptional
    ): self {
        $self = clone $this;
        $self['isTrailingSlashOptional'] = $isTrailingSlashOptional;

        return $self;
    }

    /**
     * Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the lower precedence will be used.
     */
    public function withPrecedence(int $precedence): self
    {
        $self = clone $this;
        $self['precedence'] = $precedence;

        return $self;
    }
}
