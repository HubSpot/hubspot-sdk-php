<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertiesValidations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a property's validation rules identified by {propertyName}.
 *
 * @see HubspotSDK\Services\Crm\PropertiesValidationsService::getByObjectTypeIDAndPropertyName()
 *
 * @phpstan-type PropertiesValidationGetByObjectTypeIDAndPropertyNameParamsShape = array{
 *   objectTypeID: string
 * }
 */
final class PropertiesValidationGetByObjectTypeIDAndPropertyNameParams implements BaseModel
{
    /** @use SdkModel<PropertiesValidationGetByObjectTypeIDAndPropertyNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectTypeID;

    /**
     * `new PropertiesValidationGetByObjectTypeIDAndPropertyNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertiesValidationGetByObjectTypeIDAndPropertyNameParams::with(
     *   objectTypeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertiesValidationGetByObjectTypeIDAndPropertyNameParams)
     *   ->withObjectTypeID(...)
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
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }
}
