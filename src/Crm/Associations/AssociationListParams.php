<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Associations;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all associations between a specific record and an object type. Limit 500 per call.
 *
 * @see HubSpotSDK\Services\Crm\AssociationsService::list()
 *
 * @phpstan-type AssociationListParamsShape = array{
 *   objectType: string, objectID: string, after?: string|null, limit?: int|null
 * }
 */
final class AssociationListParams implements BaseModel
{
    /** @use SdkModel<AssociationListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $objectID;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * `new AssociationListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationListParams::with(objectType: ..., objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationListParams)->withObjectType(...)->withObjectID(...)
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
        string $objectType,
        string $objectID,
        ?string $after = null,
        ?int $limit = null,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['objectID'] = $objectID;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
