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
 *   after?: string,
 *   fromCurrencyCode?: FromCurrencyCode|value-of<FromCurrencyCode>,
 *   limit?: int,
 *   toCurrencyCode?: ToCurrencyCode|value-of<ToCurrencyCode>,
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
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $fromCurrencyCode && $obj['fromCurrencyCode'] = $fromCurrencyCode;
        null !== $limit && $obj['limit'] = $limit;
        null !== $toCurrencyCode && $obj['toCurrencyCode'] = $toCurrencyCode;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * Filters the response to only include exchange rates set from the specified currency.
     *
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     */
    public function withFromCurrencyCode(
        FromCurrencyCode|string $fromCurrencyCode
    ): self {
        $obj = clone $this;
        $obj['fromCurrencyCode'] = $fromCurrencyCode;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * Filters the response to only include exchange rates set to the specified currency.
     *
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     */
    public function withToCurrencyCode(
        ToCurrencyCode|string $toCurrencyCode
    ): self {
        $obj = clone $this;
        $obj['toCurrencyCode'] = $toCurrencyCode;

        return $obj;
    }
}
