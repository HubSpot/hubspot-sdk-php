<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIListBranchAction\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIListBranchActionShape = array{
 *   actionID: string,
 *   listBranches: list<mixed>,
 *   type: value-of<Type>,
 *   defaultBranch?: APIConnection|null,
 *   defaultBranchName?: string|null,
 * }
 */
final class APIListBranchAction implements BaseModel
{
    /** @use SdkModel<APIListBranchActionShape> */
    use SdkModel;

    #[Required('actionId')]
    public string $actionID;

    /** @var list<mixed> $listBranches */
    #[Required(list: APIListBranch::class)]
    public array $listBranches;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?APIConnection $defaultBranch;

    #[Optional]
    public ?string $defaultBranchName;

    /**
     * `new APIListBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIListBranchAction::with(actionID: ..., listBranches: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIListBranchAction)
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
     * @param list<mixed> $listBranches
     * @param Type|value-of<Type> $type
     * @param APIConnection|array{
     *   edgeType: string, nextActionID: string
     * } $defaultBranch
     */
    public static function with(
        string $actionID,
        array $listBranches,
        Type|string $type = 'LIST_BRANCH',
        APIConnection|array|null $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $self = new self;

        $self['actionID'] = $actionID;
        $self['listBranches'] = $listBranches;
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
     * @param list<mixed> $listBranches
     */
    public function withListBranches(array $listBranches): self
    {
        $self = clone $this;
        $self['listBranches'] = $listBranches;

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
     * @param APIConnection|array{
     *   edgeType: string, nextActionID: string
     * } $defaultBranch
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
