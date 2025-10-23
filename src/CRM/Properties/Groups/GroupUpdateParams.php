<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
 *
 * @see HubspotSDK\CRM\Properties\Groups->update
 *
 * @phpstan-type group_update_params = array{
 *   objectType: string, displayOrder?: int, label?: string
 * }
 */
final class GroupUpdateParams implements BaseModel
{
    /** @use SdkModel<group_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * A human-readable label that will be shown in HubSpot.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->objectType = $objectType;

        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $label && $obj->label = $label;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * A human-readable label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }
}
