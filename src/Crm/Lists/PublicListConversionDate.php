<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicListConversionDate\ConversionType;

/**
 * @phpstan-type PublicListConversionDateShape = array{
 *   conversionType: ConversionType|value-of<ConversionType>,
 *   day: int,
 *   month: int,
 *   year: int,
 * }
 */
final class PublicListConversionDate implements BaseModel
{
    /** @use SdkModel<PublicListConversionDateShape> */
    use SdkModel;

    /** @var value-of<ConversionType> $conversionType */
    #[Required(enum: ConversionType::class)]
    public string $conversionType;

    #[Required]
    public int $day;

    #[Required]
    public int $month;

    #[Required]
    public int $year;

    /**
     * `new PublicListConversionDate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListConversionDate::with(
     *   conversionType: ..., day: ..., month: ..., year: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicListConversionDate)
     *   ->withConversionType(...)
     *   ->withDay(...)
     *   ->withMonth(...)
     *   ->withYear(...)
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
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public static function with(
        int $day,
        int $month,
        int $year,
        ConversionType|string $conversionType = 'CONVERSION_DATE',
    ): self {
        $self = new self;

        $self['conversionType'] = $conversionType;
        $self['day'] = $day;
        $self['month'] = $month;
        $self['year'] = $year;

        return $self;
    }

    /**
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public function withConversionType(
        ConversionType|string $conversionType
    ): self {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

        return $self;
    }

    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    public function withMonth(int $month): self
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
