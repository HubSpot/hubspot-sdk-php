<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
 *   created?: \DateTimeInterface|null,
 *   updated?: \DateTimeInterface|null,
 * }
 */
final class URLMapping implements BaseModel
{
    /** @use SdkModel<URLMappingShape> */
    use SdkModel;

    /**
     * The unique ID of this URL redirect.
     */
    #[Required]
    public string $id;

    /**
     * The destination URL, where the target URL should be redirected if it matches the `routePrefix`.
     */
    #[Required]
    public string $destination;

    /**
     * Whether the `routePrefix` should match on the entire URL, including the domain.
     */
    #[Required('isMatchFullUrl')]
    public bool $isMatchFullURL;

    /**
     * Whether the `routePrefix` should match on the entire URL path, including the query string.
     */
    #[Required]
    public bool $isMatchQueryString;

    /**
     * Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     */
    #[Required]
    public bool $isOnlyAfterNotFound;

    /**
     * Whether the `routePrefix` should match based on pattern.
     */
    #[Required]
    public bool $isPattern;

    /**
     * Whether the `routePrefix` should match both HTTP and HTTPS protocols.
     */
    #[Required]
    public bool $isProtocolAgnostic;

    /**
     * Whether a trailing slash will be ignored.
     */
    #[Required]
    public bool $isTrailingSlashOptional;

    /**
     * Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the **lower** precedence will be used.
     */
    #[Required]
    public int $precedence;

    /**
     * The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy). Find more details [here](https://knowledge.hubspot.com/cos-general/how-to-redirect-a-hubspot-page).
     */
    #[Required]
    public int $redirectStyle;

    /**
     * The target incoming URL, path, or pattern to match for redirection.
     */
    #[Required]
    public string $routePrefix;

    #[Optional]
    public ?\DateTimeInterface $created;

    #[Optional]
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
        $self = new self;

        $self['id'] = $id;
        $self['destination'] = $destination;
        $self['isMatchFullURL'] = $isMatchFullURL;
        $self['isMatchQueryString'] = $isMatchQueryString;
        $self['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;
        $self['isPattern'] = $isPattern;
        $self['isProtocolAgnostic'] = $isProtocolAgnostic;
        $self['isTrailingSlashOptional'] = $isTrailingSlashOptional;
        $self['precedence'] = $precedence;
        $self['redirectStyle'] = $redirectStyle;
        $self['routePrefix'] = $routePrefix;

        null !== $created && $self['created'] = $created;
        null !== $updated && $self['updated'] = $updated;

        return $self;
    }

    /**
     * The unique ID of this URL redirect.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The destination URL, where the target URL should be redirected if it matches the `routePrefix`.
     */
    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    /**
     * Whether the `routePrefix` should match on the entire URL, including the domain.
     */
    public function withIsMatchFullURL(bool $isMatchFullURL): self
    {
        $self = clone $this;
        $self['isMatchFullURL'] = $isMatchFullURL;

        return $self;
    }

    /**
     * Whether the `routePrefix` should match on the entire URL path, including the query string.
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
     * Whether the `routePrefix` should match based on pattern.
     */
    public function withIsPattern(bool $isPattern): self
    {
        $self = clone $this;
        $self['isPattern'] = $isPattern;

        return $self;
    }

    /**
     * Whether the `routePrefix` should match both HTTP and HTTPS protocols.
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
     * Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the **lower** precedence will be used.
     */
    public function withPrecedence(int $precedence): self
    {
        $self = clone $this;
        $self['precedence'] = $precedence;

        return $self;
    }

    /**
     * The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy). Find more details [here](https://knowledge.hubspot.com/cos-general/how-to-redirect-a-hubspot-page).
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

    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }
}
