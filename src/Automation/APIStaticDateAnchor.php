<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\APIStaticDateAnchor\Month;
use HubspotSDK\Automation\APIStaticDateAnchor\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_static_date_anchor = array{
 *   dayOfMonth: int, month: value-of<Month>, type: value-of<Type>, year?: int
 * }
 */
final class APIStaticDateAnchor implements BaseModel
{
    /** @use SdkModel<api_static_date_anchor> */
    use SdkModel;

    #[Api]
    public int $dayOfMonth;

    /** @var value-of<Month> $month */
    #[Api(enum: Month::class)]
    public string $month;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?int $year;

    /**
     * `new APIStaticDateAnchor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticDateAnchor::with(dayOfMonth: ..., month: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticDateAnchor)->withDayOfMonth(...)->withMonth(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $dayOfMonth,
        Month|string $month,
        Type|string $type = 'STATIC_DATE_ANCHOR',
        ?int $year = null,
    ): self {
        $obj = new self;

        $obj->dayOfMonth = $dayOfMonth;
        $obj['month'] = $month;
        $obj['type'] = $type;

        null !== $year && $obj->year = $year;

        return $obj;
    }

    public function withDayOfMonth(int $dayOfMonth): self
    {
        $obj = clone $this;
        $obj->dayOfMonth = $dayOfMonth;

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

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj->year = $year;

        return $obj;
    }
}
