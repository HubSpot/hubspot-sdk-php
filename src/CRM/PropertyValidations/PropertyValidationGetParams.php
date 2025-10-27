<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\PropertyValidations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a property's validation rules identified by {propertyName}.
 *
 * @see HubspotSDK\CRM\PropertyValidations->get
 *
 * @phpstan-type property_validation_get_params = array{objectTypeID: string}
 */
final class PropertyValidationGetParams implements BaseModel
{
    /** @use SdkModel<property_validation_get_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectTypeID;

    /**
     * `new PropertyValidationGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyValidationGetParams::with(objectTypeID: ...)
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
    public static function with(string $objectTypeID): self
    {
        $obj = new self;

        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }
}
