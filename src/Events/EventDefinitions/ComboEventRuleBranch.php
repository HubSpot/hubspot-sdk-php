<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\ComboEventRuleBranch\OperationType;

/**
 * @phpstan-type ComboEventRuleBranchShape = array{
 *   composingRules: list<ComboEventRule>,
 *   operationType: value-of<OperationType>,
 *   ruleBranches: list<ComboEventRuleBranch>,
 * }
 */
final class ComboEventRuleBranch implements BaseModel
{
    /** @use SdkModel<ComboEventRuleBranchShape> */
    use SdkModel;

    /** @var list<ComboEventRule> $composingRules */
    #[Api(list: ComboEventRule::class)]
    public array $composingRules;

    /** @var value-of<OperationType> $operationType */
    #[Api(enum: OperationType::class)]
    public string $operationType;

    /** @var list<ComboEventRuleBranch> $ruleBranches */
    #[Api(list: ComboEventRuleBranch::class)]
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
     * @param list<ComboEventRule> $composingRules
     * @param OperationType|value-of<OperationType> $operationType
     * @param list<ComboEventRuleBranch> $ruleBranches
     */
    public static function with(
        array $composingRules,
        OperationType|string $operationType,
        array $ruleBranches,
    ): self {
        $obj = new self;

        $obj->composingRules = $composingRules;
        $obj['operationType'] = $operationType;
        $obj->ruleBranches = $ruleBranches;

        return $obj;
    }

    /**
     * @param list<ComboEventRule> $composingRules
     */
    public function withComposingRules(array $composingRules): self
    {
        $obj = clone $this;
        $obj->composingRules = $composingRules;

        return $obj;
    }

    /**
     * @param OperationType|value-of<OperationType> $operationType
     */
    public function withOperationType(OperationType|string $operationType): self
    {
        $obj = clone $this;
        $obj['operationType'] = $operationType;

        return $obj;
    }

    /**
     * @param list<ComboEventRuleBranch> $ruleBranches
     */
    public function withRuleBranches(array $ruleBranches): self
    {
        $obj = clone $this;
        $obj->ruleBranches = $ruleBranches;

        return $obj;
    }
}
