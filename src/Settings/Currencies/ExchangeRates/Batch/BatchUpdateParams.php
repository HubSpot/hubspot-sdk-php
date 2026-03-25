<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies\ExchangeRates\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @see HubspotSDK\Services\Settings\Currencies\ExchangeRates\BatchService::update()
 *
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 *
 * @phpstan-type BatchUpdateParamsShape = array{
 *   inputs: list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape>
 * }
 */
final class BatchUpdateParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<ExchangeRateUpdateRequest> $inputs */
    #[Required(list: ExchangeRateUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpdateParams)->withInputs(...)
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
