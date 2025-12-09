<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
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
    #[Optional]
    public ?bool $includeFilters;

    /**
     * The name to update the list to.
     */
    #[Optional]
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
        $self = new self;

        null !== $includeFilters && $self['includeFilters'] = $includeFilters;
        null !== $listName && $self['listName'] = $listName;

        return $self;
    }

    /**
     * A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     */
    public function withIncludeFilters(bool $includeFilters): self
    {
        $self = clone $this;
        $self['includeFilters'] = $includeFilters;

        return $self;
    }

    /**
     * The name to update the list to.
     */
    public function withListName(string $listName): self
    {
        $self = clone $this;
        $self['listName'] = $listName;

        return $self;
    }
}
