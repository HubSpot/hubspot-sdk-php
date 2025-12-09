<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertyValidations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PropertyValidations\PublicPropertyValidationRule\RuleType;

/**
 * @phpstan-type PublicPropertyValidationRuleMapShape = array{
 *   propertyName: string,
 *   propertyValidationRules: list<PublicPropertyValidationRule>,
 * }
 */
final class PublicPropertyValidationRuleMap implements BaseModel
{
    /** @use SdkModel<PublicPropertyValidationRuleMapShape> */
    use SdkModel;

    /**
     * The name of the property for which validation rules are defined.
     */
    #[Required]
    public string $propertyName;

    /**
     * A list of validation rules applicable to the property.
     *
     * @var list<PublicPropertyValidationRule> $propertyValidationRules
     */
    #[Required(list: PublicPropertyValidationRule::class)]
    public array $propertyValidationRules;

    /**
     * `new PublicPropertyValidationRuleMap()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyValidationRuleMap::with(
     *   propertyName: ..., propertyValidationRules: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPropertyValidationRuleMap)
     *   ->withPropertyName(...)
     *   ->withPropertyValidationRules(...)
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
     * @param list<PublicPropertyValidationRule|array{
     *   ruleArguments: list<string>, ruleType: value-of<RuleType>
     * }> $propertyValidationRules
     */
    public static function with(
        string $propertyName,
        array $propertyValidationRules
    ): self {
        $obj = new self;

        $obj['propertyName'] = $propertyName;
        $obj['propertyValidationRules'] = $propertyValidationRules;

        return $obj;
    }

    /**
     * The name of the property for which validation rules are defined.
     */
    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj['propertyName'] = $propertyName;

        return $obj;
    }

    /**
     * A list of validation rules applicable to the property.
     *
     * @param list<PublicPropertyValidationRule|array{
     *   ruleArguments: list<string>, ruleType: value-of<RuleType>
     * }> $propertyValidationRules
     */
    public function withPropertyValidationRules(
        array $propertyValidationRules
    ): self {
        $obj = clone $this;
        $obj['propertyValidationRules'] = $propertyValidationRules;

        return $obj;
    }
}
