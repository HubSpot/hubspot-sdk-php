<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticDateAnchor\Month;
use HubspotSDK\Automation\Workflows\APIStaticDateAnchor\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIStaticDateAnchorShape = array{
 *   dayOfMonth: int,
 *   month: Month|value-of<Month>,
 *   type: Type|value-of<Type>,
 *   year?: int|null,
 * }
 */
final class APIStaticDateAnchor implements BaseModel
{
    /** @use SdkModel<APIStaticDateAnchorShape> */
    use SdkModel;

    #[Required]
    public int $dayOfMonth;

    /** @var value-of<Month> $month */
    #[Required(enum: Month::class)]
    public string $month;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
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
        $self = new self;

        $self['dayOfMonth'] = $dayOfMonth;
        $self['month'] = $month;
        $self['type'] = $type;

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

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }
}
