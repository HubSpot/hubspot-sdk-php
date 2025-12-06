<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertyValidations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a specific validation rule for a property identified by its name and rule type.
 *
 * @see HubspotSDK\Services\Crm\PropertyValidationsService::crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType()
 *
 * @phpstan-type PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParamsShape = array{
 *   objectTypeId: string, propertyName: string, ruleArguments: list<string>
 * }
 */
final class PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams implements BaseModel
{
    /**
     * @use SdkModel<PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParamsShape,>
     */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectTypeId;

    #[Api]
    public string $propertyName;

    /**
     * A list of arguments that define the constraints for the validation rule.
     *
     * @var list<string> $ruleArguments
     */
    #[Api(list: 'string')]
    public array $ruleArguments;

    /**
     * `new PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams::with(
     *   objectTypeId: ..., propertyName: ..., ruleArguments: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams)
     *   ->withObjectTypeID(...)
     *   ->withPropertyName(...)
     *   ->withRuleArguments(...)
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
     *
     * @param list<string> $ruleArguments
     */
    public static function with(
        string $objectTypeId,
        string $propertyName,
        array $ruleArguments
    ): self {
        $obj = new self;

        $obj['objectTypeId'] = $objectTypeId;
        $obj['propertyName'] = $propertyName;
        $obj['ruleArguments'] = $ruleArguments;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj['propertyName'] = $propertyName;

        return $obj;
    }

    /**
     * A list of arguments that define the constraints for the validation rule.
     *
     * @param list<string> $ruleArguments
     */
    public function withRuleArguments(array $ruleArguments): self
    {
        $obj = clone $this;
        $obj['ruleArguments'] = $ruleArguments;

        return $obj;
    }
}
