<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CurrencyCodeInfoShape from \HubSpotSDK\Settings\Currencies\CurrencyCodeInfo
 *
 * @phpstan-type CollectionResponseCurrencyCodeInfoNoPagingShape = array{
 *   results: list<CurrencyCodeInfo|CurrencyCodeInfoShape>
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
     * @param list<CurrencyCodeInfo|CurrencyCodeInfoShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<CurrencyCodeInfo|CurrencyCodeInfoShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
