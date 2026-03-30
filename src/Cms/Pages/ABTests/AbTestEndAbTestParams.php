<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\ABTests;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * End an active A/B test and designate a winner.
 *
 * @see HubspotSDK\Services\Cms\Pages\ABTestsService::endAbTest()
 *
 * @phpstan-type AbTestEndAbTestParamsShape = array{
 *   abTestID: string, winnerID: string
 * }
 */
final class AbTestEndAbTestParams implements BaseModel
{
    /** @use SdkModel<AbTestEndAbTestParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new AbTestEndAbTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestEndAbTestParams::with(abTestID: ..., winnerID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbTestEndAbTestParams)->withAbTestID(...)->withWinnerID(...)
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
