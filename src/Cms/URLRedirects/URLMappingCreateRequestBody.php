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
 *   isMatchFullUrl?: bool|null,
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

    #[Required]
    public string $destination;

    #[Required]
    public int $redirectStyle;

    #[Required]
    public string $routePrefix;

    #[Optional]
    public ?bool $isMatchFullUrl;

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
        ?bool $isMatchFullUrl = null,
        ?bool $isMatchQueryString = null,
        ?bool $isOnlyAfterNotFound = null,
        ?bool $isPattern = null,
        ?bool $isProtocolAgnostic = null,
        ?bool $isTrailingSlashOptional = null,
        ?int $precedence = null,
    ): self {
        $obj = new self;

        $obj['destination'] = $destination;
        $obj['redirectStyle'] = $redirectStyle;
        $obj['routePrefix'] = $routePrefix;

        null !== $isMatchFullUrl && $obj['isMatchFullUrl'] = $isMatchFullUrl;
        null !== $isMatchQueryString && $obj['isMatchQueryString'] = $isMatchQueryString;
        null !== $isOnlyAfterNotFound && $obj['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;
        null !== $isPattern && $obj['isPattern'] = $isPattern;
        null !== $isProtocolAgnostic && $obj['isProtocolAgnostic'] = $isProtocolAgnostic;
        null !== $isTrailingSlashOptional && $obj['isTrailingSlashOptional'] = $isTrailingSlashOptional;
        null !== $precedence && $obj['precedence'] = $precedence;

        return $obj;
    }

    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj['destination'] = $destination;

        return $obj;
    }

    public function withRedirectStyle(int $redirectStyle): self
    {
        $obj = clone $this;
        $obj['redirectStyle'] = $redirectStyle;

        return $obj;
    }

    public function withRoutePrefix(string $routePrefix): self
    {
        $obj = clone $this;
        $obj['routePrefix'] = $routePrefix;

        return $obj;
    }

    public function withIsMatchFullURL(bool $isMatchFullURL): self
    {
        $obj = clone $this;
        $obj['isMatchFullUrl'] = $isMatchFullURL;

        return $obj;
    }

    public function withIsMatchQueryString(bool $isMatchQueryString): self
    {
        $obj = clone $this;
        $obj['isMatchQueryString'] = $isMatchQueryString;

        return $obj;
    }

    public function withIsOnlyAfterNotFound(bool $isOnlyAfterNotFound): self
    {
        $obj = clone $this;
        $obj['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;

        return $obj;
    }

    public function withIsPattern(bool $isPattern): self
    {
        $obj = clone $this;
        $obj['isPattern'] = $isPattern;

        return $obj;
    }

    public function withIsProtocolAgnostic(bool $isProtocolAgnostic): self
    {
        $obj = clone $this;
        $obj['isProtocolAgnostic'] = $isProtocolAgnostic;

        return $obj;
    }

    public function withIsTrailingSlashOptional(
        bool $isTrailingSlashOptional
    ): self {
        $obj = clone $this;
        $obj['isTrailingSlashOptional'] = $isTrailingSlashOptional;

        return $obj;
    }

    public function withPrecedence(int $precedence): self
    {
        $obj = clone $this;
        $obj['precedence'] = $precedence;

        return $obj;
    }
}
