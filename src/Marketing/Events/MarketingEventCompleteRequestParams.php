<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventCompleteRequestParamsShape = array{
 *   endDateTime: \DateTimeInterface, startDateTime: \DateTimeInterface
 * }
 */
final class MarketingEventCompleteRequestParams implements BaseModel
{
    /** @use SdkModel<MarketingEventCompleteRequestParamsShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $endDateTime;

    #[Required]
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
        $self = new self;

        $self['endDateTime'] = $endDateTime;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $self = clone $this;
        $self['endDateTime'] = $endDateTime;

        return $self;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $self = clone $this;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }
}
