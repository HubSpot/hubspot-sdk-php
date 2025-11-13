<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch multiple lists in a single request by **ILS list ID**. The response will include the definitions of all lists that exist for the `listIds` provided.
 *
 * @see HubspotSDK\Services\Crm\ListsService::list()
 *
 * @phpstan-type ListListParamsShape = array{
 *   includeFilters?: bool, listIds?: list<string>
 * }
 */
final class ListListParams implements BaseModel
{
    /** @use SdkModel<ListListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A flag indicating whether or not the response object list definitions should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    #[Api(optional: true)]
    public ?bool $includeFilters;

    /**
     * The **ILS IDs** of the lists to fetch.
     *
     * @var list<string>|null $listIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $listIds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $listIds
     */
    public static function with(
        ?bool $includeFilters = null,
        ?array $listIds = null
    ): self {
        $obj = new self;

        null !== $includeFilters && $obj->includeFilters = $includeFilters;
        null !== $listIds && $obj->listIds = $listIds;

        return $obj;
    }

    /**
     * A flag indicating whether or not the response object list definitions should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    public function withIncludeFilters(bool $includeFilters): self
    {
        $obj = clone $this;
        $obj->includeFilters = $includeFilters;

        return $obj;
    }

    /**
     * The **ILS IDs** of the lists to fetch.
     *
     * @param list<string> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $obj = clone $this;
        $obj->listIds = $listIDs;

        return $obj;
    }
}
