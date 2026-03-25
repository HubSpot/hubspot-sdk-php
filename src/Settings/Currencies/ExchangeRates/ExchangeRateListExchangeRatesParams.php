<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies\ExchangeRates;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\ToCurrencyCode;

/**
 * @see HubspotSDK\Services\Settings\Currencies\ExchangeRatesService::listExchangeRates()
 *
 * @phpstan-type ExchangeRateListExchangeRatesParamsShape = array{
 *   after?: string|null,
 *   fromCurrencyCode?: null|FromCurrencyCode|value-of<FromCurrencyCode>,
 *   limit?: int|null,
 *   toCurrencyCode?: null|ToCurrencyCode|value-of<ToCurrencyCode>,
 * }
 */
final class ExchangeRateListExchangeRatesParams implements BaseModel
{
    /** @use SdkModel<ExchangeRateListExchangeRatesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /** @var value-of<FromCurrencyCode>|null $fromCurrencyCode */
    #[Optional(enum: FromCurrencyCode::class)]
    public ?string $fromCurrencyCode;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /** @var value-of<ToCurrencyCode>|null $toCurrencyCode */
    #[Optional(enum: ToCurrencyCode::class)]
    public ?string $toCurrencyCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FromCurrencyCode|value-of<FromCurrencyCode>|null $fromCurrencyCode
     * @param ToCurrencyCode|value-of<ToCurrencyCode>|null $toCurrencyCode
     */
    public static function with(
        ?string $after = null,
        FromCurrencyCode|string|null $fromCurrencyCode = null,
        ?int $limit = null,
        ToCurrencyCode|string|null $toCurrencyCode = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $fromCurrencyCode && $self['fromCurrencyCode'] = $fromCurrencyCode;
        null !== $limit && $self['limit'] = $limit;
        null !== $toCurrencyCode && $self['toCurrencyCode'] = $toCurrencyCode;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     */
    public function withFromCurrencyCode(
        FromCurrencyCode|string $fromCurrencyCode
    ): self {
        $self = clone $this;
        $self['fromCurrencyCode'] = $fromCurrencyCode;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     */
    public function withToCurrencyCode(
        ToCurrencyCode|string $toCurrencyCode
    ): self {
        $self = clone $this;
        $self['toCurrencyCode'] = $toCurrencyCode;

        return $self;
    }
}
