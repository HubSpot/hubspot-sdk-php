<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type email_statistics_data = array{
 *   counters: array<string, int>,
 *   deviceBreakdown: array<string, array<string, int>>,
 *   qualifierStats: array<string, array<string, int>>,
 *   ratios: array<string, float>,
 * }
 */
final class EmailStatisticsData implements BaseModel
{
    /** @use SdkModel<email_statistics_data> */
    use SdkModel;

    /** @var array<string, int> $counters */
    #[Api(map: 'int')]
    public array $counters;

    /** @var array<string, array<string, int>> $deviceBreakdown */
    #[Api(map: new MapOf('int'))]
    public array $deviceBreakdown;

    /** @var array<string, array<string, int>> $qualifierStats */
    #[Api(map: new MapOf('int'))]
    public array $qualifierStats;

    /** @var array<string, float> $ratios */
    #[Api(map: 'float')]
    public array $ratios;

    /**
     * `new EmailStatisticsData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailStatisticsData::with(
     *   counters: ..., deviceBreakdown: ..., qualifierStats: ..., ratios: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailStatisticsData)
     *   ->withCounters(...)
     *   ->withDeviceBreakdown(...)
     *   ->withQualifierStats(...)
     *   ->withRatios(...)
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
     * @param array<string, int> $counters
     * @param array<string, array<string, int>> $deviceBreakdown
     * @param array<string, array<string, int>> $qualifierStats
     * @param array<string, float> $ratios
     */
    public static function with(
        array $counters,
        array $deviceBreakdown,
        array $qualifierStats,
        array $ratios,
    ): self {
        $obj = new self;

        $obj->counters = $counters;
        $obj->deviceBreakdown = $deviceBreakdown;
        $obj->qualifierStats = $qualifierStats;
        $obj->ratios = $ratios;

        return $obj;
    }

    /**
     * @param array<string, int> $counters
     */
    public function withCounters(array $counters): self
    {
        $obj = clone $this;
        $obj->counters = $counters;

        return $obj;
    }

    /**
     * @param array<string, array<string, int>> $deviceBreakdown
     */
    public function withDeviceBreakdown(array $deviceBreakdown): self
    {
        $obj = clone $this;
        $obj->deviceBreakdown = $deviceBreakdown;

        return $obj;
    }

    /**
     * @param array<string, array<string, int>> $qualifierStats
     */
    public function withQualifierStats(array $qualifierStats): self
    {
        $obj = clone $this;
        $obj->qualifierStats = $qualifierStats;

        return $obj;
    }

    /**
     * @param array<string, float> $ratios
     */
    public function withRatios(array $ratios): self
    {
        $obj = clone $this;
        $obj->ratios = $ratios;

        return $obj;
    }
}
