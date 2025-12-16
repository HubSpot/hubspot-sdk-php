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
 *   fromObjectTypeID?: string|null, toObjectTypeID?: string|null
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
        $self = new self;

        null !== $fromObjectTypeID && $self['fromObjectTypeID'] = $fromObjectTypeID;
        null !== $toObjectTypeID && $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    /**
     * objectTypeId of the object type on the "from" side of the association.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    /**
     * objectTypeId of the object type on the "to" side of the association.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
