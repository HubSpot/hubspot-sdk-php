<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\TaxRates;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type PublicTaxRateGroupShape = array{
 *   id: string,
 *   active: bool,
 *   createdAt: \DateTimeInterface,
 *   label: string,
 *   name: string,
 *   percentageRate: float,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicTaxRateGroup implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicTaxRateGroupShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public bool $active;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api]
    public float $percentageRate;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * `new PublicTaxRateGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTaxRateGroup::with(
     *   id: ...,
     *   active: ...,
     *   createdAt: ...,
     *   label: ...,
     *   name: ...,
     *   percentageRate: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicTaxRateGroup)
     *   ->withID(...)
     *   ->withActive(...)
     *   ->withCreatedAt(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withPercentageRate(...)
     *   ->withUpdatedAt(...)
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
        bool $active,
        \DateTimeInterface $createdAt,
        string $label,
        string $name,
        float $percentageRate,
        \DateTimeInterface $updatedAt,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['active'] = $active;
        $obj['createdAt'] = $createdAt;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['percentageRate'] = $percentageRate;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPercentageRate(float $percentageRate): self
    {
        $obj = clone $this;
        $obj['percentageRate'] = $percentageRate;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
