<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertiesValidations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule\RuleType;

/**
 * @phpstan-type PublicPropertyValidationRuleShape = array{
 *   ruleArguments: list<string>,
 *   ruleType: RuleType|value-of<RuleType>,
 *   shouldApplyNormalization?: bool|null,
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
    #[Required(list: 'string')]
    public array $ruleArguments;

    /**
     * The category of validation applied to the property, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH.
     *
     * @var value-of<RuleType> $ruleType
     */
    #[Required(enum: RuleType::class)]
    public string $ruleType;

    #[Optional]
    public ?bool $shouldApplyNormalization;

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
        RuleType|string $ruleType,
        ?bool $shouldApplyNormalization = null,
    ): self {
        $self = new self;

        $self['ruleArguments'] = $ruleArguments;
        $self['ruleType'] = $ruleType;

        null !== $shouldApplyNormalization && $self['shouldApplyNormalization'] = $shouldApplyNormalization;

        return $self;
    }

    /**
     * A list of arguments that define the specific conditions or parameters for the validation rule.
     *
     * @param list<string> $ruleArguments
     */
    public function withRuleArguments(array $ruleArguments): self
    {
        $self = clone $this;
        $self['ruleArguments'] = $ruleArguments;

        return $self;
    }

    /**
     * The category of validation applied to the property, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH.
     *
     * @param RuleType|value-of<RuleType> $ruleType
     */
    public function withRuleType(RuleType|string $ruleType): self
    {
        $self = clone $this;
        $self['ruleType'] = $ruleType;

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
