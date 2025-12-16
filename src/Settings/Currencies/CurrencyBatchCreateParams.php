<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create multiple exchange rates in a single request.
 *
 * @see HubspotSDK\Services\Settings\CurrenciesService::batchCreate()
 *
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest
 *
 * @phpstan-type CurrencyBatchCreateParamsShape = array{
 *   inputs: list<ExchangeRateCreateRequestShape>
 * }
 */
final class CurrencyBatchCreateParams implements BaseModel
{
    /** @use SdkModel<CurrencyBatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<ExchangeRateCreateRequest> $inputs */
    #[Required(list: ExchangeRateCreateRequest::class)]
    public array $inputs;

    /**
     * `new CurrencyBatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrencyBatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrencyBatchCreateParams)->withInputs(...)
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
     * @param list<ExchangeRateCreateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<ExchangeRateCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
