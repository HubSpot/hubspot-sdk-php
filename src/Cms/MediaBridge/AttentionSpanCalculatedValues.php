<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AttentionSpanCalculatedValuesShape = array{
 *   totalPercentPlayed: float, totalSecondsPlayed: int
 * }
 */
final class AttentionSpanCalculatedValues implements BaseModel
{
    /** @use SdkModel<AttentionSpanCalculatedValuesShape> */
    use SdkModel;

    #[Required]
    public float $totalPercentPlayed;

    #[Required]
    public int $totalSecondsPlayed;

    /**
     * `new AttentionSpanCalculatedValues()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttentionSpanCalculatedValues::with(
     *   totalPercentPlayed: ..., totalSecondsPlayed: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttentionSpanCalculatedValues)
     *   ->withTotalPercentPlayed(...)
     *   ->withTotalSecondsPlayed(...)
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
     */
    public static function with(
        float $totalPercentPlayed,
        int $totalSecondsPlayed
    ): self {
        $self = new self;

        $self['totalPercentPlayed'] = $totalPercentPlayed;
        $self['totalSecondsPlayed'] = $totalSecondsPlayed;

        return $self;
    }

    public function withTotalPercentPlayed(float $totalPercentPlayed): self
    {
        $self = clone $this;
        $self['totalPercentPlayed'] = $totalPercentPlayed;

        return $self;
    }

    public function withTotalSecondsPlayed(int $totalSecondsPlayed): self
    {
        $self = clone $this;
        $self['totalSecondsPlayed'] = $totalSecondsPlayed;

        return $self;
    }
}
