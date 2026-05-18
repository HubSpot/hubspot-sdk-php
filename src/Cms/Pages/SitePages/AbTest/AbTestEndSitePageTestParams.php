<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\SitePages\AbTest;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * End an active A/B test and designate a winner.
 *
 * @see HubSpotSDK\Services\Cms\Pages\SitePages\AbTestService::endSitePageTest()
 *
 * @phpstan-type AbTestEndSitePageTestParamsShape = array{
 *   abTestID: string, winnerID: string
 * }
 */
final class AbTestEndSitePageTestParams implements BaseModel
{
    /** @use SdkModel<AbTestEndSitePageTestParamsShape> */
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
     * `new AbTestEndSitePageTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestEndSitePageTestParams::with(abTestID: ..., winnerID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbTestEndSitePageTestParams)->withAbTestID(...)->withWinnerID(...)
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
