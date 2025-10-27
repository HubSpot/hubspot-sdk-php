<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type exchange_rate_update_request = array{
 *   id: string, conversionRate: float, effectiveAt?: \DateTimeInterface
 * }
 */
final class ExchangeRateUpdateRequest implements BaseModel
{
    /** @use SdkModel<exchange_rate_update_request> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public float $conversionRate;

    #[Api(optional: true)]
    public ?\DateTimeInterface $effectiveAt;

    /**
     * `new ExchangeRateUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateUpdateRequest::with(id: ..., conversionRate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateUpdateRequest)->withID(...)->withConversionRate(...)
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
     */
    public static function with(
        string $id,
        float $conversionRate,
        ?\DateTimeInterface $effectiveAt = null
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->conversionRate = $conversionRate;

        null !== $effectiveAt && $obj->effectiveAt = $effectiveAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withConversionRate(float $conversionRate): self
    {
        $obj = clone $this;
        $obj->conversionRate = $conversionRate;

        return $obj;
    }

    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $obj = clone $this;
        $obj->effectiveAt = $effectiveAt;

        return $obj;
    }
}
