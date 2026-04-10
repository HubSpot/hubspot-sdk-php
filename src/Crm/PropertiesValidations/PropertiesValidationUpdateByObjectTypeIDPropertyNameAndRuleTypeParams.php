<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\PropertiesValidations;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update a specific validation rule for a property identified by its name and rule type.
 *
 * @see HubSpotSDK\Services\Crm\PropertiesValidationsService::updateByObjectTypeIDPropertyNameAndRuleType()
 *
 * @phpstan-type PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParamsShape = array{
 *   objectTypeID: string,
 *   propertyName: string,
 *   ruleArguments: list<string>,
 *   shouldApplyNormalization?: bool|null,
 * }
 */
final class PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams implements BaseModel
{
    /**
     * @use SdkModel<PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParamsShape,>
     */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectTypeID;

    #[Required]
    public string $propertyName;

    /**
     * A list of arguments that define the constraints for the validation rule.
     *
     * @var list<string> $ruleArguments
     */
    #[Required(list: 'string')]
    public array $ruleArguments;

    #[Optional]
    public ?bool $shouldApplyNormalization;

    /**
     * `new PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams::with(
     *   objectTypeID: ..., propertyName: ..., ruleArguments: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams)
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
        string $objectTypeID,
        string $propertyName,
        array $ruleArguments,
        ?bool $shouldApplyNormalization = null,
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['propertyName'] = $propertyName;
        $self['ruleArguments'] = $ruleArguments;

        null !== $shouldApplyNormalization && $self['shouldApplyNormalization'] = $shouldApplyNormalization;

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

    /**
     * A list of arguments that define the constraints for the validation rule.
     *
     * @param list<string> $ruleArguments
     */
    public function withRuleArguments(array $ruleArguments): self
    {
        $self = clone $this;
        $self['ruleArguments'] = $ruleArguments;

        return $self;
    }

    public function withShouldApplyNormalization(
        bool $shouldApplyNormalization
    ): self {
        $self = clone $this;
        $self['shouldApplyNormalization'] = $shouldApplyNormalization;

        return $self;
    }
}
