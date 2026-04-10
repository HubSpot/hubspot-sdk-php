<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\PropertiesValidations;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicPropertyValidationRuleUpdateShape = array{
 *   ruleArguments: list<string>, shouldApplyNormalization?: bool|null
 * }
 */
final class PublicPropertyValidationRuleUpdate implements BaseModel
{
    /** @use SdkModel<PublicPropertyValidationRuleUpdateShape> */
    use SdkModel;

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
     * `new PublicPropertyValidationRuleUpdate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyValidationRuleUpdate::with(ruleArguments: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPropertyValidationRuleUpdate)->withRuleArguments(...)
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
        array $ruleArguments,
        ?bool $shouldApplyNormalization = null
    ): self {
        $self = new self;

        $self['ruleArguments'] = $ruleArguments;

        null !== $shouldApplyNormalization && $self['shouldApplyNormalization'] = $shouldApplyNormalization;

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
