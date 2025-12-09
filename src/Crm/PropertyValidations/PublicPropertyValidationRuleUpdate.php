<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertyValidations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicPropertyValidationRuleUpdateShape = array{
 *   ruleArguments: list<string>
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
    public static function with(array $ruleArguments): self
    {
        $obj = new self;

        $obj['ruleArguments'] = $ruleArguments;

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
