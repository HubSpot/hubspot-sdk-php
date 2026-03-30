<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLMappings;

use HubspotSDK\Cms\URLMappings\URLMappingCreateParams\CosObjectType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new URL mapping in your HubSpot account. This endpoint allows you to define URL redirections and mappings, which can be useful for managing site navigation and SEO. The request body must include all required properties of the UrlMapping schema.
 *
 * @see HubspotSDK\Services\Cms\URLMappingsService::create()
 *
 * @phpstan-type URLMappingCreateParamsShape = array{
 *   id: int,
 *   cdnPurgeEmbargoTime: int,
 *   contentGroupID: int,
 *   cosObjectType: CosObjectType|value-of<CosObjectType>,
 *   created: int,
 *   createdByID: int,
 *   deletedAt: int,
 *   destination: string,
 *   internallyCreated: bool,
 *   isActive: bool,
 *   isMatchFullURL: bool,
 *   isMatchQueryString: bool,
 *   isOnlyAfterNotFound: bool,
 *   isPattern: bool,
 *   isProtocolAgnostic: bool,
 *   isRegex: bool,
 *   isTrailingSlashOptional: bool,
 *   label: string,
 *   name: string,
 *   note: string,
 *   portalID: int,
 *   precedence: int,
 *   redirectStyle: int,
 *   routePrefix: string,
 *   updated: int,
 *   updatedByID: int,
 * }
 */
final class URLMappingCreateParams implements BaseModel
{
    /** @use SdkModel<URLMappingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier for the URL mapping, represented as a 64-bit integer.
     */
    #[Required]
    public int $id;

    /**
     * A Unix timestamp in milliseconds indicating the embargo time for CDN purge related to the URL mapping.
     */
    #[Required]
    public int $cdnPurgeEmbargoTime;

    /**
     * A 64-bit integer representing the content group associated with the URL mapping.
     */
    #[Required('contentGroupId')]
    public int $contentGroupID;

    /**
     * A string representing the type of content object associated with the URL mapping. Valid values include various content types such as 'CONTENT', 'LAYOUT', 'FILE', etc.
     *
     * @var value-of<CosObjectType> $cosObjectType
     */
    #[Required(enum: CosObjectType::class)]
    public string $cosObjectType;

    /**
     * A Unix timestamp in milliseconds indicating when the URL mapping was created.
     */
    #[Required]
    public int $created;

    /**
     * The identifier of the user who created the URL mapping.
     */
    #[Required('createdById')]
    public int $createdByID;

    /**
     * A Unix timestamp in milliseconds indicating when the URL mapping was deleted.
     */
    #[Required]
    public int $deletedAt;

    /**
     * The destination URL to which the routePrefix is redirected.
     */
    #[Required]
    public string $destination;

    /**
     * A boolean indicating if the URL mapping was created internally by the system.
     */
    #[Required]
    public bool $internallyCreated;

    /**
     * A boolean indicating if the URL mapping is currently active.
     */
    #[Required]
    public bool $isActive;

    /**
     * A boolean indicating if the full URL should be matched.
     */
    #[Required('isMatchFullUrl')]
    public bool $isMatchFullURL;

    /**
     * A boolean indicating if the query string should be matched.
     */
    #[Required]
    public bool $isMatchQueryString;

    /**
     * A boolean indicating if the mapping should only be applied after a 404 Not Found response.
     */
    #[Required]
    public bool $isOnlyAfterNotFound;

    /**
     * A boolean indicating if the routePrefix is a pattern.
     */
    #[Required]
    public bool $isPattern;

    /**
     * A boolean indicating if the mapping should ignore the URL protocol (http/https).
     */
    #[Required]
    public bool $isProtocolAgnostic;

    /**
     * A boolean indicating if the routePrefix should be treated as a regular expression.
     */
    #[Required]
    public bool $isRegex;

    /**
     * A boolean indicating if the trailing slash in the URL is optional.
     */
    #[Required]
    public bool $isTrailingSlashOptional;

    /**
     * A label for the URL mapping.
     */
    #[Required]
    public string $label;

    /**
     * The name of the URL mapping.
     */
    #[Required]
    public string $name;

    /**
     * A string containing notes about the URL mapping.
     */
    #[Required]
    public string $note;

    /**
     * The identifier for the HubSpot portal associated with this URL mapping.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * An integer representing the precedence of the URL mapping, used to determine order of evaluation.
     */
    #[Required]
    public int $precedence;

    /**
     * An integer representing the style of redirection used.
     */
    #[Required]
    public int $redirectStyle;

    /**
     * The prefix of the URL path that is being mapped.
     */
    #[Required]
    public string $routePrefix;

