<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticBranchAction\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InputValueShape from \HubspotSDK\Automation\Workflows\APIStaticBranchAction\InputValue
 * @phpstan-import-type APIStaticBranchShape from \HubspotSDK\Automation\Workflows\APIStaticBranch
 * @phpstan-import-type APIConnectionShape from \HubspotSDK\Automation\Workflows\APIConnection
 *
 * @phpstan-type APIStaticBranchActionShape = array{
 *   actionID: string,
 *   inputValue: InputValueShape,
 *   staticBranches: list<APIStaticBranchShape>,
 *   type: Type|value-of<Type>,
 *   defaultBranch?: null|APIConnection|APIConnectionShape,
 *   defaultBranchName?: string|null,
 * }
 */
final class APIStaticBranchAction implements BaseModel
{
    /** @use SdkModel<APIStaticBranchActionShape> */
    use SdkModel;

    #[Required('actionId')]
    public string $actionID;

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
     * @param InputValueShape $inputValue
     * @param list<APIStaticBranchShape> $staticBranches
     * @param Type|value-of<Type> $type
     * @param APIConnection|APIConnectionShape|null $defaultBranch
     */
    public static function with(
        string $actionID,
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue,
        array $staticBranches,
        Type|string $type = 'STATIC_BRANCH',
        APIConnection|array|null $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $self = new self;

        $self['actionID'] = $actionID;
        $self['inputValue'] = $inputValue;
        $self['staticBranches'] = $staticBranches;
        $self['type'] = $type;

        null !== $defaultBranch && $self['defaultBranch'] = $defaultBranch;
        null !== $defaultBranchName && $self['defaultBranchName'] = $defaultBranchName;

        return $self;
    }

    public function withActionID(string $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }

    /**
     * @param InputValueShape $inputValue
     */
    public function withInputValue(
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $inputValue,
    ): self {
        $self = clone $this;
        $self['inputValue'] = $inputValue;

        return $self;
    }

    /**
     * @param list<APIStaticBranchShape> $staticBranches
     */
    public function withStaticBranches(array $staticBranches): self
    {
        $self = clone $this;
        $self['staticBranches'] = $staticBranches;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param APIConnection|APIConnectionShape $defaultBranch
     */
    public function withDefaultBranch(APIConnection|array $defaultBranch): self
    {
        $self = clone $this;
        $self['defaultBranch'] = $defaultBranch;

        return $self;
    }

    public function withDefaultBranchName(string $defaultBranchName): self
    {
        $self = clone $this;
        $self['defaultBranchName'] = $defaultBranchName;

        return $self;
    }
}
