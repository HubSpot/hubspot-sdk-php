<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIListBranchAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_list_branch_action = array{
 *   actionID: string,
 *   listBranches: list<AutomationAPIListBranch>,
 *   type: value-of<Type>,
 *   defaultBranch?: AutomationAPIConnection,
 *   defaultBranchName?: string,
 * }
 */
final class AutomationAPIListBranchAction implements BaseModel
{
    /** @use SdkModel<automation_api_list_branch_action> */
    use SdkModel;

    #[Api('actionId')]
    public string $actionID;

    /** @var list<AutomationAPIListBranch> $listBranches */
    #[Api(list: AutomationAPIListBranch::class)]
    public array $listBranches;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?AutomationAPIConnection $defaultBranch;

    #[Api(optional: true)]
    public ?string $defaultBranchName;

    /**
     * `new AutomationAPIListBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIListBranchAction::with(actionID: ..., listBranches: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIListBranchAction)
     *   ->withActionID(...)
     *   ->withListBranches(...)
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
     * @param list<AutomationAPIListBranch> $listBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        array $listBranches,
        Type|string $type = 'LIST_BRANCH',
        ?AutomationAPIConnection $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->listBranches = $listBranches;
        $obj->type = $type instanceof Type ? $type->value : $type;

        null !== $defaultBranch && $obj->defaultBranch = $defaultBranch;
        null !== $defaultBranchName && $obj->defaultBranchName = $defaultBranchName;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    /**
     * @param list<AutomationAPIListBranch> $listBranches
     */
    public function withListBranches(array $listBranches): self
    {
        $obj = clone $this;
        $obj->listBranches = $listBranches;

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

    public function withDefaultBranch(
        AutomationAPIConnection $defaultBranch
    ): self {
        $obj = clone $this;
        $obj->defaultBranch = $defaultBranch;

        return $obj;
    }

    public function withDefaultBranchName(string $defaultBranchName): self
    {
        $obj = clone $this;
        $obj->defaultBranchName = $defaultBranchName;

        return $obj;
    }
}
