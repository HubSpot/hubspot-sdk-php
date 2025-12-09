<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAbTestBranchAction\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIAbTestBranchActionShape = array{
 *   actionId: string, testBranches: list<APIConnection>, type: value-of<Type>
 * }
 */
final class APIAbTestBranchAction implements BaseModel
{
    /** @use SdkModel<APIAbTestBranchActionShape> */
    use SdkModel;

    #[Required]
    public string $actionId;

    /** @var list<APIConnection> $testBranches */
    #[Required(list: APIConnection::class)]
    public array $testBranches;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIAbTestBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAbTestBranchAction::with(actionId: ..., testBranches: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIAbTestBranchAction)
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
     * @param list<APIConnection|array{
     *   edgeType: string, nextActionId: string
     * }> $testBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionId,
        array $testBranches,
        Type|string $type = 'AB_TEST_BRANCH'
    ): self {
        $obj = new self;

        $obj['actionId'] = $actionId;
        $obj['testBranches'] = $testBranches;
        $obj['type'] = $type;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionId'] = $actionID;

        return $obj;
    }

    /**
     * @param list<APIConnection|array{
     *   edgeType: string, nextActionId: string
     * }> $testBranches
     */
    public function withTestBranches(array $testBranches): self
    {
        $obj = clone $this;
        $obj['testBranches'] = $testBranches;

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
}
