<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the conversion rates for multiple exchange rates in a batch operation.
 *
 * @see HubspotSDK\Services\Settings\CurrenciesService::batchUpdate()
 *
 * @phpstan-type CurrencyBatchUpdateParamsShape = array{
 *   inputs: list<ExchangeRateUpdateRequest|array{
 *     id: string, conversionRate: float, effectiveAt?: \DateTimeInterface|null
 *   }>,
 * }
 */
final class CurrencyBatchUpdateParams implements BaseModel
{
    /** @use SdkModel<CurrencyBatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<ExchangeRateUpdateRequest> $inputs */
    #[Api(list: ExchangeRateUpdateRequest::class)]
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
     * @param list<ExchangeRateUpdateRequest|array{
     *   id: string, conversionRate: float, effectiveAt?: \DateTimeInterface|null
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<ExchangeRateUpdateRequest|array{
     *   id: string, conversionRate: float, effectiveAt?: \DateTimeInterface|null
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
