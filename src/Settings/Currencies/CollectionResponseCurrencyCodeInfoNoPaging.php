<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CurrencyCodeInfoShape from \HubspotSDK\Settings\Currencies\CurrencyCodeInfo
 *
 * @phpstan-type CollectionResponseCurrencyCodeInfoNoPagingShape = array{
 *   results: list<CurrencyCodeInfoShape>
 * }
 */
final class CollectionResponseCurrencyCodeInfoNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseCurrencyCodeInfoNoPagingShape> */
    use SdkModel;

    /** @var list<CurrencyCodeInfo> $results */
    #[Required(list: CurrencyCodeInfo::class)]
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
     * @param list<CurrencyCodeInfoShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<CurrencyCodeInfoShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
