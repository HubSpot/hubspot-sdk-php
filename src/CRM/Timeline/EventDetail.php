<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Timeline;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The details Markdown rendered as HTML.
 *
 * @phpstan-type event_detail = array{details: string}
 */
final class EventDetail implements BaseModel
{
    /** @use SdkModel<event_detail> */
    use SdkModel;

    /**
     * The details Markdown rendered as HTML.
     */
    #[Api]
    public string $details;

    /**
     * `new EventDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDetail::with(details: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDetail)->withDetails(...)
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
    public static function with(string $details): self
    {
        $obj = new self;

        $obj->details = $details;

        return $obj;
    }

    /**
     * The details Markdown rendered as HTML.
     */
    public function withDetails(string $details): self
    {
        $obj = clone $this;
        $obj->details = $details;

        return $obj;
    }
}
