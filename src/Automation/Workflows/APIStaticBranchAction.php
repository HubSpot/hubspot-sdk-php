<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticBranchAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_static_branch_action = array{
 *   actionID: string,
 *   inputValue: APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue,
 *   staticBranches: list<APIStaticBranch>,
 *   type: value-of<Type>,
 *   defaultBranch?: APIConnection,
 *   defaultBranchName?: string,
 * }
 */
final class APIStaticBranchAction implements BaseModel
{
    /** @use SdkModel<api_static_branch_action> */
    use SdkModel;

    /**
     * The ID for this action.
     */
    #[Api('actionId')]
    public string $actionID;

    /**
     * The input value to branch off of.
     */
    #[Api]
    public APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue;

    /** @var list<APIStaticBranch> $staticBranches */
    #[Api(list: APIStaticBranch::class)]
    public array $staticBranches;

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?APIConnection $defaultBranch;

    /**
     * The name of the default branch, the branch that gets executed if `inputValue` does not match any of the `staticBranches`.
     */
    #[Api(optional: true)]
    public ?string $defaultBranchName;

    /**
     * `new APIStaticBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticBranchAction::with(
     *   actionID: ..., inputValue: ..., staticBranches: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticBranchAction)
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
     * @param list<APIStaticBranch> $staticBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue,
        array $staticBranches,
        Type|string $type = 'STATIC_BRANCH',
        ?APIConnection $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->inputValue = $inputValue;
        $obj->staticBranches = $staticBranches;
        $obj['type'] = $type;

        null !== $defaultBranch && $obj->defaultBranch = $defaultBranch;
        null !== $defaultBranchName && $obj->defaultBranchName = $defaultBranchName;

        return $obj;
    }

    /**
     * The ID for this action.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    /**
     * The input value to branch off of.
     */
    public function withInputValue(
        APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue,
    ): self {
        $obj = clone $this;
        $obj->inputValue = $inputValue;

        return $obj;
    }

    /**
     * @param list<APIStaticBranch> $staticBranches
     */
    public function withStaticBranches(array $staticBranches): self
    {
        $obj = clone $this;
        $obj->staticBranches = $staticBranches;

        return $obj;
    }

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withDefaultBranch(APIConnection $defaultBranch): self
    {
        $obj = clone $this;
        $obj->defaultBranch = $defaultBranch;

        return $obj;
    }

    /**
     * The name of the default branch, the branch that gets executed if `inputValue` does not match any of the `staticBranches`.
     */
    public function withDefaultBranchName(string $defaultBranchName): self
    {
        $obj = clone $this;
        $obj->defaultBranchName = $defaultBranchName;

        return $obj;
    }
}
