<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalOptionShape = array{
 *   description: string,
 *   displayOrder: int,
 *   doubleData: float,
 *   hidden: bool,
 *   label: string,
 *   readOnly: bool,
 *   value: string,
 * }
 */
final class ExternalOption implements BaseModel
{
    /** @use SdkModel<ExternalOptionShape> */
    use SdkModel;

    #[Api]
    public string $description;

    #[Api]
    public int $displayOrder;

    #[Api]
    public float $doubleData;

    #[Api]
    public bool $hidden;

    #[Api]
    public string $label;

    #[Api]
    public bool $readOnly;

    #[Api]
    public string $value;

    /**
     * `new ExternalOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalOption::with(
     *   description: ...,
     *   displayOrder: ...,
     *   doubleData: ...,
     *   hidden: ...,
     *   label: ...,
     *   readOnly: ...,
     *   value: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalOption)
     *   ->withDescription(...)
     *   ->withDisplayOrder(...)
     *   ->withDoubleData(...)
     *   ->withHidden(...)
     *   ->withLabel(...)
     *   ->withReadOnly(...)
     *   ->withValue(...)
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
        string $description,
        int $displayOrder,
        float $doubleData,
        bool $hidden,
        string $label,
        bool $readOnly,
        string $value,
    ): self {
        $obj = new self;

        $obj['description'] = $description;
        $obj['displayOrder'] = $displayOrder;
        $obj['doubleData'] = $doubleData;
        $obj['hidden'] = $hidden;
        $obj['label'] = $label;
        $obj['readOnly'] = $readOnly;
        $obj['value'] = $value;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withDoubleData(float $doubleData): self
    {
        $obj = clone $this;
        $obj['doubleData'] = $doubleData;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withReadOnly(bool $readOnly): self
    {
        $obj = clone $this;
        $obj['readOnly'] = $readOnly;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
