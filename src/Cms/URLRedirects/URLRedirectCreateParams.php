<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates and configures a new URL redirect.
 *
 * @see HubspotSDK\Services\Cms\URLRedirectsService::create()
 *
 * @phpstan-type URLRedirectCreateParamsShape = array{
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
final class URLRedirectCreateParams implements BaseModel
{
    /** @use SdkModel<URLRedirectCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $destination;

    #[Required]
    public int $redirectStyle;

    #[Required]
    public string $routePrefix;

    #[Optional('isMatchFullUrl')]
    public ?bool $isMatchFullURL;

    #[Optional]
    public ?bool $isMatchQueryString;

    #[Optional]
    public ?bool $isOnlyAfterNotFound;

    #[Optional]
    public ?bool $isPattern;

    #[Optional]
    public ?bool $isProtocolAgnostic;

    #[Optional]
    public ?bool $isTrailingSlashOptional;

    #[Optional]
    public ?int $precedence;

    /**
     * `new URLRedirectCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLRedirectCreateParams::with(
     *   destination: ..., redirectStyle: ..., routePrefix: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLRedirectCreateParams)
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

    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    public function withRedirectStyle(int $redirectStyle): self
    {
        $self = clone $this;
        $self['redirectStyle'] = $redirectStyle;

        return $self;
    }

    public function withRoutePrefix(string $routePrefix): self
    {
        $self = clone $this;
        $self['routePrefix'] = $routePrefix;

        return $self;
    }

    public function withIsMatchFullURL(bool $isMatchFullURL): self
    {
        $self = clone $this;
        $self['isMatchFullURL'] = $isMatchFullURL;

        return $self;
    }

    public function withIsMatchQueryString(bool $isMatchQueryString): self
    {
        $self = clone $this;
        $self['isMatchQueryString'] = $isMatchQueryString;

        return $self;
    }

    public function withIsOnlyAfterNotFound(bool $isOnlyAfterNotFound): self
    {
        $self = clone $this;
        $self['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;

        return $self;
    }

    public function withIsPattern(bool $isPattern): self
    {
        $self = clone $this;
        $self['isPattern'] = $isPattern;

        return $self;
    }

    public function withIsProtocolAgnostic(bool $isProtocolAgnostic): self
    {
        $self = clone $this;
        $self['isProtocolAgnostic'] = $isProtocolAgnostic;

        return $self;
    }

    public function withIsTrailingSlashOptional(
        bool $isTrailingSlashOptional
    ): self {
        $self = clone $this;
        $self['isTrailingSlashOptional'] = $isTrailingSlashOptional;

        return $self;
    }

    public function withPrecedence(int $precedence): self
    {
        $self = clone $this;
        $self['precedence'] = $precedence;

        return $self;
    }
}
