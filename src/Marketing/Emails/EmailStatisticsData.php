<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type EmailStatisticsDataShape = array{
 *   counters: array<string,int>,
 *   deviceBreakdown: array<string,array<string,int>>,
 *   qualifierStats: array<string,array<string,int>>,
 *   ratios: array<string,float>,
 * }
 */
final class EmailStatisticsData implements BaseModel
{
    /** @use SdkModel<EmailStatisticsDataShape> */
    use SdkModel;

    /**
     * Counters like number of `sent`, `open` or `delivered`.
     *
     * @var array<string,int> $counters
     */
    #[Required(map: 'int')]
    public array $counters;

    /**
     * Statistics by device.
     *
     * @var array<string,array<string,int>> $deviceBreakdown
     */
    #[Required(map: new MapOf('int'))]
    public array $deviceBreakdown;

    /**
     * Number of emails that were dropped and bounced.
     *
     * @var array<string,array<string,int>> $qualifierStats
     */
    #[Required(map: new MapOf('int'))]
    public array $qualifierStats;

    /**
     * Ratios like `openratio` or `clickratio`.
     *
     * @var array<string,float> $ratios
     */
    #[Required(map: 'float')]
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
     * @param array<string,int> $counters
     * @param array<string,array<string,int>> $deviceBreakdown
     * @param array<string,array<string,int>> $qualifierStats
     * @param array<string,float> $ratios
     */
    public static function with(
        array $counters,
        array $deviceBreakdown,
        array $qualifierStats,
        array $ratios,
    ): self {
        $self = new self;

        $self['counters'] = $counters;
        $self['deviceBreakdown'] = $deviceBreakdown;
        $self['qualifierStats'] = $qualifierStats;
        $self['ratios'] = $ratios;

        return $self;
    }

    /**
     * Counters like number of `sent`, `open` or `delivered`.
     *
     * @param array<string,int> $counters
     */
    public function withCounters(array $counters): self
    {
        $self = clone $this;
        $self['counters'] = $counters;

        return $self;
    }

    /**
     * Statistics by device.
     *
     * @param array<string,array<string,int>> $deviceBreakdown
     */
    public function withDeviceBreakdown(array $deviceBreakdown): self
    {
        $self = clone $this;
        $self['deviceBreakdown'] = $deviceBreakdown;

        return $self;
    }

    /**
     * Number of emails that were dropped and bounced.
     *
     * @param array<string,array<string,int>> $qualifierStats
     */
    public function withQualifierStats(array $qualifierStats): self
    {
        $self = clone $this;
        $self['qualifierStats'] = $qualifierStats;

        return $self;
    }

    /**
     * Ratios like `openratio` or `clickratio`.
     *
     * @param array<string,float> $ratios
     */
    public function withRatios(array $ratios): self
    {
        $self = clone $this;
        $self['ratios'] = $ratios;

        return $self;
    }
}
