<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APIConnectionShape from \HubspotSDK\Automation\Workflows\APIConnection
 *
 * @phpstan-type APIStaticBranchShape = array{
 *   branchValue: string, connection?: null|APIConnection|APIConnectionShape
 * }
 */
final class APIStaticBranch implements BaseModel
{
    /** @use SdkModel<APIStaticBranchShape> */
    use SdkModel;

    #[Required]
    public string $branchValue;

    #[Optional]
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
     *
     * @param APIConnection|APIConnectionShape|null $connection
     */
    public static function with(
        string $branchValue,
        APIConnection|array|null $connection = null
    ): self {
        $self = new self;

        $self['branchValue'] = $branchValue;

        null !== $connection && $self['connection'] = $connection;

        return $self;
    }

    public function withBranchValue(string $branchValue): self
    {
        $self = clone $this;
        $self['branchValue'] = $branchValue;

        return $self;
    }

    /**
     * @param APIConnection|APIConnectionShape $connection
     */
    public function withConnection(APIConnection|array $connection): self
    {
        $self = clone $this;
        $self['connection'] = $connection;

        return $self;
    }
}
