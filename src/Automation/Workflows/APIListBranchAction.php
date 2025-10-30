<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIListBranchAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIListBranchActionShape = array{
 *   actionID: string,
 *   listBranches: list<APIListBranch>,
 *   type: value-of<Type>,
 *   defaultBranch?: APIConnection,
 *   defaultBranchName?: string,
 * }
 */
final class APIListBranchAction implements BaseModel
{
    /** @use SdkModel<APIListBranchActionShape> */
    use SdkModel;

    /**
     * The ID for this action.
     */
    #[Api('actionId')]
    public string $actionID;

    /** @var list<APIListBranch> $listBranches */
    #[Api(list: APIListBranch::class)]
    public array $listBranches;

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
     * The name of the default branch, the branch that gets executed if the object does not match any of the `listBranch` criteria.
     */
    #[Api(optional: true)]
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
     * @param list<APIListBranch> $listBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        array $listBranches,
        Type|string $type = 'LIST_BRANCH',
        ?APIConnection $defaultBranch = null,
        ?string $defaultBranchName = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->listBranches = $listBranches;
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
     * @param list<APIListBranch> $listBranches
     */
    public function withListBranches(array $listBranches): self
    {
        $obj = clone $this;
        $obj->listBranches = $listBranches;

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
     * The name of the default branch, the branch that gets executed if the object does not match any of the `listBranch` criteria.
     */
    public function withDefaultBranchName(string $defaultBranchName): self
    {
        $obj = clone $this;
        $obj->defaultBranchName = $defaultBranchName;

        return $obj;
    }
}
