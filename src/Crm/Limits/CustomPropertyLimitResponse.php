<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LimitAndUsageForObjectTypeShape from \HubspotSDK\Crm\Limits\LimitAndUsageForObjectType
 *
 * @phpstan-type CustomPropertyLimitResponseShape = array{
 *   byObjectType: list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape>,
 *   overallLimit: int,
 *   overallPercentage: float,
 *   overallUsage: int,
 * }
 */
final class CustomPropertyLimitResponse implements BaseModel
{
    /** @use SdkModel<CustomPropertyLimitResponseShape> */
    use SdkModel;

    /** @var list<LimitAndUsageForObjectType> $byObjectType */
    #[Required(list: LimitAndUsageForObjectType::class)]
    public array $byObjectType;

    /**
     * The total limit for custom properties across all objects.
     */
    #[Required]
    public int $overallLimit;

    /**
     * The percentage of the overall custom property limit that has been used.
     */
    #[Required]
    public float $overallPercentage;

    /**
     * The total number of custom properties currently in use across all objects.
     */
    #[Required]
    public int $overallUsage;

    /**
     * `new CustomPropertyLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomPropertyLimitResponse::with(
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
     * (new CustomPropertyLimitResponse)
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
     * @param list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape> $byObjectType
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
     * @param list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape> $byObjectType
     */
    public function withByObjectType(array $byObjectType): self
    {
        $self = clone $this;
        $self['byObjectType'] = $byObjectType;

        return $self;
    }

    /**
     * The total limit for custom properties across all objects.
     */
    public function withOverallLimit(int $overallLimit): self
    {
        $self = clone $this;
        $self['overallLimit'] = $overallLimit;

        return $self;
    }

    /**
     * The percentage of the overall custom property limit that has been used.
     */
    public function withOverallPercentage(float $overallPercentage): self
    {
        $self = clone $this;
        $self['overallPercentage'] = $overallPercentage;

        return $self;
    }

    /**
     * The total number of custom properties currently in use across all objects.
     */
    public function withOverallUsage(int $overallUsage): self
    {
        $self = clone $this;
        $self['overallUsage'] = $overallUsage;

        return $self;
    }
}
