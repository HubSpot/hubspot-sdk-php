<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UsageForObjectTypeShape from \HubspotSDK\Crm\Limits\UsageForObjectType
 *
 * @phpstan-type CustomObjectRecordLimitResponseShape = array{
 *   byObjectType: list<UsageForObjectTypeShape>,
 *   overallLimit: int,
 *   overallPercentage: float,
 *   overallUsage: int,
 * }
 */
final class CustomObjectRecordLimitResponse implements BaseModel
{
    /** @use SdkModel<CustomObjectRecordLimitResponseShape> */
    use SdkModel;

    /** @var list<UsageForObjectType> $byObjectType */
    #[Required(list: UsageForObjectType::class)]
    public array $byObjectType;

    /**
     * The maximum number of custom object records allowed.
     */
    #[Required]
    public int $overallLimit;

    /**
     * The percentage of the overall custom object record limit that has been used.
     */
    #[Required]
    public float $overallPercentage;

    /**
     * The total number of custom object records currently in use.
     */
    #[Required]
    public int $overallUsage;

    /**
     * `new CustomObjectRecordLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomObjectRecordLimitResponse::with(
     *   byObjectType: ...,
     *   overallLimit: ...,
     *   overallPercentage: ...,
     *   overallUsage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomObjectRecordLimitResponse)
     *   ->withByObjectType(...)
     *   ->withOverallLimit(...)
     *   ->withOverallPercentage(...)
     *   ->withOverallUsage(...)
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
     * @param list<UsageForObjectTypeShape> $byObjectType
     */
    public static function with(
        array $byObjectType,
        int $overallLimit,
        float $overallPercentage,
        int $overallUsage,
    ): self {
        $self = new self;

        $self['byObjectType'] = $byObjectType;
        $self['overallLimit'] = $overallLimit;
        $self['overallPercentage'] = $overallPercentage;
        $self['overallUsage'] = $overallUsage;

        return $self;
    }

    /**
     * @param list<UsageForObjectTypeShape> $byObjectType
     */
    public function withByObjectType(array $byObjectType): self
    {
        $self = clone $this;
        $self['byObjectType'] = $byObjectType;

        return $self;
    }

    /**
     * The maximum number of custom object records allowed.
     */
    public function withOverallLimit(int $overallLimit): self
    {
        $self = clone $this;
        $self['overallLimit'] = $overallLimit;

        return $self;
    }

    /**
     * The percentage of the overall custom object record limit that has been used.
     */
    public function withOverallPercentage(float $overallPercentage): self
    {
        $self = clone $this;
        $self['overallPercentage'] = $overallPercentage;

        return $self;
    }

    /**
     * The total number of custom object records currently in use.
     */
    public function withOverallUsage(int $overallUsage): self
    {
        $self = clone $this;
        $self['overallUsage'] = $overallUsage;

        return $self;
    }
}
