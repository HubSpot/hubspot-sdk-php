<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIBlockedDate\Month;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIBlockedDateShape = array{
 *   dayOfMonth: int, month: value-of<Month>, year?: int|null
 * }
 */
final class APIBlockedDate implements BaseModel
{
    /** @use SdkModel<APIBlockedDateShape> */
    use SdkModel;

    #[Required]
    public int $dayOfMonth;

    /** @var value-of<Month> $month */
    #[Required(enum: Month::class)]
    public string $month;

    #[Optional]
    public ?int $year;

    /**
     * `new APIBlockedDate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIBlockedDate::with(dayOfMonth: ..., month: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIBlockedDate)->withDayOfMonth(...)->withMonth(...)
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
     *
     * @param Month|value-of<Month> $month
     */
    public static function with(
        int $dayOfMonth,
        Month|string $month,
        ?int $year = null
    ): self {
        $obj = new self;

        $obj['dayOfMonth'] = $dayOfMonth;
        $obj['month'] = $month;

        null !== $year && $obj['year'] = $year;

        return $obj;
    }

    public function withDayOfMonth(int $dayOfMonth): self
    {
        $obj = clone $this;
        $obj['dayOfMonth'] = $dayOfMonth;

        return $obj;
    }

    /**
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

        return $obj;
    }

    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj['year'] = $year;

        return $obj;
    }
}
