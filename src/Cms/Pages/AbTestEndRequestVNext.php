<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AbTestEndRequestVNextShape = array{
 *   abTestID: string, winnerID: string
 * }
 */
final class AbTestEndRequestVNext implements BaseModel
{
    /** @use SdkModel<AbTestEndRequestVNextShape> */
    use SdkModel;

    /**
     * ID of the test to end.
     */
    #[Required('abTestId')]
    public string $abTestID;

    /**
     * ID of the object to designate as the test winner.
     */
    #[Required('winnerId')]
    public string $winnerID;

    /**
     * `new AbTestEndRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestEndRequestVNext::with(abTestID: ..., winnerID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbTestEndRequestVNext)->withAbTestID(...)->withWinnerID(...)
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
    public static function with(string $abTestID, string $winnerID): self
    {
        $self = new self;

        $self['abTestID'] = $abTestID;
        $self['winnerID'] = $winnerID;

        return $self;
    }

    /**
     * ID of the test to end.
     */
    public function withAbTestID(string $abTestID): self
    {
        $self = clone $this;
        $self['abTestID'] = $abTestID;

        return $self;
    }

    /**
     * ID of the object to designate as the test winner.
     */
    public function withWinnerID(string $winnerID): self
    {
        $self = clone $this;
        $self['winnerID'] = $winnerID;

        return $self;
    }
}
