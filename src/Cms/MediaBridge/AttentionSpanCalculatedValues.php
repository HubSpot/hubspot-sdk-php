<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AttentionSpanCalculatedValuesShape = array{
 *   totalPercentPlayed: float, totalSecondsPlayed: int
 * }
 */
final class AttentionSpanCalculatedValues implements BaseModel
{
    /** @use SdkModel<AttentionSpanCalculatedValuesShape> */
    use SdkModel;

    #[Api]
    public float $totalPercentPlayed;

    #[Api]
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
        $obj = new self;

        $obj->totalPercentPlayed = $totalPercentPlayed;
        $obj->totalSecondsPlayed = $totalSecondsPlayed;

        return $obj;
    }

    public function withTotalPercentPlayed(float $totalPercentPlayed): self
    {
        $obj = clone $this;
        $obj->totalPercentPlayed = $totalPercentPlayed;

        return $obj;
    }

    public function withTotalSecondsPlayed(int $totalSecondsPlayed): self
    {
        $obj = clone $this;
        $obj->totalSecondsPlayed = $totalSecondsPlayed;

        return $obj;
    }
}
