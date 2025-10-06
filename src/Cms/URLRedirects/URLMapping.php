<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type url_mapping = array{
 *   id: string,
 *   destination: string,
 *   isMatchFullURL: bool,
 *   isMatchQueryString: bool,
 *   isOnlyAfterNotFound: bool,
 *   isPattern: bool,
 *   isProtocolAgnostic: bool,
 *   isTrailingSlashOptional: bool,
 *   precedence: int,
 *   redirectStyle: int,
 *   routePrefix: string,
 *   created?: \DateTimeInterface,
 *   updated?: \DateTimeInterface,
 * }
 */
final class URLMapping implements BaseModel, ResponseConverter
{
    /** @use SdkModel<url_mapping> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public string $destination;

    #[Api('isMatchFullUrl')]
    public bool $isMatchFullURL;

    #[Api]
    public bool $isMatchQueryString;

    #[Api]
    public bool $isOnlyAfterNotFound;

    #[Api]
    public bool $isPattern;

    #[Api]
    public bool $isProtocolAgnostic;

    #[Api]
    public bool $isTrailingSlashOptional;

    #[Api]
    public int $precedence;

    #[Api]
    public int $redirectStyle;

    #[Api]
    public string $routePrefix;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated;

    /**
     * `new URLMapping()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLMapping::with(
     *   id: ...,
     *   destination: ...,
     *   isMatchFullURL: ...,
     *   isMatchQueryString: ...,
     *   isOnlyAfterNotFound: ...,
     *   isPattern: ...,
     *   isProtocolAgnostic: ...,
     *   isTrailingSlashOptional: ...,
     *   precedence: ...,
     *   redirectStyle: ...,
     *   routePrefix: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLMapping)
     *   ->withID(...)
     *   ->withDestination(...)
     *   ->withIsMatchFullURL(...)
     *   ->withIsMatchQueryString(...)
     *   ->withIsOnlyAfterNotFound(...)
     *   ->withIsPattern(...)
     *   ->withIsProtocolAgnostic(...)
     *   ->withIsTrailingSlashOptional(...)
     *   ->withPrecedence(...)
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
        string $id,
        string $destination,
        bool $isMatchFullURL,
        bool $isMatchQueryString,
        bool $isOnlyAfterNotFound,
        bool $isPattern,
        bool $isProtocolAgnostic,
        bool $isTrailingSlashOptional,
        int $precedence,
        int $redirectStyle,
        string $routePrefix,
        ?\DateTimeInterface $created = null,
        ?\DateTimeInterface $updated = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->destination = $destination;
        $obj->isMatchFullURL = $isMatchFullURL;
        $obj->isMatchQueryString = $isMatchQueryString;
        $obj->isOnlyAfterNotFound = $isOnlyAfterNotFound;
        $obj->isPattern = $isPattern;
        $obj->isProtocolAgnostic = $isProtocolAgnostic;
        $obj->isTrailingSlashOptional = $isTrailingSlashOptional;
        $obj->precedence = $precedence;
        $obj->redirectStyle = $redirectStyle;
        $obj->routePrefix = $routePrefix;

        null !== $created && $obj->created = $created;
        null !== $updated && $obj->updated = $updated;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

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

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj->updated = $updated;

        return $obj;
    }
}
