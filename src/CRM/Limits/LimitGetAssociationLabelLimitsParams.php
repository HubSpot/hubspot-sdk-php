<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns limits and usage for custom association labels.
 *
 * @see HubspotSDK\CRM\Limits->getAssociationLabelLimits
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

    #[Api(optional: true)]
    public ?string $fromObjectTypeID;

    #[Api(optional: true)]
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

        null !== $fromObjectTypeID && $obj->fromObjectTypeID = $fromObjectTypeID;
        null !== $toObjectTypeID && $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }
}
