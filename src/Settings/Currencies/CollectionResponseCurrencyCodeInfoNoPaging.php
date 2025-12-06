<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CollectionResponseCurrencyCodeInfoNoPagingShape = array{
 *   results: list<CurrencyCodeInfo>
 * }
 */
final class CollectionResponseCurrencyCodeInfoNoPaging implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CollectionResponseCurrencyCodeInfoNoPagingShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CurrencyCodeInfo> $results */
    #[Api(list: CurrencyCodeInfo::class)]
    public array $results;

    /**
     * `new CollectionResponseCurrencyCodeInfoNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseCurrencyCodeInfoNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseCurrencyCodeInfoNoPaging)->withResults(...)
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
     * @param list<CurrencyCodeInfo|array{
     *   currencyCode: string, currencyName: string
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<CurrencyCodeInfo|array{
     *   currencyCode: string, currencyName: string
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
