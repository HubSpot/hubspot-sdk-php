<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExchangeRateUpdateRequestShape = array{
 *   id: string, conversionRate: float, effectiveAt?: \DateTimeInterface|null
 * }
 */
final class ExchangeRateUpdateRequest implements BaseModel
{
    /** @use SdkModel<ExchangeRateUpdateRequestShape> */
    use SdkModel;

    /**
     * A unique identifier for the exchange rate being updated.
     */
    #[Api]
    public string $id;

    /**
     * The updated conversion rate between the to and from currency code of this exchange rate.
     */
    #[Api]
    public float $conversionRate;

    /**
     * The date the exchange rate will be in effect.
     */
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

        $obj['id'] = $id;
        $obj['conversionRate'] = $conversionRate;

        null !== $effectiveAt && $obj['effectiveAt'] = $effectiveAt;

        return $obj;
    }

    /**
     * A unique identifier for the exchange rate being updated.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The updated conversion rate between the to and from currency code of this exchange rate.
     */
    public function withConversionRate(float $conversionRate): self
    {
        $obj = clone $this;
        $obj['conversionRate'] = $conversionRate;

        return $obj;
    }

    /**
     * The date the exchange rate will be in effect.
     */
    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $obj = clone $this;
        $obj['effectiveAt'] = $effectiveAt;

        return $obj;
    }
}
