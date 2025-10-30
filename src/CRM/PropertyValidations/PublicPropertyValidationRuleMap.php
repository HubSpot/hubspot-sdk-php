<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\PropertyValidations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Api]
    public string $propertyName;

    /** @var list<PublicPropertyValidationRule> $propertyValidationRules */
    #[Api(list: PublicPropertyValidationRule::class)]
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
     * @param list<PublicPropertyValidationRule> $propertyValidationRules
     */
    public static function with(
        string $propertyName,
        array $propertyValidationRules
    ): self {
        $obj = new self;

        $obj->propertyName = $propertyName;
        $obj->propertyValidationRules = $propertyValidationRules;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    /**
     * @param list<PublicPropertyValidationRule> $propertyValidationRules
     */
    public function withPropertyValidationRules(
        array $propertyValidationRules
    ): self {
        $obj = clone $this;
        $obj->propertyValidationRules = $propertyValidationRules;

        return $obj;
    }
}
