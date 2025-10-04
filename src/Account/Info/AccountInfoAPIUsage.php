<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Info;

use HubspotSDK\Account\Info\AccountInfoAPIUsage\FetchStatus;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type account_info_api_usage = array{
 *   collectedAt: \DateTimeInterface,
 *   currentUsage: int,
 *   fetchStatus: value-of<FetchStatus>,
 *   name: string,
 *   usageLimit: int,
 *   resetsAt?: \DateTimeInterface,
 * }
 */
final class AccountInfoAPIUsage implements BaseModel
{
    /** @use SdkModel<account_info_api_usage> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $collectedAt;

    #[Api]
    public int $currentUsage;

    /** @var value-of<FetchStatus> $fetchStatus */
    #[Api(enum: FetchStatus::class)]
    public string $fetchStatus;

    #[Api]
    public string $name;

    #[Api]
    public int $usageLimit;

    #[Api(optional: true)]
    public ?\DateTimeInterface $resetsAt;

    /**
     * `new AccountInfoAPIUsage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccountInfoAPIUsage::with(
     *   collectedAt: ...,
     *   currentUsage: ...,
     *   fetchStatus: ...,
     *   name: ...,
     *   usageLimit: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccountInfoAPIUsage)
     *   ->withCollectedAt(...)
     *   ->withCurrentUsage(...)
     *   ->withFetchStatus(...)
     *   ->withName(...)
     *   ->withUsageLimit(...)
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
     * @param FetchStatus|value-of<FetchStatus> $fetchStatus
     */
    public static function with(
        \DateTimeInterface $collectedAt,
        int $currentUsage,
        FetchStatus|string $fetchStatus,
        string $name,
        int $usageLimit,
        ?\DateTimeInterface $resetsAt = null,
    ): self {
        $obj = new self;

        $obj->collectedAt = $collectedAt;
        $obj->currentUsage = $currentUsage;
        $obj['fetchStatus'] = $fetchStatus;
        $obj->name = $name;
        $obj->usageLimit = $usageLimit;

        null !== $resetsAt && $obj->resetsAt = $resetsAt;

        return $obj;
    }

    public function withCollectedAt(\DateTimeInterface $collectedAt): self
    {
        $obj = clone $this;
        $obj->collectedAt = $collectedAt;

        return $obj;
    }

    public function withCurrentUsage(int $currentUsage): self
    {
        $obj = clone $this;
        $obj->currentUsage = $currentUsage;

        return $obj;
    }

    /**
     * @param FetchStatus|value-of<FetchStatus> $fetchStatus
     */
    public function withFetchStatus(FetchStatus|string $fetchStatus): self
    {
        $obj = clone $this;
        $obj['fetchStatus'] = $fetchStatus;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withUsageLimit(int $usageLimit): self
    {
        $obj = clone $this;
        $obj->usageLimit = $usageLimit;

        return $obj;
    }

    public function withResetsAt(\DateTimeInterface $resetsAt): self
    {
        $obj = clone $this;
        $obj->resetsAt = $resetsAt;

        return $obj;
    }
}
