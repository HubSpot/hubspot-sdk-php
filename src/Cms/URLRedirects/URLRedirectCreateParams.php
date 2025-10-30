<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates and configures a new URL redirect.
 *
 * @see HubspotSDK\Cms\URLRedirects->create
 *
 * @phpstan-type URLRedirectCreateParamsShape = array{
 *   destination: string,
 *   redirectStyle: int,
 *   routePrefix: string,
 *   isMatchFullURL?: bool,
 *   isMatchQueryString?: bool,
 *   isOnlyAfterNotFound?: bool,
 *   isPattern?: bool,
 *   isProtocolAgnostic?: bool,
 *   isTrailingSlashOptional?: bool,
 *   precedence?: int,
 * }
 */
final class URLRedirectCreateParams implements BaseModel
{
    /** @use SdkModel<URLRedirectCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $destination;

    #[Api]
    public int $redirectStyle;

    #[Api]
    public string $routePrefix;

    #[Api('isMatchFullUrl', optional: true)]
    public ?bool $isMatchFullURL;

    #[Api(optional: true)]
    public ?bool $isMatchQueryString;

    #[Api(optional: true)]
    public ?bool $isOnlyAfterNotFound;

    #[Api(optional: true)]
    public ?bool $isPattern;

    #[Api(optional: true)]
    public ?bool $isProtocolAgnostic;

    #[Api(optional: true)]
    public ?bool $isTrailingSlashOptional;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->destination = $destination;
        $obj->redirectStyle = $redirectStyle;
        $obj->routePrefix = $routePrefix;

        null !== $isMatchFullURL && $obj->isMatchFullURL = $isMatchFullURL;
        null !== $isMatchQueryString && $obj->isMatchQueryString = $isMatchQueryString;
        null !== $isOnlyAfterNotFound && $obj->isOnlyAfterNotFound = $isOnlyAfterNotFound;
        null !== $isPattern && $obj->isPattern = $isPattern;
        null !== $isProtocolAgnostic && $obj->isProtocolAgnostic = $isProtocolAgnostic;
        null !== $isTrailingSlashOptional && $obj->isTrailingSlashOptional = $isTrailingSlashOptional;
        null !== $precedence && $obj->precedence = $precedence;

        return $obj;
    }

    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    public function withRedirectStyle(int $redirectStyle): self
    {
        $obj = clone $this;
        $obj->redirectStyle = $redirectStyle;

        return $obj;
    }

    public function withRoutePrefix(string $routePrefix): self
    {
        $obj = clone $this;
        $obj->routePrefix = $routePrefix;

        return $obj;
    }

    public function withIsMatchFullURL(bool $isMatchFullURL): self
    {
        $obj = clone $this;
        $obj->isMatchFullURL = $isMatchFullURL;

        return $obj;
    }

    public function withIsMatchQueryString(bool $isMatchQueryString): self
    {
        $obj = clone $this;
        $obj->isMatchQueryString = $isMatchQueryString;

        return $obj;
    }

    public function withIsOnlyAfterNotFound(bool $isOnlyAfterNotFound): self
    {
        $obj = clone $this;
        $obj->isOnlyAfterNotFound = $isOnlyAfterNotFound;

        return $obj;
    }

    public function withIsPattern(bool $isPattern): self
    {
        $obj = clone $this;
        $obj->isPattern = $isPattern;

        return $obj;
    }

    public function withIsProtocolAgnostic(bool $isProtocolAgnostic): self
    {
        $obj = clone $this;
        $obj->isProtocolAgnostic = $isProtocolAgnostic;

        return $obj;
    }

    public function withIsTrailingSlashOptional(
        bool $isTrailingSlashOptional
    ): self {
        $obj = clone $this;
        $obj->isTrailingSlashOptional = $isTrailingSlashOptional;

        return $obj;
    }

    public function withPrecedence(int $precedence): self
    {
        $obj = clone $this;
        $obj->precedence = $precedence;

        return $obj;
    }
}
