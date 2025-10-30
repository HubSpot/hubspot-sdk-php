<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * End an active A/B test and designate a winner.
 *
 * @see HubspotSDK\Cms\Pages\SitePages->endAbTest
 *
 * @phpstan-type SitePageEndAbTestParamsShape = array{
 *   abTestID: string, winnerID: string
 * }
 */
final class SitePageEndAbTestParams implements BaseModel
{
    /** @use SdkModel<SitePageEndAbTestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the test to end.
     */
    #[Api('abTestId')]
    public string $abTestID;

    /**
     * ID of the object to designate as the test winner.
     */
    #[Api('winnerId')]
    public string $winnerID;

    /**
     * `new SitePageEndAbTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageEndAbTestParams::with(abTestID: ..., winnerID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageEndAbTestParams)->withAbTestID(...)->withWinnerID(...)
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
        $obj = new self;

        $obj->abTestID = $abTestID;
        $obj->winnerID = $winnerID;

        return $obj;
    }

    /**
     * ID of the test to end.
     */
    public function withAbTestID(string $abTestID): self
    {
        $obj = clone $this;
        $obj->abTestID = $abTestID;

        return $obj;
    }

    /**
     * ID of the object to designate as the test winner.
     */
    public function withWinnerID(string $winnerID): self
    {
        $obj = clone $this;
        $obj->winnerID = $winnerID;

        return $obj;
    }
}
