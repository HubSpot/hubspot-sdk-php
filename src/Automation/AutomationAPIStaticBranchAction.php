<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIStaticBranchAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_static_branch_action = array{
 *   actionID: string,
 *   inputValue: AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue,
 *   staticBranches: list<AutomationAPIStaticBranch>,
 *   type: value-of<Type>,
 *   defaultBranch?: AutomationAPIConnection,
 *   defaultBranchName?: string,
 * }
 */
final class AutomationAPIStaticBranchAction implements BaseModel
{
    /** @use SdkModel<automation_api_static_branch_action> */
    use SdkModel;

    #[Api('actionId')]
    public string $actionID;

    #[Api]
    public AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue $inputValue;

    /** @var list<AutomationAPIStaticBranch> $staticBranches */
    #[Api(list: AutomationAPIStaticBranch::class)]
    public array $staticBranches;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?AutomationAPIConnection $defaultBranch;

    #[Api(optional: true)]
    public ?string $defaultBranchName;

    /**
     * `new AutomationAPIStaticBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIStaticBranchAction::with(
     *   actionID: ..., inputValue: ..., staticBranches: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIStaticBranchAction)
     *   ->withActionID(...)
     *   ->withInputValue(...)
     *   ->withStaticBranches(...)
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
     * @param list<AutomationAPIStaticBranch> $staticBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue $inputValue,
        array $staticBranches,
        Type|string $type = 'STATIC_BRANCH',
        ?AutomationAPIConnection $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->inputValue = $inputValue;
        $obj->staticBranches = $staticBranches;
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

    public function withInputValue(
        AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue $inputValue,
    ): self {
        $obj = clone $this;
        $obj->inputValue = $inputValue;

        return $obj;
    }

    /**
     * @param list<AutomationAPIStaticBranch> $staticBranches
     */
    public function withStaticBranches(array $staticBranches): self
    {
        $obj = clone $this;
        $obj->staticBranches = $staticBranches;

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
