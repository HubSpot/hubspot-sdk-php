<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies\ExchangeRates\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest;

/**
 * Create multiple exchange rates in a single request.
 *
 * @see HubSpotSDK\Services\Settings\Currencies\ExchangeRates\BatchService::create()
 *
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<ExchangeRateCreateRequest> $inputs */
    #[Required(list: ExchangeRateCreateRequest::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
