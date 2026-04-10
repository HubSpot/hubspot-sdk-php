<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 *
 * @phpstan-type BatchInputExchangeRateUpdateRequestShape = array{
 *   inputs: list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape>
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
     * @param list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
