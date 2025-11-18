<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertyValidations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PropertyValidations\PublicPropertyValidationRule\RuleType;

/**
 * @phpstan-type PublicPropertyValidationRuleShape = array{
 *   ruleArguments: list<string>, ruleType: value-of<RuleType>
 * }
 */
final class PublicPropertyValidationRule implements BaseModel
{
    /** @use SdkModel<PublicPropertyValidationRuleShape> */
    use SdkModel;

    /**
     * A list of arguments that define the specific conditions or parameters for the validation rule.
     *
     * @var list<string> $ruleArguments
     */
    #[Api(list: 'string')]
    public array $ruleArguments;

    /**
     * The category of validation applied to the property, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH.
     *
     * @var value-of<RuleType> $ruleType
     */
    #[Api(enum: RuleType::class)]
    public string $ruleType;

    /**
     * `new PublicPropertyValidationRule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyValidationRule::with(ruleArguments: ..., ruleType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPropertyValidationRule)->withRuleArguments(...)->withRuleType(...)
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
     * @param RuleType|value-of<RuleType> $ruleType
     */
    public static function with(
        array $ruleArguments,
        RuleType|string $ruleType
    ): self {
        $obj = new self;

        $obj->ruleArguments = $ruleArguments;
        $obj['ruleType'] = $ruleType;

        return $obj;
    }

    /**
     * A list of arguments that define the specific conditions or parameters for the validation rule.
     *
     * @param list<string> $ruleArguments
     */
    public function withRuleArguments(array $ruleArguments): self
    {
        $obj = clone $this;
        $obj->ruleArguments = $ruleArguments;

        return $obj;
    }

    /**
     * The category of validation applied to the property, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH.
     *
     * @param RuleType|value-of<RuleType> $ruleType
     */
    public function withRuleType(RuleType|string $ruleType): self
    {
        $obj = clone $this;
        $obj['ruleType'] = $ruleType;

        return $obj;
    }
}
