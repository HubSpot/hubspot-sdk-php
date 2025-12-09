<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The request object used for searching through lists.
 *
 * @phpstan-type ListSearchRequestShape = array{
 *   additionalProperties: list<string>,
 *   offset: int,
 *   count?: int|null,
 *   listIds?: list<string>|null,
 *   processingTypes?: list<string>|null,
 *   query?: string|null,
 *   sort?: string|null,
 * }
 */
final class ListSearchRequest implements BaseModel
{
    /** @use SdkModel<ListSearchRequestShape> */
    use SdkModel;

    /**
     * The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     *
     * @var list<string> $additionalProperties
     */
    #[Required(list: 'string')]
    public array $additionalProperties;

    /**
     * Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     */
    #[Required]
    public int $offset;

    /**
     * The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     */
    #[Optional]
    public ?int $count;

    /**
     * The `listIds` that will be used to filter results by `listId`. If values are provided, then the response will only include results that have a `listId` in this array.
     *
     * If no value is provided, or if an empty list is provided, then the results will not be filtered by `listId`.
     *
     * @var list<string>|null $listIds
     */
    #[Optional(list: 'string')]
    public ?array $listIds;

    /**
     * The `processingTypes` that will be used to filter results by `processingType`. If values are provided, then the response will only include results that have a `processingType` in this array.
     *
     * If no value is provided, or if an empty list is provided, then results will not be filtered by `processingType`.
     *
     * Valid `processingTypes` are: `MANUAL`, `SNAPSHOT`, or `DYNAMIC`.
     *
     * @var list<string>|null $processingTypes
     */
    #[Optional(list: 'string')]
    public ?array $processingTypes;

    /**
     * The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     */
    #[Optional]
    public ?string $query;

    #[Optional]
    public ?string $sort;

    /**
     * `new ListSearchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListSearchRequest::with(additionalProperties: ..., offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListSearchRequest)->withAdditionalProperties(...)->withOffset(...)
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
     * @param list<string> $additionalProperties
     * @param list<string> $listIds
     * @param list<string> $processingTypes
     */
    public static function with(
        array $additionalProperties,
        int $offset,
        ?int $count = null,
        ?array $listIds = null,
        ?array $processingTypes = null,
        ?string $query = null,
        ?string $sort = null,
    ): self {
        $obj = new self;

        $obj['additionalProperties'] = $additionalProperties;
        $obj['offset'] = $offset;

        null !== $count && $obj['count'] = $count;
        null !== $listIds && $obj['listIds'] = $listIds;
        null !== $processingTypes && $obj['processingTypes'] = $processingTypes;
        null !== $query && $obj['query'] = $query;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     *
     * @param list<string> $additionalProperties
     */
    public function withAdditionalProperties(array $additionalProperties): self
    {
        $obj = clone $this;
        $obj['additionalProperties'] = $additionalProperties;

        return $obj;
    }

    /**
     * Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     */
    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj['count'] = $count;

        return $obj;
    }

    /**
     * The `listIds` that will be used to filter results by `listId`. If values are provided, then the response will only include results that have a `listId` in this array.
     *
     * If no value is provided, or if an empty list is provided, then the results will not be filtered by `listId`.
     *
     * @param list<string> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $obj = clone $this;
        $obj['listIds'] = $listIDs;

        return $obj;
    }

    /**
     * The `processingTypes` that will be used to filter results by `processingType`. If values are provided, then the response will only include results that have a `processingType` in this array.
     *
     * If no value is provided, or if an empty list is provided, then results will not be filtered by `processingType`.
     *
     * Valid `processingTypes` are: `MANUAL`, `SNAPSHOT`, or `DYNAMIC`.
     *
     * @param list<string> $processingTypes
     */
    public function withProcessingTypes(array $processingTypes): self
    {
        $obj = clone $this;
        $obj['processingTypes'] = $processingTypes;

        return $obj;
    }

    /**
     * The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     */
    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj['query'] = $query;

        return $obj;
    }

    public function withSort(string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
