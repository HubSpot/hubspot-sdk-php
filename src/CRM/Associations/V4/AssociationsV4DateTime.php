<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type associations_v4_date_time = array{
 *   dateOnly: bool, timeZoneShift: int, value: int
 * }
 */
final class AssociationsV4DateTime implements BaseModel
{
    /** @use SdkModel<associations_v4_date_time> */
    use SdkModel;

    #[Api]
    public bool $dateOnly;

    #[Api]
    public int $timeZoneShift;

    #[Api]
    public int $value;

    /**
     * `new AssociationsV4DateTime()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4DateTime::with(dateOnly: ..., timeZoneShift: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4DateTime)
     *   ->withDateOnly(...)
     *   ->withTimeZoneShift(...)
     *   ->withValue(...)
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
        bool $dateOnly,
        int $timeZoneShift,
        int $value
    ): self {
        $obj = new self;

        $obj->dateOnly = $dateOnly;
        $obj->timeZoneShift = $timeZoneShift;
        $obj->value = $value;

        return $obj;
    }

    public function withDateOnly(bool $dateOnly): self
    {
        $obj = clone $this;
        $obj->dateOnly = $dateOnly;

        return $obj;
    }

    public function withTimeZoneShift(int $timeZoneShift): self
    {
        $obj = clone $this;
        $obj->timeZoneShift = $timeZoneShift;

        return $obj;
    }

    public function withValue(int $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
