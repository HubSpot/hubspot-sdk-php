<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type URLMappingShape = array{
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
    /** @use SdkModel<URLMappingShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The unique ID of this URL redirect.
     */
    #[Api]
    public string $id;

    /**
     * The destination URL, where the target URL should be redirected if it matches the `routePrefix`.
     */
    #[Api]
    public string $destination;

    /**
     * Whether the `routePrefix` should match on the entire URL, including the domain.
     */
    #[Api('isMatchFullUrl')]
    public bool $isMatchFullURL;

    /**
     * Whether the `routePrefix` should match on the entire URL path, including the query string.
     */
    #[Api]
    public bool $isMatchQueryString;

    /**
     * Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     */
    #[Api]
    public bool $isOnlyAfterNotFound;

    /**
     * Whether the `routePrefix` should match based on pattern.
     */
    #[Api]
    public bool $isPattern;

    /**
     * Whether the `routePrefix` should match both HTTP and HTTPS protocols.
     */
    #[Api]
    public bool $isProtocolAgnostic;

    /**
     * Whether a trailing slash will be ignored.
     */
    #[Api]
    public bool $isTrailingSlashOptional;

    /**
     * Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the **lower** precedence will be used.
     */
    #[Api]
    public int $precedence;

    /**
     * The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy). Find more details [here](https://knowledge.hubspot.com/cos-general/how-to-redirect-a-hubspot-page).
     */
    #[Api]
    public int $redirectStyle;

    /**
     * The target incoming URL, path, or pattern to match for redirection.
     */
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

    /**
     * The unique ID of this URL redirect.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The destination URL, where the target URL should be redirected if it matches the `routePrefix`.
     */
    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    /**
     * Whether the `routePrefix` should match on the entire URL, including the domain.
     */
    public function withIsMatchFullURL(bool $isMatchFullURL): self
    {
        $obj = clone $this;
        $obj->isMatchFullURL = $isMatchFullURL;

        return $obj;
    }

    /**
     * Whether the `routePrefix` should match on the entire URL path, including the query string.
     */
    public function withIsMatchQueryString(bool $isMatchQueryString): self
    {
        $obj = clone $this;
        $obj->isMatchQueryString = $isMatchQueryString;

        return $obj;
    }

    /**
     * Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     */
    public function withIsOnlyAfterNotFound(bool $isOnlyAfterNotFound): self
    {
        $obj = clone $this;
        $obj->isOnlyAfterNotFound = $isOnlyAfterNotFound;

        return $obj;
    }

    /**
     * Whether the `routePrefix` should match based on pattern.
     */
    public function withIsPattern(bool $isPattern): self
    {
        $obj = clone $this;
        $obj->isPattern = $isPattern;

        return $obj;
    }

    /**
     * Whether the `routePrefix` should match both HTTP and HTTPS protocols.
     */
    public function withIsProtocolAgnostic(bool $isProtocolAgnostic): self
    {
        $obj = clone $this;
        $obj->isProtocolAgnostic = $isProtocolAgnostic;

        return $obj;
    }

    /**
     * Whether a trailing slash will be ignored.
     */
    public function withIsTrailingSlashOptional(
        bool $isTrailingSlashOptional
    ): self {
        $obj = clone $this;
        $obj->isTrailingSlashOptional = $isTrailingSlashOptional;

        return $obj;
    }

    /**
     * Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the **lower** precedence will be used.
     */
    public function withPrecedence(int $precedence): self
    {
        $obj = clone $this;
        $obj->precedence = $precedence;

        return $obj;
    }

    /**
     * The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy). Find more details [here](https://knowledge.hubspot.com/cos-general/how-to-redirect-a-hubspot-page).
     */
    public function withRedirectStyle(int $redirectStyle): self
    {
        $obj = clone $this;
        $obj->redirectStyle = $redirectStyle;

        return $obj;
    }

    /**
     * The target incoming URL, path, or pattern to match for redirection.
     */
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
