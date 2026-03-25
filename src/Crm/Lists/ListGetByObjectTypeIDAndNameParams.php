<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::getByObjectTypeIDAndName()
 *
 * @phpstan-type ListGetByObjectTypeIDAndNameParamsShape = array{
 *   objectTypeID: string, includeFilters?: bool|null
 * }
 */
final class ListGetByObjectTypeIDAndNameParams implements BaseModel
{
    /** @use SdkModel<ListGetByObjectTypeIDAndNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectTypeID;

    #[Optional]
    public ?bool $includeFilters;

    /**
     * `new ListGetByObjectTypeIDAndNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListGetByObjectTypeIDAndNameParams::with(objectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListGetByObjectTypeIDAndNameParams)->withObjectTypeID(...)
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
        string $objectTypeID,
        ?bool $includeFilters = null
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;

        null !== $includeFilters && $self['includeFilters'] = $includeFilters;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withIncludeFilters(bool $includeFilters): self
    {
        $self = clone $this;
        $self['includeFilters'] = $includeFilters;

        return $self;
    }
}
