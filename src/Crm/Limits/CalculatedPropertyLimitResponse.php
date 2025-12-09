<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CalculatedPropertyLimitResponseShape = array{
 *   byObjectType: list<UsageForObjectType>,
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
    #[Api(list: UsageForObjectType::class)]
    public array $byObjectType;

    /**
     * The maximum number of calculated properties allowed.
     */
    #[Api]
    public int $overallLimit;

    /**
     * The percentage of the overall limit that is currently being used for calculated properties.
     */
    #[Api]
    public float $overallPercentage;

    /**
     * The total number of calculated properties currently in use.
     */
    #[Api]
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
     * @param list<UsageForObjectType|array{
     *   objectTypeId: string, pluralLabel: string, singularLabel: string, usage: int
     * }> $byObjectType
     */
    public static function with(
        array $byObjectType,
        int $overallLimit,
        float $overallPercentage,
        int $overallUsage,
    ): self {
        $obj = new self;

        $obj['byObjectType'] = $byObjectType;
        $obj['overallLimit'] = $overallLimit;
        $obj['overallPercentage'] = $overallPercentage;
        $obj['overallUsage'] = $overallUsage;

        return $obj;
    }

    /**
     * @param list<UsageForObjectType|array{
     *   objectTypeId: string, pluralLabel: string, singularLabel: string, usage: int
     * }> $byObjectType
     */
    public function withByObjectType(array $byObjectType): self
    {
        $obj = clone $this;
        $obj['byObjectType'] = $byObjectType;

        return $obj;
    }

    /**
     * The maximum number of calculated properties allowed.
     */
    public function withOverallLimit(int $overallLimit): self
    {
        $obj = clone $this;
        $obj['overallLimit'] = $overallLimit;

        return $obj;
    }

    /**
     * The percentage of the overall limit that is currently being used for calculated properties.
     */
    public function withOverallPercentage(float $overallPercentage): self
    {
        $obj = clone $this;
        $obj['overallPercentage'] = $overallPercentage;

        return $obj;
    }

    /**
     * The total number of calculated properties currently in use.
     */
    public function withOverallUsage(int $overallUsage): self
    {
        $obj = clone $this;
        $obj['overallUsage'] = $overallUsage;

        return $obj;
    }
}
