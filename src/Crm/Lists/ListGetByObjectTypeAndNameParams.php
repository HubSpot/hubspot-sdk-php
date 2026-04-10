<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::getByObjectTypeAndName()
 *
 * @phpstan-type ListGetByObjectTypeAndNameParamsShape = array{
 *   objectTypeID: string, includeFilters?: bool|null
 * }
 */
final class ListGetByObjectTypeAndNameParams implements BaseModel
{
    /** @use SdkModel<ListGetByObjectTypeAndNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectTypeID;

    #[Optional]
    public ?bool $includeFilters;

    /**
     * `new ListGetByObjectTypeAndNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListGetByObjectTypeAndNameParams::with(objectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListGetByObjectTypeAndNameParams)->withObjectTypeID(...)
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
