<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputExchangeRateUpdateRequestShape = array{
 *   inputs: list<ExchangeRateUpdateRequest>
 * }
 */
final class BatchInputExchangeRateUpdateRequest implements BaseModel
{
    /** @use SdkModel<BatchInputExchangeRateUpdateRequestShape> */
    use SdkModel;

    /** @var list<ExchangeRateUpdateRequest> $inputs */
    #[Required(list: ExchangeRateUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputExchangeRateUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputExchangeRateUpdateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputExchangeRateUpdateRequest)->withInputs(...)
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
