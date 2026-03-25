<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::list()
 *
 * @phpstan-type ListListParamsShape = array{
 *   includeFilters?: bool|null, listIDs?: list<string>|null
 * }
 */
final class ListListParams implements BaseModel
{
    /** @use SdkModel<ListListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $includeFilters;

    /** @var list<string>|null $listIDs */
    #[Optional(list: 'string')]
    public ?array $listIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $listIDs
     */
    public static function with(
        ?bool $includeFilters = null,
        ?array $listIDs = null
    ): self {
        $self = new self;

        null !== $includeFilters && $self['includeFilters'] = $includeFilters;
        null !== $listIDs && $self['listIDs'] = $listIDs;

        return $self;
    }

    public function withIncludeFilters(bool $includeFilters): self
    {
        $self = clone $this;
        $self['includeFilters'] = $includeFilters;

        return $self;
    }

    /**
     * @param list<string> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $self = clone $this;
        $self['listIDs'] = $listIDs;

        return $self;
    }
}
