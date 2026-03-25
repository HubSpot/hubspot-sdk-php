<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UsageForObjectTypeShape from \HubspotSDK\Crm\Limits\UsageForObjectType
 *
 * @phpstan-type CalculatedPropertyLimitResponseShape = array{
 *   byObjectType: list<UsageForObjectType|UsageForObjectTypeShape>,
 *   overallLimit: int,
 *   overallPercentage: float,
 *   overallUsage: int,
 * }
 */
final class CalculatedPropertyLimitResponse implements BaseModel
{
    /** @use SdkModel<CalculatedPropertyLimitResponseShape> */
    use SdkModel;

    /** @var list<UsageForObjectType> $byObjectType */
    #[Required(list: UsageForObjectType::class)]
    public array $byObjectType;

    /**
     * The maximum number of calculated properties allowed.
     */
    #[Required]
    public int $overallLimit;

    /**
     * The percentage of the overall limit that is currently being used for calculated properties.
     */
    #[Required]
    public float $overallPercentage;

    /**
     * The total number of calculated properties currently in use.
     */
    #[Required]
    public int $overallUsage;

    /**
     * `new CalculatedPropertyLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalculatedPropertyLimitResponse::with(
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
     * (new CalculatedPropertyLimitResponse)
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
     * @param list<UsageForObjectType|UsageForObjectTypeShape> $byObjectType
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
     * @param list<UsageForObjectType|UsageForObjectTypeShape> $byObjectType
     */
    public function withByObjectType(array $byObjectType): self
    {
        $self = clone $this;
        $self['byObjectType'] = $byObjectType;

        return $self;
    }

    /**
     * The maximum number of calculated properties allowed.
     */
    public function withOverallLimit(int $overallLimit): self
    {
        $self = clone $this;
        $self['overallLimit'] = $overallLimit;

        return $self;
    }

    /**
     * The percentage of the overall limit that is currently being used for calculated properties.
     */
    public function withOverallPercentage(float $overallPercentage): self
    {
        $self = clone $this;
        $self['overallPercentage'] = $overallPercentage;

        return $self;
    }

    /**
     * The total number of calculated properties currently in use.
     */
    public function withOverallUsage(int $overallUsage): self
    {
        $self = clone $this;
        $self['overallUsage'] = $overallUsage;

        return $self;
    }
}
