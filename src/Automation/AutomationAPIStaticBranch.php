<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_static_branch = array{
 *   branchValue: string, connection?: AutomationAPIConnection
 * }
 */
final class AutomationAPIStaticBranch implements BaseModel
{
    /** @use SdkModel<automation_api_static_branch> */
    use SdkModel;

    #[Api]
    public string $branchValue;

    #[Api(optional: true)]
    public ?AutomationAPIConnection $connection;

    /**
     * `new AutomationAPIStaticBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIStaticBranch::with(branchValue: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIStaticBranch)->withBranchValue(...)
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
     */
    public static function with(
        string $branchValue,
        ?AutomationAPIConnection $connection = null
    ): self {
        $obj = new self;

        $obj->branchValue = $branchValue;

        null !== $connection && $obj->connection = $connection;

        return $obj;
    }

    public function withBranchValue(string $branchValue): self
    {
        $obj = clone $this;
        $obj->branchValue = $branchValue;

        return $obj;
    }

    public function withConnection(AutomationAPIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
