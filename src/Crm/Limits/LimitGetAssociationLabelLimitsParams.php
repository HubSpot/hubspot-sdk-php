<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns limits and usage for custom association labels.
 *
 * @see HubspotSDK\Services\Crm\LimitsService::getAssociationLabelLimits()
 *
 * @phpstan-type LimitGetAssociationLabelLimitsParamsShape = array{
 *   fromObjectTypeId?: string, toObjectTypeId?: string
 * }
 */
final class LimitGetAssociationLabelLimitsParams implements BaseModel
{
    /** @use SdkModel<LimitGetAssociationLabelLimitsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * objectTypeId of the object type on the "from" side of the association.
     */
    #[Optional]
    public ?string $fromObjectTypeId;

    /**
     * objectTypeId of the object type on the "to" side of the association.
     */
    #[Optional]
    public ?string $toObjectTypeId;

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
        ?string $fromObjectTypeId = null,
        ?string $toObjectTypeId = null
    ): self {
        $obj = new self;

        null !== $fromObjectTypeId && $obj['fromObjectTypeId'] = $fromObjectTypeId;
        null !== $toObjectTypeId && $obj['toObjectTypeId'] = $toObjectTypeId;

        return $obj;
    }

    /**
     * objectTypeId of the object type on the "from" side of the association.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj['fromObjectTypeId'] = $fromObjectTypeID;

        return $obj;
    }

    /**
     * objectTypeId of the object type on the "to" side of the association.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeId'] = $toObjectTypeID;

        return $obj;
    }
}
