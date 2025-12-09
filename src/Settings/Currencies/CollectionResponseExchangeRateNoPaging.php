<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\ExchangeRate\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate\ToCurrencyCode;

/**
 * @phpstan-type CollectionResponseExchangeRateNoPagingShape = array{
 *   results: list<ExchangeRate>
 * }
 */
final class CollectionResponseExchangeRateNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseExchangeRateNoPagingShape> */
    use SdkModel;

    /** @var list<ExchangeRate> $results */
    #[Api(list: ExchangeRate::class)]
    public array $results;

    /**
     * `new CollectionResponseExchangeRateNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseExchangeRateNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseExchangeRateNoPaging)->withResults(...)
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
     * @param list<ExchangeRate|array{
     *   id: string,
     *   conversionRate: float,
     *   createdAt: \DateTimeInterface,
     *   effectiveAt: \DateTimeInterface,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   toCurrencyCode: value-of<ToCurrencyCode>,
     *   updatedAt: \DateTimeInterface,
     *   visibleInUI: bool,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<ExchangeRate|array{
     *   id: string,
     *   conversionRate: float,
     *   createdAt: \DateTimeInterface,
     *   effectiveAt: \DateTimeInterface,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   toCurrencyCode: value-of<ToCurrencyCode>,
     *   updatedAt: \DateTimeInterface,
     *   visibleInUI: bool,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
