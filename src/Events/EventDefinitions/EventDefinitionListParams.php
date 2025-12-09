<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve existing custom event definitions.
 *
 * @see HubspotSDK\Services\Events\EventDefinitionsService::list()
 *
 * @phpstan-type EventDefinitionListParamsShape = array{
 *   after?: string,
 *   includeProperties?: bool,
 *   limit?: int,
 *   searchString?: string,
 *   sortOrder?: string,
 * }
 */
final class EventDefinitionListParams implements BaseModel
{
    /** @use SdkModel<EventDefinitionListParamsShape> */
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

    /**
     * Characters in the event name that the user is searching for. This search is a naive “contains” search, no fuzzy matching is done.
     */
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
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $includeProperties && $obj['includeProperties'] = $includeProperties;
        null !== $limit && $obj['limit'] = $limit;
        null !== $searchString && $obj['searchString'] = $searchString;
        null !== $sortOrder && $obj['sortOrder'] = $sortOrder;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    public function withIncludeProperties(bool $includeProperties): self
    {
        $obj = clone $this;
        $obj['includeProperties'] = $includeProperties;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * Characters in the event name that the user is searching for. This search is a naive “contains” search, no fuzzy matching is done.
     */
    public function withSearchString(string $searchString): self
    {
        $obj = clone $this;
        $obj['searchString'] = $searchString;

        return $obj;
    }

    public function withSortOrder(string $sortOrder): self
    {
        $obj = clone $this;
        $obj['sortOrder'] = $sortOrder;

        return $obj;
    }
}
