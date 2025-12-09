<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticBranchAction\Type;
use HubspotSDK\Automation\Workflows\APITimestampValue\TimestampType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIStaticBranchActionShape = array{
 *   actionId: string,
 *   inputValue: APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue,
 *   staticBranches: list<APIStaticBranch>,
 *   type: value-of<Type>,
 *   defaultBranch?: APIConnection|null,
 *   defaultBranchName?: string|null,
 * }
 */
final class APIStaticBranchAction implements BaseModel
{
    /** @use SdkModel<APIStaticBranchActionShape> */
    use SdkModel;

    #[Required]
    public string $actionId;

    #[Required]
    public APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue;

    /** @var list<APIStaticBranch> $staticBranches */
    #[Required(list: APIStaticBranch::class)]
    public array $staticBranches;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?APIConnection $defaultBranch;

    #[Optional]
    public ?string $defaultBranchName;

    /**
     * `new APIStaticBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticBranchAction::with(
     *   actionId: ..., inputValue: ..., staticBranches: ..., type: ...
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
     * @param APIActionDataValue|array{
     *   actionId: string,
     *   dataKey: string,
     *   type: value-of<APIActionDataValue\Type>,
     * }|APIObjectPropertyValue|array{
     *   propertyName: string,
     *   type: value-of<APIObjectPropertyValue\Type>,
     * }|APIStaticValue|array{
     *   staticValue: string,
     *   type: value-of<APIStaticValue\Type>,
     * }|APIRelativeDateTimeValue|array{
     *   timeDelay: APITimeDelay,
     *   type: value-of<APIRelativeDateTimeValue\Type>,
     * }|APITimestampValue|array{
     *   timestampType: value-of<TimestampType>,
     *   type: value-of<APITimestampValue\Type>,
     * }|APIIncrementValue|array{
     *   incrementAmount: float,
     *   type: value-of<APIIncrementValue\Type>,
     * }|APIFetchedObjectPropertyValue|array{
     *   propertyToken: string,
     *   type: value-of<APIFetchedObjectPropertyValue\Type>,
     * }|APIAppendObjectPropertyValue|array{
     *   appendPropertyName: string,
     *   type: value-of<APIAppendObjectPropertyValue\Type>,
     * }|APIStaticAppendValue|array{
     *   staticAppendValue: string,
     *   type: value-of<APIStaticAppendValue\Type>,
     * }|APIEnrollmentEventPropertyValue|array{
     *   enrollmentEventPropertyToken: string,
     *   type: value-of<APIEnrollmentEventPropertyValue\Type>,
     * } $inputValue
     * @param list<APIStaticBranch|array{
     *   branchValue: string, connection?: APIConnection|null
     * }> $staticBranches
     * @param Type|value-of<Type> $type
     * @param APIConnection|array{
     *   edgeType: string, nextActionId: string
     * } $defaultBranch
     */
    public static function with(
        string $actionId,
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue,
        array $staticBranches,
        Type|string $type = 'STATIC_BRANCH',
        APIConnection|array|null $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $obj = new self;

        $obj['actionId'] = $actionId;
        $obj['inputValue'] = $inputValue;
        $obj['staticBranches'] = $staticBranches;
        $obj['type'] = $type;

        null !== $defaultBranch && $obj['defaultBranch'] = $defaultBranch;
        null !== $defaultBranchName && $obj['defaultBranchName'] = $defaultBranchName;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionId'] = $actionID;

        return $obj;
    }

    /**
     * @param APIActionDataValue|array{
     *   actionId: string,
     *   dataKey: string,
     *   type: value-of<APIActionDataValue\Type>,
     * }|APIObjectPropertyValue|array{
     *   propertyName: string,
     *   type: value-of<APIObjectPropertyValue\Type>,
     * }|APIStaticValue|array{
     *   staticValue: string,
     *   type: value-of<APIStaticValue\Type>,
     * }|APIRelativeDateTimeValue|array{
     *   timeDelay: APITimeDelay,
     *   type: value-of<APIRelativeDateTimeValue\Type>,
     * }|APITimestampValue|array{
     *   timestampType: value-of<TimestampType>,
     *   type: value-of<APITimestampValue\Type>,
     * }|APIIncrementValue|array{
     *   incrementAmount: float,
     *   type: value-of<APIIncrementValue\Type>,
     * }|APIFetchedObjectPropertyValue|array{
     *   propertyToken: string,
     *   type: value-of<APIFetchedObjectPropertyValue\Type>,
     * }|APIAppendObjectPropertyValue|array{
     *   appendPropertyName: string,
     *   type: value-of<APIAppendObjectPropertyValue\Type>,
     * }|APIStaticAppendValue|array{
     *   staticAppendValue: string,
     *   type: value-of<APIStaticAppendValue\Type>,
     * }|APIEnrollmentEventPropertyValue|array{
     *   enrollmentEventPropertyToken: string,
     *   type: value-of<APIEnrollmentEventPropertyValue\Type>,
     * } $inputValue
     */
    public function withInputValue(
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue,
    ): self {
        $obj = clone $this;
        $obj['inputValue'] = $inputValue;

        return $obj;
    }

    /**
     * @param list<APIStaticBranch|array{
     *   branchValue: string, connection?: APIConnection|null
     * }> $staticBranches
     */
    public function withStaticBranches(array $staticBranches): self
    {
        $obj = clone $this;
        $obj['staticBranches'] = $staticBranches;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param APIConnection|array{
     *   edgeType: string, nextActionId: string
     * } $defaultBranch
     */
    public function withDefaultBranch(APIConnection|array $defaultBranch): self
    {
        $obj = clone $this;
        $obj['defaultBranch'] = $defaultBranch;

        return $obj;
    }

    public function withDefaultBranchName(string $defaultBranchName): self
    {
        $obj = clone $this;
        $obj['defaultBranchName'] = $defaultBranchName;

        return $obj;
    }
}
