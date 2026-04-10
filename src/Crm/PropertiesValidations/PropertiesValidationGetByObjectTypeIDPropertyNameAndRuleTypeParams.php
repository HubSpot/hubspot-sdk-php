<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\PropertiesValidations;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific validation rule for a property identified by its name and rule type.
 *
 * @see HubSpotSDK\Services\Crm\PropertiesValidationsService::getByObjectTypeIDPropertyNameAndRuleType()
 *
 * @phpstan-type PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParamsShape = array{
 *   objectTypeID: string, propertyName: string
 * }
 */
final class PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams implements BaseModel
{
    /**
     * @use SdkModel<PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParamsShape,>
     */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectTypeID;

    #[Required]
    public string $propertyName;

    /**
     * `new PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams::with(
     *   objectTypeID: ..., propertyName: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams)
     *   ->withObjectTypeID(...)
     *   ->withPropertyName(...)
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
    public static function with(
        string $objectTypeID,
        string $propertyName
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }
}
