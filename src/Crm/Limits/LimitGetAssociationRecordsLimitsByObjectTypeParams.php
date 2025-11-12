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
 *   fromObjectTypeId: string
 * }
 */
final class LimitGetAssociationRecordsLimitsByObjectTypeParams implements BaseModel
{
    /** @use SdkModel<LimitGetAssociationRecordsLimitsByObjectTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectTypeId;

    /**
     * `new LimitGetAssociationRecordsLimitsByObjectTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitGetAssociationRecordsLimitsByObjectTypeParams::with(fromObjectTypeId: ...)
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
    public static function with(string $fromObjectTypeId): self
    {
        $obj = new self;

        $obj->fromObjectTypeId = $fromObjectTypeId;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeId = $fromObjectTypeID;

        return $obj;
    }
}
