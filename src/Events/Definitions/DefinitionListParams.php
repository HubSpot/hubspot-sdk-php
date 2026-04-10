<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve existing custom event definitions.
 *
 * @see HubSpotSDK\Services\Events\DefinitionsService::list()
 *
 * @phpstan-type DefinitionListParamsShape = array{
 *   after?: string|null,
 *   includeProperties?: bool|null,
 *   limit?: int|null,
 *   searchString?: string|null,
 *   sortOrder?: string|null,
 * }
 */
final class DefinitionListParams implements BaseModel
{
    /** @use SdkModel<DefinitionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $includeProperties;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $searchString;

    #[Optional]
    public ?string $sortOrder;

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
        ?string $after = null,
        ?bool $includeProperties = null,
        ?int $limit = null,
        ?string $searchString = null,
        ?string $sortOrder = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $includeProperties && $self['includeProperties'] = $includeProperties;
        null !== $limit && $self['limit'] = $limit;
        null !== $searchString && $self['searchString'] = $searchString;
        null !== $sortOrder && $self['sortOrder'] = $sortOrder;

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

    public function withIncludeProperties(bool $includeProperties): self
    {
        $self = clone $this;
        $self['includeProperties'] = $includeProperties;

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

    public function withSearchString(string $searchString): self
    {
        $self = clone $this;
        $self['searchString'] = $searchString;

        return $self;
    }

    public function withSortOrder(string $sortOrder): self
    {
        $self = clone $this;
        $self['sortOrder'] = $sortOrder;

        return $self;
    }
}
