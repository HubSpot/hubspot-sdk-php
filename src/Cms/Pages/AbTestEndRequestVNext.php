<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Request body object for ending A/B tests.
 *
 * @phpstan-type AbTestEndRequestVNextShape = array{
 *   abTestId: string, winnerId: string
 * }
 */
final class AbTestEndRequestVNext implements BaseModel
{
    /** @use SdkModel<AbTestEndRequestVNextShape> */
    use SdkModel;

    /**
     * ID of the test to end.
     */
    #[Api]
    public string $abTestId;

    /**
     * ID of the object to designate as the test winner.
     */
    #[Api]
    public string $winnerId;

    /**
     * `new AbTestEndRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbTestEndRequestVNext::with(abTestId: ..., winnerId: ...)
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
    public static function with(string $abTestId, string $winnerId): self
    {
        $obj = new self;

        $obj->abTestId = $abTestId;
        $obj->winnerId = $winnerId;

        return $obj;
    }

    /**
     * ID of the test to end.
     */
    public function withAbTestID(string $abTestID): self
    {
        $obj = clone $this;
        $obj->abTestId = $abTestID;

        return $obj;
    }

    /**
     * ID of the object to designate as the test winner.
     */
    public function withWinnerID(string $winnerID): self
    {
        $obj = clone $this;
        $obj->winnerId = $winnerID;

        return $obj;
    }
}
