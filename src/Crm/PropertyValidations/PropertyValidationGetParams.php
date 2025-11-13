<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertyValidations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a property's validation rules identified by {propertyName}.
 *
 * @see HubspotSDK\Services\Crm\PropertyValidationsService::get()
 *
 * @phpstan-type PropertyValidationGetParamsShape = array{objectTypeId: string}
 */
final class PropertyValidationGetParams implements BaseModel
{
    /** @use SdkModel<PropertyValidationGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectTypeId;

    /**
     * `new PropertyValidationGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyValidationGetParams::with(objectTypeId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyValidationGetParams)->withObjectTypeID(...)
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
    public static function with(string $objectTypeId): self
    {
        $obj = new self;

        $obj->objectTypeId = $objectTypeId;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }
}
