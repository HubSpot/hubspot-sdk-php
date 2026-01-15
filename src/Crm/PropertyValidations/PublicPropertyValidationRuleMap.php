<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertyValidations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicPropertyValidationRuleShape from \HubspotSDK\Crm\PropertyValidations\PublicPropertyValidationRule
 *
 * @phpstan-type PublicPropertyValidationRuleMapShape = array{
 *   propertyName: string,
 *   propertyValidationRules: list<PublicPropertyValidationRule|PublicPropertyValidationRuleShape>,
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
     * @param list<PublicPropertyValidationRule|PublicPropertyValidationRuleShape> $propertyValidationRules
     */
    public static function with(
        string $propertyName,
        array $propertyValidationRules
    ): self {
        $self = new self;

        $self['propertyName'] = $propertyName;
        $self['propertyValidationRules'] = $propertyValidationRules;

        return $self;
    }

    /**
     * The name of the property for which validation rules are defined.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * A list of validation rules applicable to the property.
     *
     * @param list<PublicPropertyValidationRule|PublicPropertyValidationRuleShape> $propertyValidationRules
     */
    public function withPropertyValidationRules(
        array $propertyValidationRules
    ): self {
        $self = clone $this;
        $self['propertyValidationRules'] = $propertyValidationRules;

        return $self;
    }
}
