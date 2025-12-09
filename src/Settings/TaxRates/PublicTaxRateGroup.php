<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\TaxRates;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
final class PublicTaxRateGroup implements BaseModel
{
    /** @use SdkModel<PublicTaxRateGroupShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $active;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Required]
    public float $percentageRate;

    #[Required]
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
        $self = new self;

        $self['id'] = $id;
        $self['active'] = $active;
        $self['createdAt'] = $createdAt;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['percentageRate'] = $percentageRate;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPercentageRate(float $percentageRate): self
    {
        $self = clone $this;
        $self['percentageRate'] = $percentageRate;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
