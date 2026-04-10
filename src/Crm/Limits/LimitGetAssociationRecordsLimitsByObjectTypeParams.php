<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns records approaching or at association limits between two objects.
 *
 * @see HubSpotSDK\Services\Crm\LimitsService::getAssociationRecordsLimitsByObjectType()
 *
 * @phpstan-type LimitGetAssociationRecordsLimitsByObjectTypeParamsShape = array{
 *   fromObjectTypeID: string
 * }
 */
final class LimitGetAssociationRecordsLimitsByObjectTypeParams implements BaseModel
{
    /** @use SdkModel<LimitGetAssociationRecordsLimitsByObjectTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectTypeID;

    /**
     * `new LimitGetAssociationRecordsLimitsByObjectTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitGetAssociationRecordsLimitsByObjectTypeParams::with(fromObjectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LimitGetAssociationRecordsLimitsByObjectTypeParams)
     *   ->withFromObjectTypeID(...)
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
    public static function with(string $fromObjectTypeID): self
    {
        $self = new self;

        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }
}
