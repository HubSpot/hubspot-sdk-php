<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIListBranchAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIListBranchActionShape = array{
 *   actionId: string,
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

    #[Api]
    public string $actionId;

    /** @var list<mixed> $listBranches */
    #[Api(list: APIListBranch::class)]
    public array $listBranches;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?APIConnection $defaultBranch;

    #[Api(optional: true)]
    public ?string $defaultBranchName;

    /**
     * `new APIListBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIListBranchAction::with(actionId: ..., listBranches: ..., type: ...)
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
     *   edgeType: string, nextActionId: string
     * } $defaultBranch
     */
    public static function with(
        string $actionId,
        array $listBranches,
        Type|string $type = 'LIST_BRANCH',
        APIConnection|array|null $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $obj = new self;

        $obj['actionId'] = $actionId;
        $obj['listBranches'] = $listBranches;
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
     * @param list<mixed> $listBranches
     */
    public function withListBranches(array $listBranches): self
    {
        $obj = clone $this;
        $obj['listBranches'] = $listBranches;

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
