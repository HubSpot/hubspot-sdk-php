<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAbTestBranchAction\Type;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required('actionId')]
    public string $actionID;

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
     * @param list<APIConnection|array{
     *   edgeType: string, nextActionID: string
     * }> $testBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        array $testBranches,
        Type|string $type = 'AB_TEST_BRANCH'
    ): self {
        $self = new self;

        $self['actionID'] = $actionID;
        $self['testBranches'] = $testBranches;
        $self['type'] = $type;

        return $self;
    }

    public function withActionID(string $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }

    /**
     * @param list<APIConnection|array{
     *   edgeType: string, nextActionID: string
     * }> $testBranches
     */
    public function withTestBranches(array $testBranches): self
    {
        $self = clone $this;
        $self['testBranches'] = $testBranches;

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
}
