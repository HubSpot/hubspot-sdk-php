<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the conversion rates for multiple exchange rates in a batch operation.
 *
 * @see HubspotSDK\Services\Settings\CurrenciesService::batchUpdate()
 *
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 *
 * @phpstan-type CurrencyBatchUpdateParamsShape = array{
 *   inputs: list<ExchangeRateUpdateRequestShape>
 * }
 */
final class CurrencyBatchUpdateParams implements BaseModel
{
    /** @use SdkModel<CurrencyBatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<ExchangeRateUpdateRequest> $inputs */
    #[Required(list: ExchangeRateUpdateRequest::class)]
    public array $inputs;

    /**
     * `new CurrencyBatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrencyBatchUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrencyBatchUpdateParams)->withInputs(...)
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
     * @param list<ExchangeRateUpdateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<ExchangeRateUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
