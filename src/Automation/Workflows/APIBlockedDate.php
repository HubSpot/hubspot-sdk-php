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
 *   dayOfMonth: int, month: Month|value-of<Month>, year?: int|null
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
        $self = new self;

        $self['dayOfMonth'] = $dayOfMonth;
        $self['month'] = $month;

        null !== $year && $self['year'] = $year;

        return $self;
    }

    public function withDayOfMonth(int $dayOfMonth): self
    {
        $self = clone $this;
        $self['dayOfMonth'] = $dayOfMonth;

        return $self;
    }

    /**
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }
}
