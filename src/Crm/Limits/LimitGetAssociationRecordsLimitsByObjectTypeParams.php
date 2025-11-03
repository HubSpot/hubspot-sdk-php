<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns records approaching or at association limits between two objects.
 *
 * @see HubspotSDK\Crm\Limits->getAssociationRecordsLimitsByObjectType
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

    #[Api]
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
        $obj = new self;

        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }
}
