<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicListConversionDate\ConversionType;

/**
 * @phpstan-type PublicListConversionDateShape = array{
 *   conversionType: value-of<ConversionType>, day: int, month: int, year: int
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
        $obj = new self;

        $obj['conversionType'] = $conversionType;
        $obj['day'] = $day;
        $obj['month'] = $month;
        $obj['year'] = $year;

        return $obj;
    }

    /**
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public function withConversionType(
        ConversionType|string $conversionType
    ): self {
        $obj = clone $this;
        $obj['conversionType'] = $conversionType;

        return $obj;
    }

    public function withDay(int $day): self
    {
        $obj = clone $this;
        $obj['day'] = $day;

        return $obj;
    }

    public function withMonth(int $month): self
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
