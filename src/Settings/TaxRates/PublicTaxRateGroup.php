<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\TaxRates;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

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

    /**
     * The unique identifier for the tax rate.
     */
    #[Required]
    public string $id;

    /**
     * Indicates whether the tax rate group is currently active.
     */
    #[Required]
    public bool $active;

    /**
     * The date and time when the tax rate was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The display label for the tax rate.
     */
    #[Required]
    public string $label;

    /**
     * The name of the tax rate.
     */
    #[Required]
    public string $name;

    /**
     * The percentage rate applied.
     */
    #[Required]
    public float $percentageRate;

    /**
     * The date and time when the tax rate was last updated.
     */
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

    /**
     * The unique identifier for the tax rate.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Indicates whether the tax rate group is currently active.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * The date and time when the tax rate was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The display label for the tax rate.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The name of the tax rate.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The percentage rate applied.
     */
    public function withPercentageRate(float $percentageRate): self
    {
        $self = clone $this;
        $self['percentageRate'] = $percentageRate;

        return $self;
    }

    /**
     * The date and time when the tax rate was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
