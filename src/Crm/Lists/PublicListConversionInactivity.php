<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicListConversionInactivity\ConversionType;
use HubSpotSDK\Crm\Lists\PublicListConversionInactivity\TimeUnit;

/**
 * @phpstan-type PublicListConversionInactivityShape = array{
 *   conversionType: ConversionType|value-of<ConversionType>,
 *   offset: int,
 *   timeUnit: TimeUnit|value-of<TimeUnit>,
 * }
 */
final class PublicListConversionInactivity implements BaseModel
{
    /** @use SdkModel<PublicListConversionInactivityShape> */
    use SdkModel;

    /**
     * Specifies the type of conversion (INACTIVITY).
     *
     * @var value-of<ConversionType> $conversionType
     */
    #[Required(enum: ConversionType::class)]
    public string $conversionType;

    /**
     * Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     */
    #[Required]
    public int $offset;

    /**
     * The unit of time for the inactivity period, such as (DAY, MONTH, WEEK).
     *
     * @var value-of<TimeUnit> $timeUnit
     */
    #[Required(enum: TimeUnit::class)]
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
        $self = new self;

        $self['conversionType'] = $conversionType;
        $self['offset'] = $offset;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    /**
     * Specifies the type of conversion (INACTIVITY).
     *
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public function withConversionType(
        ConversionType|string $conversionType
    ): self {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

        return $self;
    }

    /**
     * Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * The unit of time for the inactivity period, such as (DAY, MONTH, WEEK).
     *
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
