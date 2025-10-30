<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Lists\PublicListConversionInactivity\ConversionType;
use HubspotSDK\CRM\Lists\PublicListConversionInactivity\TimeUnit;

/**
 * @phpstan-type PublicListConversionInactivityShape = array{
 *   conversionType: value-of<ConversionType>,
 *   offset: int,
 *   timeUnit: value-of<TimeUnit>,
 * }
 */
final class PublicListConversionInactivity implements BaseModel
{
    /** @use SdkModel<PublicListConversionInactivityShape> */
    use SdkModel;

    /** @var value-of<ConversionType> $conversionType */
    #[Api(enum: ConversionType::class)]
    public string $conversionType;

    #[Api]
    public int $offset;

    /** @var value-of<TimeUnit> $timeUnit */
    #[Api(enum: TimeUnit::class)]
    public string $timeUnit;

    /**
     * `new PublicListConversionInactivity()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListConversionInactivity::with(
     *   conversionType: ..., offset: ..., timeUnit: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicListConversionInactivity)
     *   ->withConversionType(...)
     *   ->withOffset(...)
     *   ->withTimeUnit(...)
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
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public static function with(
        int $offset,
        TimeUnit|string $timeUnit,
        ConversionType|string $conversionType = 'INACTIVITY',
    ): self {
        $obj = new self;

        $obj['conversionType'] = $conversionType;
        $obj->offset = $offset;
        $obj['timeUnit'] = $timeUnit;

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

    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $obj = clone $this;
        $obj['timeUnit'] = $timeUnit;

        return $obj;
    }
}
