<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_static_branch = array{
 *   branchValue: string, connection?: APIConnection
 * }
 */
final class APIStaticBranch implements BaseModel
{
    /** @use SdkModel<api_static_branch> */
    use SdkModel;

    /**
     * If value to check for. If the value of the `inputValue` matches this `branchValue` than this `connection` will get traversed.
     */
    #[Api]
    public string $branchValue;

    #[Api(optional: true)]
    public ?APIConnection $connection;

    /**
     * `new APIStaticBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticBranch::with(branchValue: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticBranch)->withBranchValue(...)
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
        ?APIConnection $connection = null
    ): self {
        $obj = new self;

        $obj->branchValue = $branchValue;

        null !== $connection && $obj->connection = $connection;

        return $obj;
    }

    /**
     * If value to check for. If the value of the `inputValue` matches this `branchValue` than this `connection` will get traversed.
     */
    public function withBranchValue(string $branchValue): self
    {
        $obj = clone $this;
        $obj->branchValue = $branchValue;

        return $obj;
    }

    public function withConnection(APIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
