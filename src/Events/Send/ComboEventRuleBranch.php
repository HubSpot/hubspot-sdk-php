<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\Send\ComboEventRuleBranch\OperationType;

/**
 * @phpstan-import-type ComboEventRuleShape from \HubspotSDK\Events\Send\ComboEventRule
 *
 * @phpstan-type ComboEventRuleBranchShape = array{
 *   composingRules: list<ComboEventRule|ComboEventRuleShape>,
 *   operationType: OperationType|value-of<OperationType>,
 *   ruleBranches: list<mixed>,
 * }
 */
final class ComboEventRuleBranch implements BaseModel
{
    /** @use SdkModel<ComboEventRuleBranchShape> */
    use SdkModel;

    /** @var list<ComboEventRule> $composingRules */
    #[Required(list: ComboEventRule::class)]
    public array $composingRules;

    /** @var value-of<OperationType> $operationType */
    #[Required(enum: OperationType::class)]
    public string $operationType;

    /** @var list<mixed> $ruleBranches */
    #[Required(list: ComboEventRuleBranch::class)]
    public array $ruleBranches;

    /**
     * `new ComboEventRuleBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComboEventRuleBranch::with(
     *   composingRules: ..., operationType: ..., ruleBranches: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComboEventRuleBranch)
     *   ->withComposingRules(...)
     *   ->withOperationType(...)
     *   ->withRuleBranches(...)
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
     * @param list<ComboEventRule|ComboEventRuleShape> $composingRules
     * @param OperationType|value-of<OperationType> $operationType
     * @param list<mixed> $ruleBranches
     */
    public static function with(
        array $composingRules,
        OperationType|string $operationType,
        array $ruleBranches,
    ): self {
        $self = new self;

        $self['composingRules'] = $composingRules;
        $self['operationType'] = $operationType;
        $self['ruleBranches'] = $ruleBranches;

        return $self;
    }

    /**
     * @param list<ComboEventRule|ComboEventRuleShape> $composingRules
     */
    public function withComposingRules(array $composingRules): self
    {
        $self = clone $this;
        $self['composingRules'] = $composingRules;

        return $self;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $self = clone $this;
        $self['operationType'] = $operationType;

        return $self;
    }

    /**
     * @param list<mixed> $ruleBranches
     */
    public function withRuleBranches(array $ruleBranches): self
    {
        $self = clone $this;
        $self['ruleBranches'] = $ruleBranches;

        return $self;
    }
}