    /**
     * A Unix timestamp in milliseconds indicating when the URL mapping was last updated.
     */
    #[Required]
    public int $updated;

    /**
     * The identifier of the user who last updated the URL mapping.
     */
    #[Required('updatedById')]
    public int $updatedByID;

    /**
     * `new URLMappingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLMappingCreateParams::with(
     *   id: ...,
     *   cdnPurgeEmbargoTime: ...,
     *   contentGroupID: ...,
     *   cosObjectType: ...,
     *   created: ...,
     *   createdByID: ...,
     *   deletedAt: ...,
     *   destination: ...,
     *   internallyCreated: ...,
     *   isActive: ...,
     *   isMatchFullURL: ...,
     *   isMatchQueryString: ...,
     *   isOnlyAfterNotFound: ...,
     *   isPattern: ...,
     *   isProtocolAgnostic: ...,
     *   isRegex: ...,
     *   isTrailingSlashOptional: ...,
     *   label: ...,
     *   name: ...,
     *   note: ...,
     *   portalID: ...,
     *   precedence: ...,
     *   redirectStyle: ...,
     *   routePrefix: ...,
     *   updated: ...,
     *   updatedByID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLMappingCreateParams)
     *   ->withID(...)
     *   ->withCdnPurgeEmbargoTime(...)
     *   ->withContentGroupID(...)
     *   ->withCosObjectType(...)
     *   ->withCreated(...)
     *   ->withCreatedByID(...)
     *   ->withDeletedAt(...)
     *   ->withDestination(...)
     *   ->withInternallyCreated(...)
     *   ->withIsActive(...)
     *   ->withIsMatchFullURL(...)
     *   ->withIsMatchQueryString(...)
     *   ->withIsOnlyAfterNotFound(...)
     *   ->withIsPattern(...)
     *   ->withIsProtocolAgnostic(...)
     *   ->withIsRegex(...)
     *   ->withIsTrailingSlashOptional(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withNote(...)
     *   ->withPortalID(...)
     *   ->withPrecedence(...)
     *   ->withRedirectStyle(...)
     *   ->withRoutePrefix(...)
     *   ->withUpdated(...)
     *   ->withUpdatedByID(...)
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
     *
     * @param CosObjectType|value-of<CosObjectType> $cosObjectType
     */
    public static function with(
        int $id,
        int $cdnPurgeEmbargoTime,
        int $contentGroupID,
        CosObjectType|string $cosObjectType,
        int $created,
        int $createdByID,
        int $deletedAt,
        string $destination,
        bool $internallyCreated,
        bool $isActive,
        bool $isMatchFullURL,
        bool $isMatchQueryString,
        bool $isOnlyAfterNotFound,
        bool $isPattern,
        bool $isProtocolAgnostic,
        bool $isRegex,
        bool $isTrailingSlashOptional,
        string $label,
        string $name,
        string $note,
        int $portalID,
        int $precedence,
        int $redirectStyle,
        string $routePrefix,
        int $updated,
        int $updatedByID,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['cdnPurgeEmbargoTime'] = $cdnPurgeEmbargoTime;
        $self['contentGroupID'] = $contentGroupID;
        $self['cosObjectType'] = $cosObjectType;
        $self['created'] = $created;
        $self['createdByID'] = $createdByID;
        $self['deletedAt'] = $deletedAt;
        $self['destination'] = $destination;
        $self['internallyCreated'] = $internallyCreated;
        $self['isActive'] = $isActive;
        $self['isMatchFullURL'] = $isMatchFullURL;
        $self['isMatchQueryString'] = $isMatchQueryString;
        $self['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;
        $self['isPattern'] = $isPattern;
        $self['isProtocolAgnostic'] = $isProtocolAgnostic;
        $self['isRegex'] = $isRegex;
        $self['isTrailingSlashOptional'] = $isTrailingSlashOptional;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['note'] = $note;
        $self['portalID'] = $portalID;
        $self['precedence'] = $precedence;
        $self['redirectStyle'] = $redirectStyle;
        $self['routePrefix'] = $routePrefix;
        $self['updated'] = $updated;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }

    /**
     * The unique identifier for the URL mapping, represented as a 64-bit integer.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A Unix timestamp in milliseconds indicating the embargo time for CDN purge related to the URL mapping.
     */
    public function withCdnPurgeEmbargoTime(int $cdnPurgeEmbargoTime): self
    {
        $self = clone $this;
        $self['cdnPurgeEmbargoTime'] = $cdnPurgeEmbargoTime;

        return $self;
    }

    /**
     * A 64-bit integer representing the content group associated with the URL mapping.
     */
    public function withContentGroupID(int $contentGroupID): self
    {
        $self = clone $this;
        $self['contentGroupID'] = $contentGroupID;

        return $self;
    }

    /**
     * A string representing the type of content object associated with the URL mapping. Valid values include various content types such as 'CONTENT', 'LAYOUT', 'FILE', etc.
     *
     * @param CosObjectType|value-of<CosObjectType> $cosObjectType
     */
    public function withCosObjectType(CosObjectType|string $cosObjectType): self
    {
        $self = clone $this;
        $self['cosObjectType'] = $cosObjectType;

        return $self;
    }

    /**
     * A Unix timestamp in milliseconds indicating when the URL mapping was created.
     */
    public function withCreated(int $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The identifier of the user who created the URL mapping.
     */
    public function withCreatedByID(int $createdByID): self
    {
        $self = clone $this;
        $self['createdByID'] = $createdByID;

        return $self;
    }

    /**
     * A Unix timestamp in milliseconds indicating when the URL mapping was deleted.
     */
    public function withDeletedAt(int $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * The destination URL to which the routePrefix is redirected.
     */
    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    /**
     * A boolean indicating if the URL mapping was created internally by the system.
     */
    public function withInternallyCreated(bool $internallyCreated): self
    {
        $self = clone $this;
        $self['internallyCreated'] = $internallyCreated;

        return $self;
    }

    /**
     * A boolean indicating if the URL mapping is currently active.
     */
    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    /**
     * A boolean indicating if the full URL should be matched.
     */
    public function withIsMatchFullURL(bool $isMatchFullURL): self
    {
        $self = clone $this;
        $self['isMatchFullURL'] = $isMatchFullURL;

        return $self;
    }

    /**
     * A boolean indicating if the query string should be matched.
     */
    public function withIsMatchQueryString(bool $isMatchQueryString): self
    {
        $self = clone $this;
        $self['isMatchQueryString'] = $isMatchQueryString;

        return $self;
    }

    /**
     * A boolean indicating if the mapping should only be applied after a 404 Not Found response.
     */
    public function withIsOnlyAfterNotFound(bool $isOnlyAfterNotFound): self
    {
        $self = clone $this;
        $self['isOnlyAfterNotFound'] = $isOnlyAfterNotFound;

        return $self;
    }

    /**
     * A boolean indicating if the routePrefix is a pattern.
     */
    public function withIsPattern(bool $isPattern): self
    {
        $self = clone $this;
        $self['isPattern'] = $isPattern;

        return $self;
    }

    /**
     * A boolean indicating if the mapping should ignore the URL protocol (http/https).
     */
    public function withIsProtocolAgnostic(bool $isProtocolAgnostic): self
    {
        $self = clone $this;
        $self['isProtocolAgnostic'] = $isProtocolAgnostic;

        return $self;
    }

    /**
     * A boolean indicating if the routePrefix should be treated as a regular expression.
     */
    public function withIsRegex(bool $isRegex): self
    {
        $self = clone $this;
        $self['isRegex'] = $isRegex;

        return $self;
    }

    /**
     * A boolean indicating if the trailing slash in the URL is optional.
     */
    public function withIsTrailingSlashOptional(
        bool $isTrailingSlashOptional
    ): self {
        $self = clone $this;
        $self['isTrailingSlashOptional'] = $isTrailingSlashOptional;

        return $self;
    }

    /**
     * A label for the URL mapping.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The name of the URL mapping.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A string containing notes about the URL mapping.
     */
    public function withNote(string $note): self
    {
        $self = clone $this;
        $self['note'] = $note;

        return $self;
    }

    /**
     * The identifier for the HubSpot portal associated with this URL mapping.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * An integer representing the precedence of the URL mapping, used to determine order of evaluation.
     */
    public function withPrecedence(int $precedence): self
    {
        $self = clone $this;
        $self['precedence'] = $precedence;

        return $self;
    }

    /**
     * An integer representing the style of redirection used.
     */
    public function withRedirectStyle(int $redirectStyle): self
    {
        $self = clone $this;
        $self['redirectStyle'] = $redirectStyle;

        return $self;
    }

    /**
     * The prefix of the URL path that is being mapped.
     */
    public function withRoutePrefix(string $routePrefix): self
    {
        $self = clone $this;
        $self['routePrefix'] = $routePrefix;

        return $self;
    }

    /**
     * A Unix timestamp in milliseconds indicating when the URL mapping was last updated.
     */
    public function withUpdated(int $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }

    /**
     * The identifier of the user who last updated the URL mapping.
     */
    public function withUpdatedByID(int $updatedByID): self
    {
        $self = clone $this;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }
}
