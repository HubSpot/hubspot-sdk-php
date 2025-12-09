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
 *   fromObjectTypeID?: string, toObjectTypeID?: string
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
    public ?string $fromObjectTypeID;

    /**
     * objectTypeId of the object type on the "to" side of the association.
     */
    #[Optional]
    public ?string $toObjectTypeID;

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
        ?string $fromObjectTypeID = null,
        ?string $toObjectTypeID = null
    ): self {
        $obj = new self;

        null !== $fromObjectTypeID && $obj['fromObjectTypeID'] = $fromObjectTypeID;
        null !== $toObjectTypeID && $obj['toObjectTypeID'] = $toObjectTypeID;

        return $obj;
    }

    /**
     * objectTypeId of the object type on the "from" side of the association.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj['fromObjectTypeID'] = $fromObjectTypeID;

        return $obj;
    }

    /**
     * objectTypeId of the object type on the "to" side of the association.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeID'] = $toObjectTypeID;

        return $obj;
    }
}
