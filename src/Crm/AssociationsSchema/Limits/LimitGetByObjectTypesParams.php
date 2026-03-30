<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the configuration details for associations between two specified CRM object types. Use this endpoint to understand limits that have been set for specific association types.
 *
 * @see HubspotSDK\Services\Crm\AssociationsSchema\LimitsService::getByObjectTypes()
 *
 * @phpstan-type LimitGetByObjectTypesParamsShape = array{fromObjectType: string}
 */
final class LimitGetByObjectTypesParams implements BaseModel
{
    /** @use SdkModel<LimitGetByObjectTypesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /**
     * `new LimitGetByObjectTypesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitGetByObjectTypesParams::with(fromObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LimitGetByObjectTypesParams)->withFromObjectType(...)
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
    public static function with(string $fromObjectType): self
    {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }
}
