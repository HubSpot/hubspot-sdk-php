<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIAbTestBranchAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_ab_test_branch_action = array{
 *   actionID: string,
 *   testBranches: list<AutomationAPIConnection>,
 *   type: value-of<Type>,
 * }
 */
final class AutomationAPIAbTestBranchAction implements BaseModel
{
    /** @use SdkModel<automation_api_ab_test_branch_action> */
    use SdkModel;

    #[Api('actionId')]
    public string $actionID;

    /** @var list<AutomationAPIConnection> $testBranches */
    #[Api(list: AutomationAPIConnection::class)]
    public array $testBranches;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIAbTestBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIAbTestBranchAction::with(
     *   actionID: ..., testBranches: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIAbTestBranchAction)
     *   ->withActionID(...)
     *   ->withTestBranches(...)
     *   ->withType(...)
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
     * @param list<AutomationAPIConnection> $testBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        array $testBranches,
        Type|string $type = 'AB_TEST_BRANCH'
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->testBranches = $testBranches;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    /**
     * @param list<AutomationAPIConnection> $testBranches
     */
    public function withTestBranches(array $testBranches): self
    {
        $obj = clone $this;
        $obj->testBranches = $testBranches;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
