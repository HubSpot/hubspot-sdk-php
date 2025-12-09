<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntervalShape = array{
 *   end: \DateTimeInterface, start: \DateTimeInterface
 * }
 */
final class Interval implements BaseModel
{
    /** @use SdkModel<IntervalShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $end;

    #[Required]
    public \DateTimeInterface $start;

    /**
     * `new Interval()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Interval::with(end: ..., start: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Interval)->withEnd(...)->withStart(...)
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
        \DateTimeInterface $end,
        \DateTimeInterface $start
    ): self {
        $obj = new self;

        $obj['end'] = $end;
        $obj['start'] = $start;

        return $obj;
    }

    public function withEnd(\DateTimeInterface $end): self
    {
        $obj = clone $this;
        $obj['end'] = $end;

        return $obj;
    }

    public function withStart(\DateTimeInterface $start): self
    {
        $obj = clone $this;
        $obj['start'] = $start;

        return $obj;
    }
}
