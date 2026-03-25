<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::updateListName()
 *
 * @phpstan-type ListUpdateListNameParamsShape = array{
 *   includeFilters?: bool|null, listName?: string|null
 * }
 */
final class ListUpdateListNameParams implements BaseModel
{
    /** @use SdkModel<ListUpdateListNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $includeFilters;

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

    public function withIncludeFilters(bool $includeFilters): self
    {
        $self = clone $this;
        $self['includeFilters'] = $includeFilters;

        return $self;
    }

    public function withListName(string $listName): self
    {
        $self = clone $this;
        $self['listName'] = $listName;

        return $self;
    }
}
