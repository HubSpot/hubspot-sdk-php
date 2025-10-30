<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAbTestBranchAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIAbTestBranchActionShape = array{
 *   actionID: string, testBranches: list<APIConnection>, type: value-of<Type>
 * }
 */
final class APIAbTestBranchAction implements BaseModel
{
    /** @use SdkModel<APIAbTestBranchActionShape> */
    use SdkModel;

    /**
     * The ID for this action.
     */
    #[Api('actionId')]
    public string $actionID;

    /** @var list<APIConnection> $testBranches */
    #[Api(list: APIConnection::class)]
    public array $testBranches;

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIAbTestBranchAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAbTestBranchAction::with(actionID: ..., testBranches: ..., type: ...)
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
     * @param list<APIConnection> $testBranches
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
        $obj['type'] = $type;

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
     * @param list<APIConnection> $testBranches
     */
    public function withTestBranches(array $testBranches): self
    {
        $obj = clone $this;
        $obj->testBranches = $testBranches;

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
}
