<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns limits and usage for custom association labels.
 *
 * @see HubSpotSDK\Services\Crm\LimitsService::getAssociationLabelLimits()
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

    #[Optional]
    public ?string $fromObjectTypeID;

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

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
