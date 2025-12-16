<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Account\APIUsage\FetchStatus;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * API usage and limits information for a HubSpot account.
 *
 * @phpstan-type APIUsageShape = array{
 *   collectedAt: \DateTimeInterface,
 *   currentUsage: int,
 *   fetchStatus: FetchStatus|value-of<FetchStatus>,
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
    #[Required]
    public \DateTimeInterface $collectedAt;

    /**
     * How many API calls an account has made for the current day.
     */
    #[Required]
    public int $currentUsage;

    /**
     * Status of fetching the information, including if the data came from the cache.
     *
     * @var value-of<FetchStatus> $fetchStatus
     */
    #[Required(enum: FetchStatus::class)]
    public string $fetchStatus;

    /**
     * Name of the limit type.
     */
    #[Required]
    public string $name;

    /**
     * Limits by which a single integration can consume the HubSpot public APIs.
     */
    #[Required]
    public int $usageLimit;

    /**
     * Time that the limit will reset.
     */
    #[Optional]
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
        $self = new self;

        $self['collectedAt'] = $collectedAt;
        $self['currentUsage'] = $currentUsage;
        $self['fetchStatus'] = $fetchStatus;
        $self['name'] = $name;
        $self['usageLimit'] = $usageLimit;

        null !== $resetsAt && $self['resetsAt'] = $resetsAt;

        return $self;
    }

    /**
     * Indicates when the cache was last updated.
     */
    public function withCollectedAt(\DateTimeInterface $collectedAt): self
    {
        $self = clone $this;
        $self['collectedAt'] = $collectedAt;

        return $self;
    }

    /**
     * How many API calls an account has made for the current day.
     */
    public function withCurrentUsage(int $currentUsage): self
    {
        $self = clone $this;
        $self['currentUsage'] = $currentUsage;

        return $self;
    }

    /**
     * Status of fetching the information, including if the data came from the cache.
     *
     * @param FetchStatus|value-of<FetchStatus> $fetchStatus
     */
    public function withFetchStatus(FetchStatus|string $fetchStatus): self
    {
        $self = clone $this;
        $self['fetchStatus'] = $fetchStatus;

        return $self;
    }

    /**
     * Name of the limit type.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Limits by which a single integration can consume the HubSpot public APIs.
     */
    public function withUsageLimit(int $usageLimit): self
    {
        $self = clone $this;
        $self['usageLimit'] = $usageLimit;

        return $self;
    }

    /**
     * Time that the limit will reset.
     */
    public function withResetsAt(\DateTimeInterface $resetsAt): self
    {
        $self = clone $this;
        $self['resetsAt'] = $resetsAt;

        return $self;
    }
}
