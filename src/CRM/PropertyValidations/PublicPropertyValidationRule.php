<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\PropertyValidations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicPropertyValidationRuleShape = array{
 *   ruleArguments: list<string>, ruleType: string
 * }
 */
final class PublicPropertyValidationRule implements BaseModel
{
    /** @use SdkModel<PublicPropertyValidationRuleShape> */
    use SdkModel;

    /** @var list<string> $ruleArguments */
    #[Api(list: 'string')]
    public array $ruleArguments;

    #[Api]
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
     */
    public static function with(array $ruleArguments, string $ruleType): self
    {
        $obj = new self;

        $obj->ruleArguments = $ruleArguments;
        $obj->ruleType = $ruleType;

        return $obj;
    }

    /**
     * @param list<string> $ruleArguments
     */
    public function withRuleArguments(array $ruleArguments): self
    {
        $obj = clone $this;
        $obj->ruleArguments = $ruleArguments;

        return $obj;
    }

    public function withRuleType(string $ruleType): self
    {
        $obj = clone $this;
        $obj->ruleType = $ruleType;

        return $obj;
    }
}
