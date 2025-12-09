<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\Groups;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
 *
 * @see HubspotSDK\Services\Crm\Properties\GroupsService::update()
 *
 * @phpstan-type GroupUpdateParamsShape = array{
 *   objectType: string, displayOrder?: int, label?: string
 * }
 */
final class GroupUpdateParams implements BaseModel
{
    /** @use SdkModel<GroupUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Optional]
    public ?int $displayOrder;

    #[Optional]
    public ?string $label;

    /**
     * `new GroupUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupUpdateParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupUpdateParams)->withObjectType(...)
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
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;

        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $label && $self['label'] = $label;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
