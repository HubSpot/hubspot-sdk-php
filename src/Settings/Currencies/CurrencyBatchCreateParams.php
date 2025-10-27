<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create multiple exchange rates in a single request.
 *
 * @see HubspotSDK\Settings\Currencies->batchCreate
 *
 * @phpstan-type currency_batch_create_params = array{
 *   inputs: list<ExchangeRateCreateRequest>
 * }
 */
final class CurrencyBatchCreateParams implements BaseModel
{
    /** @use SdkModel<currency_batch_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<ExchangeRateCreateRequest> $inputs */
    #[Api(list: ExchangeRateCreateRequest::class)]
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
     * @param list<ExchangeRateCreateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<ExchangeRateCreateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
