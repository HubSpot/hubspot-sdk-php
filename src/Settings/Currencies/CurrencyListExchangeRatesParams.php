<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\ToCurrencyCode;

/**
 * Get a list of exchange rates.
 *
 * @see HubspotSDK\Services\Settings\CurrenciesService::listExchangeRates()
 *
 * @phpstan-type CurrencyListExchangeRatesParamsShape = array{
 *   after?: string|null,
 *   fromCurrencyCode?: null|FromCurrencyCode|value-of<FromCurrencyCode>,
 *   limit?: int|null,
 *   toCurrencyCode?: null|ToCurrencyCode|value-of<ToCurrencyCode>,
 * }
 */
final class CurrencyListExchangeRatesParams implements BaseModel
{
    /** @use SdkModel<CurrencyListExchangeRatesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Filters the response to only include exchange rates set from the specified currency.
     *
     * @var value-of<FromCurrencyCode>|null $fromCurrencyCode
     */
    #[Optional(enum: FromCurrencyCode::class)]
    public ?string $fromCurrencyCode;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Filters the response to only include exchange rates set to the specified currency.
     *
     * @var value-of<ToCurrencyCode>|null $toCurrencyCode
     */
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
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
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
     * Filters the response to only include exchange rates set from the specified currency.
     *
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
     * Filters the response to only include exchange rates set to the specified currency.
     *
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
