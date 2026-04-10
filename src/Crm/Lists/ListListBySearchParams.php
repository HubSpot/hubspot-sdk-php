<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::listBySearch()
 *
 * @phpstan-type ListListBySearchParamsShape = array{
 *   listIDs: list<string>,
 *   offset: int,
 *   processingTypes: list<string>,
 *   additionalFilterProperties?: list<string>|null,
 *   count?: int|null,
 *   objectTypeID?: string|null,
 *   query?: string|null,
 *   sort?: string|null,
 * }
 */
final class ListListBySearchParams implements BaseModel
{
    /** @use SdkModel<ListListBySearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ILS list ids to be included in search results. If not specified, all lists matching other criteria will be included.
     *
     * @var list<string> $listIDs
     */
    #[Required('listIds', list: 'string')]
    public array $listIDs;

    /**
     * Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     */
    #[Required]
    public int $offset;

    /**
     * List processing types to be included in search results. If not specified, all lists with all processing types will be included.
     *
     * @var list<string> $processingTypes
     */
    #[Required(list: 'string')]
    public array $processingTypes;

    /**
     * The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     *
     * @var list<string>|null $additionalFilterProperties
     */
    #[Optional('additional_filter_properties', list: 'string')]
    public ?array $additionalFilterProperties;

    /**
     * The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     */
    #[Optional]
    public ?int $count;

    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     */
    #[Optional]
    public ?string $query;

    /**
     * Sort field and order.
     */
    #[Optional]
    public ?string $sort;

    /**
     * `new ListListBySearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListListBySearchParams::with(listIDs: ..., offset: ..., processingTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListListBySearchParams)
     *   ->withListIDs(...)
     *   ->withOffset(...)
     *   ->withProcessingTypes(...)
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
     * @param list<string> $listIDs
     * @param list<string> $processingTypes
     * @param list<string>|null $additionalFilterProperties
     */
    public static function with(
        array $listIDs,
        int $offset,
        array $processingTypes,
        ?array $additionalFilterProperties = null,
        ?int $count = null,
        ?string $objectTypeID = null,
        ?string $query = null,
        ?string $sort = null,
    ): self {
        $self = new self;

        $self['listIDs'] = $listIDs;
        $self['offset'] = $offset;
        $self['processingTypes'] = $processingTypes;

        null !== $additionalFilterProperties && $self['additionalFilterProperties'] = $additionalFilterProperties;
        null !== $count && $self['count'] = $count;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $query && $self['query'] = $query;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * ILS list ids to be included in search results. If not specified, all lists matching other criteria will be included.
     *
     * @param list<string> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $self = clone $this;
        $self['listIDs'] = $listIDs;

        return $self;
    }

    /**
     * Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * List processing types to be included in search results. If not specified, all lists with all processing types will be included.
     *
     * @param list<string> $processingTypes
     */
    public function withProcessingTypes(array $processingTypes): self
    {
        $self = clone $this;
        $self['processingTypes'] = $processingTypes;

        return $self;
    }

    /**
     * The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     *
     * @param list<string> $additionalFilterProperties
     */
    public function withAdditionalFilterProperties(
        array $additionalFilterProperties
    ): self {
        $self = clone $this;
        $self['additionalFilterProperties'] = $additionalFilterProperties;

        return $self;
    }

    /**
     * The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Sort field and order.
     */
    public function withSort(string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
