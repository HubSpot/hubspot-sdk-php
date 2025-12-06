<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Account\APIUsage\FetchStatus;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * API usage and limits information for a HubSpot account.
 *
 * @phpstan-type APIUsageShape = array{
 *   collectedAt: \DateTimeInterface,
 *   currentUsage: int,
 *   fetchStatus: value-of<FetchStatus>,
 *   name: string,
 *   usageLimit: int,
 *   resetsAt?: \DateTimeInterface|null,
 * }
 */
final class APIUsage implements BaseModel
{
    /** @use SdkModel<APIUsageShape> */
    use SdkModel;

    /**
     * Indicates when the cache was last updated.
     */
    #[Api]
    public \DateTimeInterface $collectedAt;

    /**
     * How many API calls an account has made for the current day.
     */
    #[Api]
    public int $currentUsage;

    /**
     * Status of fetching the information, including if the data came from the cache.
     *
     * @var value-of<FetchStatus> $fetchStatus
     */
    #[Api(enum: FetchStatus::class)]
    public string $fetchStatus;

    /**
     * Name of the limit type.
     */
    #[Api]
    public string $name;

    /**
     * Limits by which a single integration can consume the HubSpot public APIs.
     */
    #[Api]
    public int $usageLimit;

    /**
     * Time that the limit will reset.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $resetsAt;

    /**
     * `new APIUsage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIUsage::with(
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
     * (new APIUsage)
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

        $obj['collectedAt'] = $collectedAt;
        $obj['currentUsage'] = $currentUsage;
        $obj['fetchStatus'] = $fetchStatus;
        $obj['name'] = $name;
        $obj['usageLimit'] = $usageLimit;

        null !== $resetsAt && $obj['resetsAt'] = $resetsAt;

        return $obj;
    }

    /**
     * Indicates when the cache was last updated.
     */
    public function withCollectedAt(\DateTimeInterface $collectedAt): self
    {
        $obj = clone $this;
        $obj['collectedAt'] = $collectedAt;

        return $obj;
    }

    /**
     * How many API calls an account has made for the current day.
     */
    public function withCurrentUsage(int $currentUsage): self
    {
        $obj = clone $this;
        $obj['currentUsage'] = $currentUsage;

        return $obj;
    }

    /**
     * Status of fetching the information, including if the data came from the cache.
     *
     * @param FetchStatus|value-of<FetchStatus> $fetchStatus
     */
    public function withFetchStatus(FetchStatus|string $fetchStatus): self
    {
        $obj = clone $this;
        $obj['fetchStatus'] = $fetchStatus;

        return $obj;
    }

    /**
     * Name of the limit type.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Limits by which a single integration can consume the HubSpot public APIs.
     */
    public function withUsageLimit(int $usageLimit): self
    {
        $obj = clone $this;
        $obj['usageLimit'] = $usageLimit;

        return $obj;
    }

    /**
     * Time that the limit will reset.
     */
    public function withResetsAt(\DateTimeInterface $resetsAt): self
    {
        $obj = clone $this;
        $obj['resetsAt'] = $resetsAt;

        return $obj;
    }
}
