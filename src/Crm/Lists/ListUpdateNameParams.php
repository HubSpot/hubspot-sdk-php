<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
 *
 * @see HubspotSDK\Services\Crm\ListsService::updateName()
 *
 * @phpstan-type ListUpdateNameParamsShape = array{
 *   includeFilters?: bool, listName?: string
 * }
 */
final class ListUpdateNameParams implements BaseModel
{
    /** @use SdkModel<ListUpdateNameParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    #[Api(optional: true)]
    public ?bool $includeFilters;

    /**
     * The name to update the list to.
     */
    #[Api(optional: true)]
    public ?string $listName;

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
        ?bool $includeFilters = null,
        ?string $listName = null
    ): self {
        $obj = new self;

        null !== $includeFilters && $obj['includeFilters'] = $includeFilters;
        null !== $listName && $obj['listName'] = $listName;

        return $obj;
    }

    /**
     * A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    public function withIncludeFilters(bool $includeFilters): self
    {
        $obj = clone $this;
        $obj['includeFilters'] = $includeFilters;

        return $obj;
    }

    /**
     * The name to update the list to.
     */
    public function withListName(string $listName): self
    {
        $obj = clone $this;
        $obj['listName'] = $listName;

        return $obj;
    }
}
