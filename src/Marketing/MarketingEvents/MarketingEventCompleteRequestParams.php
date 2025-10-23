<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_event_complete_request_params = array{
 *   endDateTime: \DateTimeInterface, startDateTime: \DateTimeInterface
 * }
 */
final class MarketingEventCompleteRequestParams implements BaseModel
{
    /** @use SdkModel<marketing_event_complete_request_params> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $endDateTime;

    #[Api]
    public \DateTimeInterface $startDateTime;

    /**
     * `new MarketingEventCompleteRequestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventCompleteRequestParams::with(endDateTime: ..., startDateTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventCompleteRequestParams)
     *   ->withEndDateTime(...)
     *   ->withStartDateTime(...)
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
        \DateTimeInterface $endDateTime,
        \DateTimeInterface $startDateTime
    ): self {
        $obj = new self;

        $obj->endDateTime = $endDateTime;
        $obj->startDateTime = $startDateTime;

        return $obj;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $obj = clone $this;
        $obj->endDateTime = $endDateTime;

        return $obj;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj->startDateTime = $startDateTime;

        return $obj;
    }
}
