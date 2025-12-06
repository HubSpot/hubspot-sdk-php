<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;
use HubspotSDK\Settings\Currencies\ExchangeRate\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate\ToCurrencyCode;

/**
 * @phpstan-type CollectionResponseExchangeRateForwardPagingShape = array{
 *   results: list<ExchangeRate>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseExchangeRateForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseExchangeRateForwardPagingShape> */
    use SdkModel;

    /** @var list<ExchangeRate> $results */
    #[Api(list: ExchangeRate::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseExchangeRateForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseExchangeRateForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseExchangeRateForwardPaging)->withResults(...)
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
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

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

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
